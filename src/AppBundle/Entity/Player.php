<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="player")
 */
class Player
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\Column(name="first_name", type="string")
     */
    protected $fname;

    /**
     * @ORM\Column(name="last_name", type="string")
     */
    protected $lname;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $nationality;

    /**
     * @ORM\Column(name="date", type="datetime", nullable=true)
     */
    protected $dob;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $placeBirth;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $height;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $weight;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $photo;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $comment;

    /**
     * @ORM\ManyToOne(targetEntity="Position", inversedBy="players")
     * @var Position
     */
    protected $position;

    /**
     * @ORM\ManyToOne(targetEntity="Team", inversedBy="players")
     * @var Team
     */
    protected $team;

    /**
     * @var int $goal
     * @ORM\Column(type="integer", options={"default":0})
     */
    protected $goal;

    /**
     * @var int $yellowCard
     * @ORM\Column(type="integer", options={"default":0})
     */
    protected $yellowCard;

    /**
     * @var int $redCard
     * @ORM\Column(type="integer", options={"default":0})
     */
    protected $redCard;

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
    public function getFname()
    {
        return $this->fname;
    }

    /**
     * @param mixed $fname
     */
    public function setFname($fname)
    {
        $this->fname = $fname;
    }

    /**
     * @return mixed
     */
    public function getLname()
    {
        return $this->lname;
    }

    /**
     * @param mixed $lname
     */
    public function setLname($lname)
    {
        $this->lname = $lname;
    }

    /**
     * @return mixed
     */
    public function getNationality()
    {
        return $this->nationality;
    }

    /**
     * @param mixed $nationality
     */
    public function setNationality($nationality)
    {
        $this->nationality = $nationality;
    }

    /**
     * @return mixed
     */
    public function getDob()
    {
        return $this->dob;
    }

    /**
     * @param mixed $dob
     */
    public function setDob($dob)
    {
        $this->dob = $dob;
    }

    /**
     * @return mixed
     */
    public function getPlaceBirth()
    {
        return $this->placeBirth;
    }

    /**
     * @param mixed $placeBirth
     */
    public function setPlaceBirth($placeBirth)
    {
        $this->placeBirth = $placeBirth;
    }

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param mixed $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * @return mixed
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param mixed $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param mixed $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * @return Position
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param Position $position
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }

    /**
     * @return Team
     */
    public function getTeam()
    {
        return $this->team;
    }

    /**
     * @param Team $team
     */
    public function setTeam($team)
    {
        $this->team = $team;
    }

    /**
     * @return int
     */
    public function getGoal()
    {
        return $this->goal;
    }

    /**
     * @param int $goal
     */
    public function setGoal($goal)
    {
        $this->goal = $goal;
    }

    /**
     * @return int
     */
    public function getYellowCard()
    {
        return $this->yellowCard;
    }

    /**
     * @param int $yellowCard
     */
    public function setYellowCard($yellowCard)
    {
        $this->yellowCard = $yellowCard;
    }

    /**
     * @return int
     */
    public function getRedCard()
    {
        return $this->redCard;
    }

    /**
     * @param int $redCard
     */
    public function setRedCard($redCard)
    {
        $this->redCard = $redCard;
    }
}