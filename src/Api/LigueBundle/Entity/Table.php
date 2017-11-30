<?php
namespace Api\LigueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Api\LigueBundle\Repository\TableRepository")
 * @ORM\Table(name="tables")
 */
class Table
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @var int $goal
     * @ORM\Column(type="integer", options={"default":0})
     */
    protected $play;

    /**
     * @var int $goal
     * @ORM\Column(type="integer", options={"default":0})
     */
    protected $win;

    /**
     * @var int $goal
     * @ORM\Column(type="integer", options={"default":0})
     */
    protected $draw;

    /**
     * @var int $goal
     * @ORM\Column(type="integer", options={"default":0})
     */
    protected $lost;

    /**
     * @var int $goal
     * @ORM\Column(type="integer", options={"default":0})
     */
    protected $goalsScored;

    /**
     * @var int $goal
     * @ORM\Column(type="integer", options={"default":0})
     */
    protected $goalsConceded;

    /**
     * @ORM\ManyToOne(targetEntity="Saison", inversedBy="tables")
     * @ORM\JoinColumn(name="saison_id", referencedColumnName="annee")
     * @var Saison
     */
    protected $saison;

    /**
     * @ORM\ManyToOne(targetEntity="Team", inversedBy="tables")
     * @var Team
     */
    protected $team;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getPlay()
    {
        return $this->play;
    }

    /**
     * @param int $play
     */
    public function setPlay($play)
    {
        $this->play = $play;
    }

    /**
     * @return int
     */
    public function getWin()
    {
        return $this->win;
    }

    /**
     * @param int $win
     */
    public function setWin($win)
    {
        $this->win = $win;
    }

    /**
     * @return int
     */
    public function getDraw()
    {
        return $this->draw;
    }

    /**
     * @param int $draw
     */
    public function setDraw($draw)
    {
        $this->draw = $draw;
    }

    /**
     * @return int
     */
    public function getLost()
    {
        return $this->lost;
    }

    /**
     * @param int $lost
     */
    public function setLost($lost)
    {
        $this->lost = $lost;
    }

    /**
     * @return int
     */
    public function getGoalsScored()
    {
        return $this->goalsScored;
    }

    /**
     * @param int $goalsScored
     */
    public function setGoalsScored($goalsScored)
    {
        $this->goalsScored = $goalsScored;
    }

    /**
     * @return int
     */
    public function getGoalsConceded()
    {
        return $this->goalsConceded;
    }

    /**
     * @param int $goalsConceded
     */
    public function setGoalsConceded($goalsConceded)
    {
        $this->goalsConceded = $goalsConceded;
    }

    /**
     * @return Saison
     */
    public function getSaison()
    {
        return $this->saison;
    }

    /**
     * @param Saison $saison
     */
    public function setSaison($saison)
    {
        $this->saison = $saison;
    }

    /**
     * @return mixed
     */
    public function getTeam()
    {
        return $this->team;
    }

    /**
     * @param mixed $team
     */
    public function setTeam($team)
    {
        $this->team = $team;
    }
}