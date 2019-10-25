<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Registration
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $forfeit;

    /**
     * @ORM\ManyToOne(targetEntity=AbstractParticipation::class, inversedBy="registrations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $participant;

    /**
     * @ORM\ManyToOne(targetEntity=Tournament::class, inversedBy="registrations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $tournament;

    public function __construct(Player $player, Tournament $tournament)
    {
        $this->forfeit = false;
        $this->player = $player;
        $this->tournament = $tournament;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setForfeit(bool $forfeit): self
    {
        $this->forfeit = $forfeit;

        return $this;
    }

    public function isForfeit(): bool
    {
        return $this->forfeit;
    }

    public function getPlayer(): Player
    {
        return $this->player;
    }

    public function getTournament(): Tournament
    {
        return $this->tournament;
    }
}
