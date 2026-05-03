<?php
namespace App\Models;
use App\Models\BaseEntity;

class Enseignements extends BaseEntity {
    private $professeur_id;
    private $matiere_id;
    private $classe_id;
    private $semestre_id;
    public function __construct($professeur_id = null, $matiere_id = null, $classe_id = null, $semestre_id = null) {
        parent::__construct();
        $this->professeur_id = $professeur_id;
        $this->matiere_id = $matiere_id;
        $this->classe_id = $classe_id;
        $this->semestre_id = $semestre_id;
    }

    public function getProfesseurId() {
        return $this->professeur_id;
    }

    public function getMatiereId() {
        return $this->matiere_id;
    }

    public function getClasseId() {
        return $this->classe_id;
    }

    public function getSemestreId() {
        return $this->semestre_id;
    }
    public function setProfesseurId($professeur_id) {
        $this->professeur_id = $professeur_id;
    }
    public function setMatiereId($matiere_id) {
        $this->matiere_id = $matiere_id;
    }
    public function setClasseId($classe_id) {
        $this->classe_id = $classe_id;
    }
    public function setSemestreId($semestre_id) {
        $this->semestre_id = $semestre_id;
    }

    public function toArray(): array {
        $data = [
            'id' => $this->id,
            'professeur_id' => $this->professeur_id,
            'matiere_id' => $this->matiere_id,
            'classe_id' => $this->classe_id,
            'semestre_id' => $this->semestre_id,
        ];
        return $data;
    }
}