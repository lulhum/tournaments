<?php

namespace App\Entity;

use App\Entity\Phase\AbstractPhase;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Tournament
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Registration::class, mappedBy="tournament")
     */
    private $registrations;

    /**
     * @ORM\OneToMany(targetEntity=AbstractPhase::class, mappedBy="tournament")
     * @ORM\OrderBy({"weight"="ASC", "id"="ASC"})
     */
    private $phases;

    public function __construct(Tournament $tournament)
    {
        $this->registrations = new ArrayCollection();
        $this->phases = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRegistrations(): Collection
    {
        return $this->registrations;
    }

    public function getPhases(): Collection
    {
        return $this->phases;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }
}
