<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GenreRepository")
 */
class Genre
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
    private $genre_name;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Serie", inversedBy="genres")
     */
    private $serie_genre;

    public function __construct()
    {
        $this->serie_genre = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGenreName(): ?string
    {
        return $this->genre_name;
    }

    public function setGenreName(string $genre_name): self
    {
        $this->genre_name = $genre_name;

        return $this;
    }

    /**
     * @return Collection|Serie[]
     */
    public function getSerieGenre(): Collection
    {
        return $this->serie_genre;
    }

    public function addSerieGenre(Serie $serieGenre): self
    {
        if (!$this->serie_genre->contains($serieGenre)) {
            $this->serie_genre[] = $serieGenre;
        }

        return $this;
    }

    public function removeSerieGenre(Serie $serieGenre): self
    {
        if ($this->serie_genre->contains($serieGenre)) {
            $this->serie_genre->removeElement($serieGenre);
        }

        return $this;
    }
}
