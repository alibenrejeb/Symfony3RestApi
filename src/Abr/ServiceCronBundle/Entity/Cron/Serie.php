<?php

namespace Abr\ServiceCronBundle\Entity\Cron;

use Doctrine\ORM\Mapping as ORM;

/**
 * Serie
 *
 * @ORM\Table(name="cron_serie")
 * @ORM\Entity(repositoryClass="Abr\ServiceCronBundle\Repository\Abr\CronSerieRepository")
 */
class Serie
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_serie", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="label_serie", type="string", length=255)
     */
    private $label;

    /**
     * @var bool
     *
     * @ORM\Column(name="status_serie", type="smallint", options={"comment":"active/inactive"})
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="email_error_serie", type="string", length=255, nullable=true)
     */
    private $emailError;

    /**
     * @var string
     *
     * @ORM\Column(name="email_bilan_serie", type="string", length=255, nullable=true)
     */
    private $emailBilan;


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
     * Set label
     *
     * @param string $label
     *
     * @return CronSerie
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get label
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set status
     *
     * @param boolean $status
     *
     * @return CronSerie
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return bool
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set emailError
     *
     * @param string $emailError
     *
     * @return CronSerie
     */
    public function setEmailError($emailError)
    {
        $this->emailError = $emailError;

        return $this;
    }

    /**
     * Get emailError
     *
     * @return string
     */
    public function getEmailError()
    {
        return $this->emailError;
    }

    /**
     * Set emailBilan
     *
     * @param string $emailBilan
     *
     * @return CronSerie
     */
    public function setEmailBilan($emailBilan)
    {
        $this->emailBilan = $emailBilan;

        return $this;
    }

    /**
     * Get emailBilan
     *
     * @return string
     */
    public function getEmailBilan()
    {
        return $this->emailBilan;
    }
}

