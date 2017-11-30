<?php
namespace AppBundle\Entity;

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
     * @ORM\ManyToOne(targetEntity="Saison", inversedBy="matches")
     * @ORM\JoinColumn(name="saison_id", referencedColumnName="annee")
     * @var Saison
     */
    protected $saison;

}