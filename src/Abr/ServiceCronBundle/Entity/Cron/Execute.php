<?php

namespace Abr\ServiceCronBundle\Entity\Cron;

use Doctrine\ORM\Mapping as ORM;

/**
 * Execute
 *
 * @ORM\Table(name="cron_execute")
 * @ORM\Entity(repositoryClass="Abr\ServiceCronBundle\Repository\Cron\ExecuteRepository")
 */
class Execute
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_execute", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="serie_execute", type="datetime")
     */
    private $serieDate;

    /**
     * @ORM\ManyToOne(targetEntity="Step")
     * @ORM\JoinColumn(name="id_step", referencedColumnName="id_step")
     * @var Step
     */
    private $step;

    /**
     * @var int
     *
     * @ORM\Column(name="status_execute", type="smallint", options={"comment":"a lancer/en cours/finie/en erreur"})
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="host_execute", type="string", length=255, nullable=true)
     */
    private $host;

    /**
     * @var int
     *
     * @ORM\Column(name="pid_execute", type="integer", nullable=true)
     */
    private $pid;

    /**
     * @var string
     *
     * @ORM\Column(name="bilan_execute", type="text", nullable=true)
     */
    private $bilan;

    /**
     * @var string
     *
     * @ORM\Column(name="duration_execute", type="decimal", precision=13, scale=3, nullable=true)
     */
    private $duration;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_execute", type="datetime", nullable=true)
     */
    private $start;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="update_execute", type="datetime", nullable=true)
     */
    private $end;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return \DateTime
     */
    public function getSerieDate()
    {
        return $this->serieDate;
    }

    /**
     * @param \DateTime $serieDate
     */
    public function setSerieDate($serieDate)
    {
        $this->serieDate = $serieDate;
    }

    /**
     * @return Step
     */
    public function getStep()
    {
        return $this->step;
    }

    /**
     * @param Step $step
     */
    public function setStep($step)
    {
        $this->step = $step;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return execute
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set host
     *
     * @param string $host
     *
     * @return execute
     */
    public function setHost($host)
    {
        $this->host = $host;

        return $this;
    }

    /**
     * Get host
     *
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * Set pid
     *
     * @param integer $pid
     *
     * @return execute
     */
    public function setPid($pid)
    {
        $this->pid = $pid;

        return $this;
    }

    /**
     * Get pid
     *
     * @return int
     */
    public function getPid()
    {
        return $this->pid;
    }

    /**
     * Set bilan
     *
     * @param string $bilan
     *
     * @return execute
     */
    public function setBilan($bilan)
    {
        $this->bilan = $bilan;

        return $this;
    }

    /**
     * Get bilan
     *
     * @return string
     */
    public function getBilan()
    {
        return $this->bilan;
    }

    /**
     * Set duration
     *
     * @param string $duration
     *
     * @return execute
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return string
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set start
     *
     * @param \DateTime $start
     *
     * @return execute
     */
    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    /**
     * Get start
     *
     * @return \DateTime
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set end
     *
     * @param \DateTime $end
     *
     * @return execute
     */
    public function setEnd($end)
    {
        $this->end = $end;

        return $this;
    }

    /**
     * Get end
     *
     * @return \DateTime
     */
    public function getEnd()
    {
        return $this->end;
    }
}

