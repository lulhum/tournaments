<?php

namespace App\Entity;

use App\Entity\Phase\AbstractPhase;
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
     * @ORM\ManyToOne(targetEntity=AbstractPhase::class, inversedBy="rounds")
     * @ORM\JoinColumn(nullable=false)
     */
    private $phase;

    /**
     * @ORM\OneToMany(targetEntity=Serie::class, mappedBy="round")
     * @ORM\OrderBy({"weight"="ASC", "id"="ASC"})
     */
    private $series;

    public function __construct(AbstractPhase $phase)
    {
        $this->phase = $phase;
        $this->series = new ArrayCollection();
        $this->weight = 0;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPhase(): AbstractPhase
    {
        return $this->phase;
    }

    public function getSeries(): Collection
    {
        return $this->series;
    }
}
