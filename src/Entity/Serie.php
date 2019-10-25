<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Round
{
    use WeightableTrait;
    
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Round::class, inversedBy="series")
     * @ORM\JoinColumn(nullable=false)
     */
    private $round;

    /**
     * @ORM\OneToMany(targetEntity=Match::class, mappedBy="serie")
     * @ORM\OrderBy({"weight"="ASC", "id"="ASC"})
     */
    private $matches;

    /**
     * @ORM\ManyToMany(targetEntity=Player::class)
     */
    private $players;

    public function __construct(Round $round)
    {
        $this->round = $round;
        $this->matches = new ArrayCollection();
        $this->players = new ArrayCollection();
        $this->weight = 0;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRound(): Round
    {
        return $this->phase;
    }

    public function getMatches(): Collection
    {
        return $this->matches;
    }

    public function getPlayers(): Collection
    {
        return $this->players;
    }
}
