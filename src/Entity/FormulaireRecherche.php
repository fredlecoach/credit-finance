<?php

namespace App\Entity;

use App\Repository\FormulaireRechercheRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FormulaireRechercheRepository::class)]
class FormulaireRecherche
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $departement = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $type = null;

    #[ORM\Column(nullable: true)]
    private ?int $surfaceMin = null;

    #[ORM\Column(nullable: true)]
    private ?int $prixMin = null;

    #[ORM\Column(nullable: true)]
    private ?int $prixMax = null;

    #[ORM\Column(nullable: true)]
    private ?int $loyerMin = null;

    #[ORM\Column(nullable: true)]
    private ?int $loyerMax = null;

    #[ORM\Column(nullable: true)]
    private ?int $rentabilite = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDepartement(): ?string
    {
        return $this->departement;
    }

    public function setDepartement(?string $departement): static
    {
        $this->departement = $departement;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getSurfaceMin(): ?int
    {
        return $this->surfaceMin;
    }

    public function setSurfaceMin(?int $surfaceMin): static
    {
        $this->surfaceMin = $surfaceMin;

        return $this;
    }

    public function getPrixMin(): ?int
    {
        return $this->prixMin;
    }

    public function setPrixMin(?int $prixMin): static
    {
        $this->prixMin = $prixMin;

        return $this;
    }

    public function getPrixMax(): ?int
    {
        return $this->prixMax;
    }

    public function setPrixMax(?int $prixMax): static
    {
        $this->prixMax = $prixMax;

        return $this;
    }

    public function getLoyerMin(): ?int
    {
        return $this->loyerMin;
    }

    public function setLoyerMin(?int $loyerMin): static
    {
        $this->loyerMin = $loyerMin;

        return $this;
    }

    public function getLoyerMax(): ?int
    {
        return $this->loyerMax;
    }

    public function setLoyerMax(?int $loyerMax): static
    {
        $this->loyerMax = $loyerMax;

        return $this;
    }

    public function getRentabilite(): ?int
    {
        return $this->rentabilite;
    }

    public function setRentabilite(?int $rentabilite): static
    {
        $this->rentabilite = $rentabilite;

        return $this;
    }
}
