<?php

namespace Abr\ServiceCronBundle\Entity\Cron;

use Doctrine\ORM\Mapping as ORM;

/**
 * Step
 *
 * @ORM\Table(name="cron_step")
 * @ORM\Entity(repositoryClass="Abr\ServiceCronBundle\Repository\Cron\StepRepository")
 */
class Step
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_step", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @ORM\ManyToOne(targetEntity="Serie")
     * @ORM\JoinColumn(name="id_serie", referencedColumnName="id_serie")
     * @var Serie
     */
    private $serie;

    /**
     * @var int
     *
     * @ORM\Column(name="status_step", type="smallint", options={"comment":"active/inactive"})
     */
    private $status;

    /**
     * @var int
     *
     * @ORM\Column(name="order_step", type="smallint", options={"comment":"ordre dans la serie"})
     */
    private $orderStep;

    /**
     * @var string
     *
     * @ORM\Column(name="label_step", type="string", length=255)
     */
    private $label;

    /**
     * @var string
     *
     * @ORM\Column(name="service_step", type="string", length=255, options={"comment":"app get service"})
     */
    private $service;

    /**
     * @var string
     *
     * @ORM\Column(name="function_step", type="string", length=255, options={"comment":"service function"})
     */
    private $function;

    /**
     * @var string
     *
     * @ORM\Column(name="params_step", type="text", options={"comment":"function params ini string"}, nullable=true)
     */
    private $params;


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
     * @return mixed
     */
    public function getSerie()
    {
        return $this->serie;
    }

    /**
     * @param mixed $serie
     */
    public function setSerie($serie)
    {
        $this->serie = $serie;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return Step
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
     * Set orderStep
     *
     * @param integer $orderStep
     *
     * @return Step
     */
    public function setOrderStep($orderStep)
    {
        $this->orderStep = $orderStep;

        return $this;
    }

    /**
     * Get orderStep
     *
     * @return int
     */
    public function getOrderStep()
    {
        return $this->orderStep;
    }

    /**
     * Set label
     *
     * @param string $label
     *
     * @return Step
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
     * Set service
     *
     * @param string $service
     *
     * @return Step
     */
    public function setService($service)
    {
        $this->service = $service;

        return $this;
    }

    /**
     * Get service
     *
     * @return string
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * Set function
     *
     * @param string $function
     *
     * @return Step
     */
    public function setFunction($function)
    {
        $this->function = $function;

        return $this;
    }

    /**
     * Get function
     *
     * @return string
     */
    public function getFunction()
    {
        return $this->function;
    }

    /**
     * Set params
     *
     * @param string $params
     *
     * @return Step
     */
    public function setParams($params)
    {
        $this->params = $params;

        return $this;
    }

    /**
     * Get params
     *
     * @return string
     */
    public function getParams()
    {
        return $this->params;
    }
}

