<?php

namespace Abr\ServiceCronBundle\Entity\Cron;

use Doctrine\ORM\Mapping as ORM;

/**
 * Log
 *
 * @ORM\Table(name="cron_log")
 * @ORM\Entity(repositoryClass="Abr\ServiceCronBundle\Repository\Cron\LogRepository")
 */
class Log
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_log", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_log", type="datetime")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="host_log", type="string", length=255)
     */
    private $host;

    /**
     * @var string
     *
     * @ORM\Column(name="command_log", type="string", length=255)
     */
    private $command;

    /**
     * @var bool
     *
     * @ORM\Column(name="error_log", type="boolean")
     */
    private $error;

    /**
     * @var string
     *
     * @ORM\Column(name="msg_log", type="text", nullable=true)
     */
    private $msg;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return log
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set host
     *
     * @param string $host
     *
     * @return log
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
     * Set command
     *
     * @param string $command
     *
     * @return log
     */
    public function setCommand($command)
    {
        $this->command = $command;

        return $this;
    }

    /**
     * Get command
     *
     * @return string
     */
    public function getCommand()
    {
        return $this->command;
    }

    /**
     * Set error
     *
     * @param boolean $error
     *
     * @return log
     */
    public function setError($error)
    {
        $this->error = $error;

        return $this;
    }

    /**
     * Get error
     *
     * @return bool
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * Set msg
     *
     * @param string $msg
     *
     * @return log
     */
    public function setMsg($msg)
    {
        $this->msg = $msg;

        return $this;
    }

    /**
     * Get msg
     *
     * @return string
     */
    public function getMsg()
    {
        return $this->msg;
    }
}

