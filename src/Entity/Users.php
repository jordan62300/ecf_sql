<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UsersRepository")
 */
class Users
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
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Serie", inversedBy="users")
     */
    private $viewed;

    public function __construct()
    {
        $this->viewed = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Serie[]
     */
    public function getViewed(): Collection
    {
        return $this->viewed;
    }

    public function addViewed(Serie $viewed): self
    {
        if (!$this->viewed->contains($viewed)) {
            $this->viewed[] = $viewed;
        }

        return $this;
    }

    public function removeViewed(Serie $viewed): self
    {
        if ($this->viewed->contains($viewed)) {
            $this->viewed->removeElement($viewed);
        }

        return $this;
    }
}
