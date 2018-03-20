<?php
namespace Abr\ServiceCronBundle\Services;

use Abr\ServiceCronBundle\Entity\Cron\Execute;
use Abr\ServiceCronBundle\Entity\Cron\Log;
use Abr\ServiceCronBundle\Entity\Cron\Step;
use Abr\ServiceCronBundle\Repository\Cron\executeRepository;
use Abr\ServiceCronBundle\Repository\Cron\StepRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\Validator\Constraints\DateTime;

class ServiceCron
{
    /** @var EntityManager */
    private $em;
    /** @var Container  */
    private $container;
    protected $action;

    /**
     * Tables constructor.
     * @param EntityManager $em
     * @param Container $container
     */
    public function __construct(EntityManager $em, Container $container)
    {
        $this->em = $em;
        $this->container = $container;
    }

    public function launcher()
    {
        $this->action = 'Launcher';

        /** @var $executeRepository ExecuteRepository*/
        $executeRepository = $this->em->getRepository(Execute::class);
        $execute = $executeRepository->currentExecuteReady();

        if(!$execute) {
            return "Abr/launcher : aucune étape à lancer";
        }

        $this->em->getConnection()->beginTransaction();
        try {
            $step = $execute->getStep();
            $execute->setHost(php_uname('n'));
            $execute->setStatus(1);
            $dateTime = new \DateTime(date('Y-m-d H:i:s', time()));
            $execute->setStart($dateTime);
            $pid = (function_exists('getmypid')) ? getmypid() : null;
            $execute->setPid($pid);
            $this->em->flush();

            $chrono = new Chrono();
            try {
                $chrono->start();
                $service = $this->container->get($step->getService());
                $bilan = call_user_func_array(array($service, $step->getFunction()), $this->parseIniString($step->getParams()));
                $execute->setDuration($chrono->top());
                $execute->setStatus(2);
                $execute->setPid(null);
                $execute->setBilan(serialize($bilan));
            } catch (\Exception $e) {
                $execute->setStatus(3);
                $execute->setPid(null);
                $bilan = $e->getMessage().PHP_EOL.$e->getTraceAsString();
                $execute->setBilan($bilan);
            }
            $this->em->flush();

            if(($execute->getStatus() == 2) || ($execute->getStatus() == 3 && $step->getStatus() == 3)) {
                /** @var $step StepRepository*/
                $step = $this->em->getRepository(Step::class);
                $nextStep = $step->getNextStep($execute->getId(), $execute->getStep()->getSerie());

                if($nextStep) {
                    $newExecute = new Execute();
                    $newExecute->setSerieDate($execute->getSerieDate());
                    $newExecute->setStep($nextStep);
                    $newExecute->setHost(php_uname('n'));
                    $newExecute->setStatus(0);
                    $this->em->persist($newExecute);
                    $this->em->flush();
                }
            }

            $this->em->getConnection()->commit();
        } catch (\Exception $e) {
            $this->em->close();
            $this->em->rollBack();
            dump($e->getMessage());
        }

        return $bilan;
    }

    public function sayHello($nom, $prenom)
    {
        return "Hello " . $prenom . " " . $nom;
    }

    public function log($error = 0, $msg = null)
    {
        $this->em->getConnection()->beginTransaction();
        try {
            $dateTime = new \DateTime(date('Y-m-d H:i:s', time()));
            $log = new Log();
            $log->setDate($dateTime);
            $log->setCommand($this->action);
            $log->setHost(php_uname('n'));
            $log->setError($error ? 1 : 0);
            $log->setMsg($msg);
            $this->em->persist($log);
            $this->em->flush();
            $this->em->getConnection()->commit();
        } catch(\Exception $e) {
            $this->em->close();
            $this->em->rollback();
            dump($e->getMessage());
        }
    }

    protected function parseIniString($string)
    {
        $parse = array();
        $array = explode(";", $string);
        foreach ($array as $value) {
            $tmp = explode("=", $value);
            $parse[$tmp[0]] = $tmp[1];
        }

        return $parse;
    }
}