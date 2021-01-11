<?php

namespace App\Entity;

use App\Repository\FormationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FormationRepository::class)
 */
class Formation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $intitule;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $niveau;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $ville;

    /**
     * @ORM\ManyToMany(targetEntity=Stage::class, mappedBy="Formation")
     */
    private $Stage;

    public function __construct()
    {
        $this->Stage = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIntitule(): ?string
    {
        return $this->intitule;
    }

    public function setIntitule(string $intitule): self
    {
        $this->intitule = $intitule;

        return $this;
    }

    public function getNiveau(): ?string
    {
        return $this->niveau;
    }

    public function setNiveau(?string $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * @return Collection|Stage[]
     */
    public function getStage(): Collection
    {
        return $this->Stage;
    }

    public function addStage(Stage $stage): self
    {
        if (!$this->Stage->contains($stage)) {
            $this->Stage[] = $stage;
            $stage->addFormation($this);
        }

        return $this;
    }

    public function removeStage(Stage $stage): self
    {
        if ($this->Stage->removeElement($stage)) {
            $stage->removeFormation($this);
        }

        return $this;
    }
}
