<?php
namespace Api\LigueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="matches")
 */
class Match
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\Column(name="date", type="datetime")
     */
    protected $date;

    /**
     * @ORM\ManyToOne(targetEntity="Team")
     * @ORM\JoinColumn(name="team_home", referencedColumnName="id")
     * @var Team
     */
    protected $teamHome;

    /**
     * @ORM\ManyToOne(targetEntity="Team")
     * @ORM\JoinColumn(name="team_away", referencedColumnName="id")
     * @var Team
     */
    protected $teamAway;

    /**
     * @var int $scoreHome
     * @ORM\Column(type="integer", options={"default":0})
     */
    protected $scoreHome;

    /**
     * @var int $scoreHome
     * @ORM\Column(type="integer", options={"default":0})
     */
    protected $scoreAway;

    /**
     * @ORM\Column(name="report", type="boolean", options={"default":false})
     */
    protected $report;

    /**
     * @ORM\Column(name="round", type="integer", options={"default":0})
     */
    protected $round;

    /**
     * @ORM\ManyToOne(targetEntity="Saison")
     * @ORM\JoinColumn(name="saison_id", referencedColumnName="annee")
     * @var Saison
     */
    protected $saison;

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
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return Team
     */
    public function getTeamHome()
    {
        return $this->teamHome;
    }

    /**
     * @param Team $teamHome
     */
    public function setTeamHome($teamHome)
    {
        $this->teamHome = $teamHome;
    }

    /**
     * @return Team
     */
    public function getTeamAway()
    {
        return $this->teamAway;
    }

    /**
     * @param Team $teamAway
     */
    public function setTeamAway($teamAway)
    {
        $this->teamAway = $teamAway;
    }

    /**
     * @return int
     */
    public function getScoreHome()
    {
        return $this->scoreHome;
    }

    /**
     * @param int $scoreHome
     */
    public function setScoreHome($scoreHome)
    {
        $this->scoreHome = $scoreHome;
    }

    /**
     * @return int
     */
    public function getScoreAway()
    {
        return $this->scoreAway;
    }

    /**
     * @param int $scoreAway
     */
    public function setScoreAway($scoreAway)
    {
        $this->scoreAway = $scoreAway;
    }

    /**
     * @return mixed
     */
    public function getReport()
    {
        return $this->report;
    }

    /**
     * @param mixed $report
     */
    public function setReport($report)
    {
        $this->report = $report;
    }

    /**
     * @return mixed
     */
    public function getRound()
    {
        return $this->round;
    }

    /**
     * @param mixed $round
     */
    public function setRound($round)
    {
        $this->round = $round;
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

}