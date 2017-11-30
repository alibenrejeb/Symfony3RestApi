<?php
namespace Api\LigueBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="saison")
 */
class Saison
{
    /**
     * @ORM\Id
     * @ORM\Column(name="annee", type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $libelle;

    /**
     * @ORM\OneToMany(targetEntity="Table", mappedBy="saison")
     * @var Table[]
     */
    protected $tables;

    /**
     * @ORM\OneToMany(targetEntity="Match", mappedBy="saison")
     * @var Match[]
     */
    protected $matches;

    public function __construct()
    {
        $this->tables = new ArrayCollection();
        $this->matches = new ArrayCollection();
    }

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
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * @param mixed $libelle
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    }

    /**
     * @return Table[]
     */
    public function getTables()
    {
        return $this->tables;
    }

    /**
     * @param Table[] $tables
     */
    public function setTables($tables)
    {
        $this->tables = $tables;
    }
}