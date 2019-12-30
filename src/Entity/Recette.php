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
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="recettes")
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
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $typeplat;


    /**
     * @ORM\Column(type="integer")
     */
    private $difficulte;

    /**
     * @ORM\Column(type="integer")
     */
    private $cout;

    /**
     * @ORM\Column(type="integer")
     */
    private $preparation;

    /**
     * @ORM\Column(type="integer")
     */
    private $cuisson;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $typecuisson;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ingredient;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $etape;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $boisson;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $remarque;


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

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getTypeplat(): ?string
    {
        return $this->typeplat;
    }

    public function setTypeplat(string $typeplat): self
    {
        $this->typeplat = $typeplat;

        return $this;
    }


    public function getDifficulte(): ?int
    {
        return $this->difficulte;
    }

    public function setDifficulte(int $difficulte): self
    {
        $this->difficulte = $difficulte;

        return $this;
    }

    public function getCout(): ?int
    {
        return $this->cout;
    }

    public function setCout(int $cout): self
    {
        $this->cout = $cout;

        return $this;
    }

    public function getPreparation(): ?int
    {
        return $this->preparation;
    }

    public function setPreparation(int $preparation): self
    {
        $this->preparation = $preparation;

        return $this;
    }

    public function getCuisson(): ?int
    {
        return $this->cuisson;
    }

    public function setCuisson(int $cuisson): self
    {
        $this->cuisson = $cuisson;

        return $this;
    }

    public function getTypecuisson(): ?string
    {
        return $this->typecuisson;
    }

    public function setTypecuisson(string $typecuisson): self
    {
        $this->typecuisson = $typecuisson;

        return $this;
    }

    public function getIngredient(): ?string
    {
        return $this->ingredient;
    }

    public function setIngredient(string $ingredient): self
    {
        $this->ingredient = $ingredient;

        return $this;
    }

    public function getEtape(): ?string
    {
        return $this->etape;
    }

    public function setEtape(string $etape): self
    {
        $this->etape = $etape;

        return $this;
    }

    public function getBoisson(): ?string
    {
        return $this->boisson;
    }

    public function setBoisson(string $boisson): self
    {
        $this->boisson = $boisson;

        return $this;
    }

    public function getRemarque(): ?string
    {
        return $this->remarque;
    }

    public function setRemarque(string $remarque): self
    {
        $this->remarque = $remarque;

        return $this;
    }
}
