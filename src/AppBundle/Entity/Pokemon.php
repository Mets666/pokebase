<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Pokemon
 *
 * @ORM\Table(name="pokemon")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PokemonRepository")
 */
class Pokemon
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="race", type="string", length=255)
     */
    private $race;

    /**
     * @var string
     *
     * @ORM\Column(name="nature", type="string", length=255)
     */
    private $nature;

    /**
     * @var int
     *
     * @ORM\Column(name="level", type="integer", options={"unsigned":true, "default":100})
     *
     * @Assert\Range(
     *      min = 1,
     *      max = 100,
     *      minMessage = "Minimal level is {{ limit }}",
     *      maxMessage = "Maximal level is{{ limit }}"
     * )
     */
    private $level;

    /**
     * @var int
     *
     * @ORM\Column(name="iv_hp", type="integer", options={"unsigned":true, "default":0})
     */
    private $ivHp;

    /**
     * @var int
     *
     * @ORM\Column(name="iv_atk", type="integer", options={"unsigned":true, "default":0})
     */
    private $ivAtk;

    /**
     * @var int
     *
     * @ORM\Column(name="iv_def", type="integer", options={"unsigned":true, "default":0})
     */
    private $ivDef;

    /**
     * @var int
     *
     * @ORM\Column(name="iv_spatk", type="integer", options={"unsigned":true, "default":0})
     */
    private $ivSpatk;

    /**
     * @var int
     *
     * @ORM\Column(name="iv_spdef", type="integer", options={"unsigned":true, "default":0})
     */
    private $ivSpdef;

    /**
     * @var int
     *
     * @ORM\Column(name="iv_spd", type="integer", options={"unsigned":true, "default":0})
     */
    private $ivSpd;

    /**
     * @var int
     *
     * @ORM\Column(name="ev_hp", type="integer", options={"unsigned":true, "default":0})
     */
    private $evHp;

    /**
     * @var string
     *
     * @ORM\Column(name="ev_atk", type="integer", options={"unsigned":true, "default":0})
     */
    private $evAtk;

    /**
     * @var int
     *
     * @ORM\Column(name="ev_def", type="integer", options={"unsigned":true, "default":0})
     */
    private $evDef;

    /**
     * @var int
     *
     * @ORM\Column(name="ev_spatk", type="integer", options={"unsigned":true, "default":0})
     */
    private $evSpatk;

    /**
     * @var int
     *
     * @ORM\Column(name="ev_spdef", type="integer", options={"unsigned":true, "default":0})
     */
    private $evSpdef;

    /**
     * @var int
     *
     * @ORM\Column(name="ev_spd", type="integer", options={"unsigned":true, "default":0})
     */
    private $evSpd;


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
     * Set name
     *
     * @param string $name
     *
     * @return Pokemon
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set nature
     *
     * @param string $nature
     *
     * @return Pokemon
     */
    public function setNature($nature)
    {
        $this->nature = $nature;

        return $this;
    }

    /**
     * Get nature
     *
     * @return string
     */
    public function getNature()
    {
        return $this->nature;
    }

    /**
     * Set ivHp
     *
     * @param integer $ivHp
     *
     * @return Pokemon
     */
    public function setIvHp($ivHp)
    {
        $this->ivHp = $ivHp;

        return $this;
    }

    /**
     * Get ivHp
     *
     * @return int
     */
    public function getIvHp()
    {
        return $this->ivHp;
    }

    /**
     * Set ivAtk
     *
     * @param integer $ivAtk
     *
     * @return Pokemon
     */
    public function setIvAtk($ivAtk)
    {
        $this->ivAtk = $ivAtk;

        return $this;
    }

    /**
     * Get ivAtk
     *
     * @return int
     */
    public function getIvAtk()
    {
        return $this->ivAtk;
    }

    /**
     * Set ivDef
     *
     * @param integer $ivDef
     *
     * @return Pokemon
     */
    public function setIvDef($ivDef)
    {
        $this->ivDef = $ivDef;

        return $this;
    }

    /**
     * Get ivDef
     *
     * @return int
     */
    public function getIvDef()
    {
        return $this->ivDef;
    }

    /**
     * Set ivSpatk
     *
     * @param integer $ivSpatk
     *
     * @return Pokemon
     */
    public function setIvSpatk($ivSpatk)
    {
        $this->ivSpatk = $ivSpatk;

        return $this;
    }

    /**
     * Get ivSpatk
     *
     * @return int
     */
    public function getIvSpatk()
    {
        return $this->ivSpatk;
    }

    /**
     * Set ivSpdef
     *
     * @param integer $ivSpdef
     *
     * @return Pokemon
     */
    public function setIvSpdef($ivSpdef)
    {
        $this->ivSpdef = $ivSpdef;

        return $this;
    }

    /**
     * Get ivSpdef
     *
     * @return int
     */
    public function getIvSpdef()
    {
        return $this->ivSpdef;
    }

    /**
     * Set ivSpd
     *
     * @param integer $ivSpd
     *
     * @return Pokemon
     */
    public function setIvSpd($ivSpd)
    {
        $this->ivSpd = $ivSpd;

        return $this;
    }

    /**
     * Get ivSpd
     *
     * @return int
     */
    public function getIvSpd()
    {
        return $this->ivSpd;
    }

    /**
     * Set evHp
     *
     * @param integer $evHp
     *
     * @return Pokemon
     */
    public function setEvHp($evHp)
    {
        $this->evHp = $evHp;

        return $this;
    }

    /**
     * Get evHp
     *
     * @return int
     */
    public function getEvHp()
    {
        return $this->evHp;
    }

    /**
     * Set evAtk
     *
     * @param string $evAtk
     *
     * @return Pokemon
     */
    public function setEvAtk($evAtk)
    {
        $this->evAtk = $evAtk;

        return $this;
    }

    /**
     * Get evAtk
     *
     * @return string
     */
    public function getEvAtk()
    {
        return $this->evAtk;
    }

    /**
     * Set evDef
     *
     * @param integer $evDef
     *
     * @return Pokemon
     */
    public function setEvDef($evDef)
    {
        $this->evDef = $evDef;

        return $this;
    }

    /**
     * Get evDef
     *
     * @return int
     */
    public function getEvDef()
    {
        return $this->evDef;
    }

    /**
     * Set evSpatk
     *
     * @param integer $evSpatk
     *
     * @return Pokemon
     */
    public function setEvSpatk($evSpatk)
    {
        $this->evSpatk = $evSpatk;

        return $this;
    }

    /**
     * Get evSpatk
     *
     * @return int
     */
    public function getEvSpatk()
    {
        return $this->evSpatk;
    }

    /**
     * Set evSpdef
     *
     * @param integer $evSpdef
     *
     * @return Pokemon
     */
    public function setEvSpdef($evSpdef)
    {
        $this->evSpdef = $evSpdef;

        return $this;
    }

    /**
     * Get evSpdef
     *
     * @return int
     */
    public function getEvSpdef()
    {
        return $this->evSpdef;
    }

    /**
     * Set evSpd
     *
     * @param integer $evSpd
     *
     * @return Pokemon
     */
    public function setEvSpd($evSpd)
    {
        $this->evSpd = $evSpd;

        return $this;
    }

    /**
     * Get evSpd
     *
     * @return int
     */
    public function getEvSpd()
    {
        return $this->evSpd;
    }



    /**
     * Set race
     *
     * @param string $race
     *
     * @return Pokemon
     */
    public function setRace($race)
    {
        $this->race = $race;

        return $this;
    }

    /**
     * Get race
     *
     * @return string
     */
    public function getRace()
    {
        return $this->race;
    }

    /**
     * Set level
     *
     * @param integer $level
     *
     * @return Pokemon
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level
     *
     * @return integer
     */
    public function getLevel()
    {
        return $this->level;
    }
}
