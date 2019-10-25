<?php

namespace App\Entity;

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
     * @ORM\ManyToOne(targetEntity=Serie::class, inversedBy="matches")
     * @ORM\JoinColumn(nullable=false)
     */
    private $serie;

    /**
     * @ORM\ManyToOne(targetEntity=Player::class)
     */
    private $winner;

    public function __construct(Serie $serie)
    {
        $this->serie = $serie;
        $this->weight = 0;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSerie(): Serie
    {
        return $this->phase;
    }

    public function setWinner(Player $player): self
    {
        $this->winner = $player;

        return $this;
    }

    public function getWinner(): ?Player
    {
        return $this->winner;
    }
}
