<?php

namespace App\Entity\Phase;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class SwissPhase extends AbstractPhase
{
    /**
     * @ORM\Column(type="integer")
     */
    protected $numberOfRounds;

    public function setNumberOfRounds(int $numberOfRounds): self
    {
        $this->numberOfRounds = $numberOfRounds;

        return $this;
    }

    public function getNumberOFRounds(): ?int
    {
        return $this->numberOfRounds;
    }
}
