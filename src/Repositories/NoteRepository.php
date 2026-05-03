<?php
namespace App\Repositories;

use App\Models\Note;
use App\Models\BaseEntity;
use PDO;

class NoteRepository extends BaseRepository {
    protected string $tableName = 'notes';

    protected function hydrate(array $data): BaseEntity {
        $note = new Note(
            (int)$data['etudiant_id'],
            (int)$data['matiere_id'],
            (int)$data['semestre_id'],
            isset($data['note_devoir']) ? (float)$data['note_devoir'] : null,
            isset($data['note_examen']) ? (float)$data['note_examen'] : null
        );
        $note->setId((int)$data['id']);
        return $note;
    }

    public function findByCriteria(int $studentId, int $matiereId, int $semestreId): ?Note {
        $sql = "SELECT * FROM {$this->tableName} WHERE etudiant_id = ? AND matiere_id = ? AND semestre_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$studentId, $matiereId, $semestreId]);
        $result = $stmt->fetch();
        
        return $result ? $this->hydrate($result) : null;
    }

    public function save(Note $note): bool {
        if ($note->getId()) {
            $sql = "UPDATE {$this->tableName} SET note_devoir = ?, note_examen = ?, updated_at = NOW() WHERE id = ?";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([
                $note->getNoteDevoir(),
                $note->getNoteExamen(),
                $note->getId()
            ]);
        } else {
            $sql = "INSERT INTO {$this->tableName} (etudiant_id, matiere_id, semestre_id, note_devoir, note_examen, created_at, updated_at) VALUES (?, ?, ?, ?, ?, NOW(), NOW())";
            $stmt = $this->pdo->prepare($sql);
            $success = $stmt->execute([
                $note->getEtudiantId(),
                $note->getMatiereId(),
                $note->getSemestreId(),
                $note->getNoteDevoir(),
                $note->getNoteExamen()
            ]);
            if ($success) {
                $note->setId((int)$this->pdo->lastInsertId());
            }
            return $success;
        }
    }
}
