<?php
namespace App\Models;

class Semestre extends BaseEntity {
    private string $nom;
    private string $niveau;
    private string $filiere;

    public function __construct(string $nom = '', string $niveau = '', string $filiere = '') {
        parent::__construct();
        $this->nom = $nom;
        $this->niveau = $niveau;
        $this->filiere = $filiere;
    }

    public function getNom(): string {
        return $this->nom;
    }

    public function setNom(string $nom): self {
        $this->nom = $nom;
        return $this;
    }

    public function getNiveau(): string {
        return $this->niveau;
    }

    public function setNiveau(string $niveau): self {
        $this->niveau = $niveau;
        return $this;
    }

    public function getFiliere(): string {
        return $this->filiere;
    }

    public function setFiliere(string $filiere): self {
        $this->filiere = $filiere;
        return $this;
    }

    public function toArray(): array {
        return [
            'id' => $this->id,
            'nom' => $this->nom,
            'niveau' => $this->niveau,
            'filiere' => $this->filiere,
            'createdAt' => $this->createdAt ? $this->createdAt->format('Y-m-d H:i:s') : null,
            'updatedAt' => $this->updatedAt ? $this->updatedAt->format('Y-m-d H:i:s') : null,
        ];
    }
}
