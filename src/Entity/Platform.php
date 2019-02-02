<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlatformRepository")
 */
class Platform
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $platform_name;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Serie", inversedBy="platforms")
     */
    private $teste;

    public function __construct()
    {
        $this->teste = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlatformName(): ?string
    {
        return $this->platform_name;
    }

    public function setPlatformName(string $platform_name): self
    {
        $this->platform_name = $platform_name;

        return $this;
    }

    /**
     * @return Collection|Serie[]
     */
    public function getTeste(): Collection
    {
        return $this->teste;
    }

    public function addTeste(Serie $teste): self
    {
        if (!$this->teste->contains($teste)) {
            $this->teste[] = $teste;
        }

        return $this;
    }

    public function removeTeste(Serie $teste): self
    {
        if ($this->teste->contains($teste)) {
            $this->teste->removeElement($teste);
        }

        return $this;
    }
}
