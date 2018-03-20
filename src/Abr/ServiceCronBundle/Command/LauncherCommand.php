<?php
namespace Abr\ServiceCronBundle\Command;

use Abr\ServiceCronBundle\Services\ServiceCron;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class LauncherCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('abr:launcher')
            ->setDescription('Action launcher for cron service. Run by the crontab at regular intervals')
            ->setHelp(<<<EOT
<info>%command.name%</info> is the action launcher of ServiceCron. It must be used by the crontab
No parameters.
EOT
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $container = $this->getContainer();
        /** @var $serviceCron ServiceCron*/
        $serviceCron = $container->get('service.cron');
        $dateTime = date('Y-m-d H:i:s', time());

        $output->write("| ", true);
        $output->write("| Abr/Launcher " . $dateTime, true);
        $output->write("| ", true);

        try {
            $bilan = $serviceCron->launcher();
            if($bilan)
            {
                $output->write("", true);
                $output->write("- BILAN -", true);
                $output->write("", true);
                $output->write((is_array($bilan) ? implode(PHP_EOL, $bilan) : $bilan), true);
                $output->write("", true);
            }

            $serviceCron->log();

        } catch(\Exception $e) {
            $serviceCron->log(1, $e->getMessage().PHP_EOL.$e->getTraceAsString());
            $output->write($e->getMessage(), true);
            $output->write($e->getTraceAsString(), true);
        }
die;
    }

}