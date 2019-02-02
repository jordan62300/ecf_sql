<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SerieRepository")
 */
class Serie
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
    private $serie_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $serie_genre;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Genre", mappedBy="serie_genre")
     */
    private $genres;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Platform", mappedBy="teste")
     */
    private $platforms;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Users", mappedBy="viewed")
     */
    private $users;

    public function __construct()
    {
        $this->genres = new ArrayCollection();
        $this->platforms = new ArrayCollection();
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSerieName(): ?string
    {
        return $this->serie_name;
    }

    public function setSerieName(string $serie_name): self
    {
        $this->serie_name = $serie_name;

        return $this;
    }

    public function getSerieGenre(): ?string
    {
        return $this->serie_genre;
    }

    public function setSerieGenre(string $serie_genre): self
    {
        $this->serie_genre = $serie_genre;

        return $this;
    }

    /**
     * @return Collection|Genre[]
     */
    public function getGenres(): Collection
    {
        return $this->genres;
    }

    public function addGenre(Genre $genre): self
    {
        if (!$this->genres->contains($genre)) {
            $this->genres[] = $genre;
            $genre->addSerieGenre($this);
        }

        return $this;
    }

    public function removeGenre(Genre $genre): self
    {
        if ($this->genres->contains($genre)) {
            $this->genres->removeElement($genre);
            $genre->removeSerieGenre($this);
        }

        return $this;
    }

    /**
     * @return Collection|Platform[]
     */
    public function getPlatforms(): Collection
    {
        return $this->platforms;
    }

    public function addPlatform(Platform $platform): self
    {
        if (!$this->platforms->contains($platform)) {
            $this->platforms[] = $platform;
            $platform->addTeste($this);
        }

        return $this;
    }

    public function removePlatform(Platform $platform): self
    {
        if ($this->platforms->contains($platform)) {
            $this->platforms->removeElement($platform);
            $platform->removeTeste($this);
        }

        return $this;
    }

    /**
     * @return Collection|Users[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(Users $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->addViewed($this);
        }

        return $this;
    }

    public function removeUser(Users $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            $user->removeViewed($this);
        }

        return $this;
    }
}
