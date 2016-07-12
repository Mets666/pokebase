<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Column(name="name", type="string", length=50)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="pokedexId", type="integer")
     */
    private $pokedexId;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=50)
     */
    private $type;

    /**
     * @var \stdClass
     *
     * @ORM\Column(name="preEvo", type="object", nullable=true)
     * @ORM\OneToOne(targetEntity="Pokemon")
     * @ORM\JoinColumn(name="preEvo_id", referencedColumnName="id")
     */
    private $preEvo;

    /**
     * @var \stdClass
     *
     * @ORM\Column(name="postEvo", type="object", nullable=true)
     * @ORM\OneToOne(targetEntity="Pokemon")
     * @ORM\JoinColumn(name="postEvo_id", referencedColumnName="id")
     */
    private $postEvo;

    /**
     * @var bool
     *
     * @ORM\Column(name="gender", type="boolean")
     */
    private $gender;


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
     * Set pokedexId
     *
     * @param integer $pokedexId
     *
     * @return Pokemon
     */
    public function setPokedexId($pokedexId)
    {
        $this->pokedexId = $pokedexId;

        return $this;
    }

    /**
     * Get pokedexId
     *
     * @return int
     */
    public function getPokedexId()
    {
        return $this->pokedexId;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Pokemon
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set preEvo
     *
     * @param \stdClass $preEvo
     *
     * @return Pokemon
     */
    public function setPreEvo($preEvo)
    {
        $this->preEvo = $preEvo;

        return $this;
    }

    /**
     * Get preEvo
     *
     * @return \stdClass
     */
    public function getPreEvo()
    {
        return $this->preEvo;
    }

    /**
     * Set postEvo
     *
     * @param \stdClass $postEvo
     *
     * @return Pokemon
     */
    public function setPostEvo($postEvo)
    {
        $this->postEvo = $postEvo;

        return $this;
    }

    /**
     * Get postEvo
     *
     * @return \stdClass
     */
    public function getPostEvo()
    {
        return $this->postEvo;
    }

    /**
     * Set gender
     *
     * @param boolean $gender
     *
     * @return Pokemon
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return bool
     */
    public function getGender()
    {
        return $this->gender;
    }
}
