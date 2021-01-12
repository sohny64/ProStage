<?php

namespace App\Entity;

use App\Repository\StageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StageRepository::class)
 */
class Stage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $descriptif;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $duree;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $competencesRequises;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $experienceRequise;

    /**
     * @ORM\ManyToOne(targetEntity=Formation::class, inversedBy="Stage")
	 * @ORM\JoinColumn(nullable=false)
	 */
    private $Formation;

    /**
     * @ORM\ManyToOne(targetEntity=Entreprise::class, inversedBy="Stage")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Entreprise;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescriptif(): ?string
    {
        return $this->descriptif;
    }

    public function setDescriptif(?string $descriptif): self
    {
        $this->descriptif = $descriptif;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(?\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDuree(): ?string
    {
        return $this->duree;
    }

    public function setDuree(?string $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getCompetencesRequises(): ?string
    {
        return $this->competencesRequises;
    }

    public function setCompetencesRequises(?string $competencesRequises): self
    {
        $this->competencesRequises = $competencesRequises;

        return $this;
    }

    public function getExperienceRequise(): ?string
    {
        return $this->experienceRequise;
    }

    public function setExperienceRequise(?string $experienceRequise): self
    {
        $this->experienceRequise = $experienceRequise;

        return $this;
    }

    public function getFormation(): ?Formation
    {
        return $this->Formation;
    }

    public function setFormation(Formation $Formation): self
    {
        $this->Formation = $Formation;
   
        return $this;
    }

    public function getEntreprise(): ?Entreprise
    {
        return $this->Entreprise;
    }

    public function setEntreprise(?Entreprise $Entreprise): self
    {
        $this->Entreprise = $Entreprise;

        return $this;
    }
}
