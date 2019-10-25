<?php

namespace App\Entity\Phase;

use App\Entity\Round;
use App\Entity\Tournament;
use App\Entity\WeightableTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 */
abstract class AbstractPhase
{
    use WeightableTrait;
    
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $maxPlayers;

    /**
     * @ORM\ManyToOne(targetEntity=Tournament::class, inversedBy="phases")
     * @ORM\JoinColumn(nullable=false)
     */
    private $phase;
    
    /**
     * @ORM\OneToMany(targetEntity=Round::class, mappedBy="phase")
     * @ORM\OrderBy({"weight"="ASC", "id"="ASC"})
     */
    protected $rounds;

    public function __construct(Tournament $tournament)
    {
        $this->tournament = $tournament;
        $this->rounds = new ArrayCollection();
        $this->weight = 0;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTournament(): Tournament
    {
        return $this->tournament;
    }

    public function setMaxPlayers(int $maxPlayers): self
    {
        $this->maxPlayers = $maxPlayers;

        return $this;
    }

    public function getMaxPlayers(): ?int
    {
        return $this->maxPlayers;
    }

    public function getRounds(): Collection
    {
        return $this->rounds;
    }
}
