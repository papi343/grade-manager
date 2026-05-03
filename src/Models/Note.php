<?php
namespace App\Models;

class Note extends BaseEntity {
    private int $etudiant_id;
    private int $matiere_id;
    private int $semestre_id;
    private ?float $note_devoir;
    private ?float $note_examen;

    public function __construct(int $etudiant_id = 0, int $matiere_id = 0, int $semestre_id = 0, ?float $note_devoir = null, ?float $note_examen = null) {
        parent::__construct();
        $this->etudiant_id = $etudiant_id;
        $this->matiere_id = $matiere_id;
        $this->semestre_id = $semestre_id;
        $this->note_devoir = $note_devoir;
        $this->note_examen = $note_examen;
    }

    public function getEtudiantId(): int { return $this->etudiant_id; }
    public function setEtudiantId(int $id): self { $this->etudiant_id = $id; return $this; }

    public function getMatiereId(): int { return $this->matiere_id; }
    public function setMatiereId(int $id): self { $this->matiere_id = $id; return $this; }

    public function getSemestreId(): int { return $this->semestre_id; }
    public function setSemestreId(int $id): self { $this->semestre_id = $id; return $this; }

    public function getNoteDevoir(): ?float { return $this->note_devoir; }
    public function setNoteDevoir(?float $note): self { $this->note_devoir = $note; return $this; }

    public function getNoteExamen(): ?float { return $this->note_examen; }
    public function setNoteExamen(?float $note): self { $this->note_examen = $note; return $this; }

    public function toArray(): array {
        return [
            'id' => $this->id,
            'etudiant_id' => $this->etudiant_id,
            'matiere_id' => $this->matiere_id,
            'semestre_id' => $this->semestre_id,
            'note_devoir' => $this->note_devoir,
            'note_examen' => $this->note_examen,
            'createdAt' => $this->createdAt ? $this->createdAt->format('Y-m-d H:i:s') : null,
            'updatedAt' => $this->updatedAt ? $this->updatedAt->format('Y-m-d H:i:s') : null,
        ];
    }
}
