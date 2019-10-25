<?php

namespace App\Entity;

trait WeightableTrait
{
    /**
     * @ORM\Column(type="integer")
     */
    protected $weight;

    public function setWeight(int $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getWeight(): ?int
    {
        return $this->weight;
    }
}
