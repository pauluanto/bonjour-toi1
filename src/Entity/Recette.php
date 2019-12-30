<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RecetteRepository")
 */
class Recette
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="recette")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Step", mappedBy="recette")
     */
    private $steps;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Notation", mappedBy="recette")
     */
    private $notations;


    /**
     * @ORM\Column(type="integer")
     */
    private $user_id;



    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $citation;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $poid;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $taille;

    /**
     * @ORM\Column(type="integer")
     */
    private $age;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sexe;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $musique;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $film;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $livre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $activitefavorite;


    public function __construct()
    {
        $this->steps = new ArrayCollection();
        $this->notations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|Step[]
     */
    public function getSteps(): Collection
    {
        return $this->steps;
    }

    public function addStep(Step $step): self
    {
        if (!$this->steps->contains($step)) {
            $this->steps[] = $step;
            $step->setRecette($this);
        }

        return $this;
    }

    public function removeStep(Step $step): self
    {
        if ($this->steps->contains($step)) {
            $this->steps->removeElement($step);
            // set the owning side to null (unless already changed)
            if ($step->getRecette() === $this) {
                $step->setRecette(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Notation[]
     */
    public function getNotations(): Collection
    {
        return $this->notations;
    }

    public function addNotation(Notation $notation): self
    {
        if (!$this->notations->contains($notation)) {
            $this->notations[] = $notation;
            $notation->setRecette($this);
        }

        return $this;
    }

    public function removeNotation(Notation $notation): self
    {
        if ($this->notations->contains($notation)) {
            $this->notations->removeElement($notation);
            // set the owning side to null (unless already changed)
            if ($notation->getRecette() === $this) {
                $notation->setRecette(null);
            }
        }

        return $this;
    }

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }



    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }


    public function getCitation(): ?string
    {
        return $this->citation;
    }

    public function setCitation(string $citation): self
    {
        $this->citation = $citation;

        return $this;
    }

    public function getPoid(): ?int
    {
        return $this->poid;
    }

    public function setPoid(int $poid): self
    {
        $this->poid = $poid;

        return $this;
    }

    public function getTaille(): ?int
    {
        return $this->taille;
    }

    public function setTaille(int $taille): self
    {
        $this->taille = $taille;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMusique(): ?string
    {
        return $this->musique;
    }

    /**
     * @param mixed $musique
     */
    public function setMusique($musique): void
    {
        $this->musique = $musique;
    }

    /**
     * @return mixed
     */
    public function getFilm(): ?string
    {
        return $this->film;
    }

    /**
     * @param mixed $film
     */
    public function setFilm($film): void
    {
        $this->film = $film;
    }

    /**
     * @return mixed
     */
    public function getLivre(): ?string
    {
        return $this->livre;
    }

    /**
     * @param mixed $livre
     */
    public function setLivre($livre): void
    {
        $this->livre = $livre;
    }

    /**
     * @return mixed
     */
    public function getActivitefavorite(): ?string
    {
        return $this->activitefavorite;
    }

    /**
     * @param mixed $activitefavorite
     */
    public function setActivitefavorite($activitefavorite): void
    {
        $this->activitefavorite = $activitefavorite;
    }

}
