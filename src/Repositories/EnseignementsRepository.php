<?php
namespace App\Repositories;

use App\Models\Enseignements;
use App\Models\BaseEntity;

class EnseignementsRepository extends BaseRepository {
    protected string $tableName = 'enseignements';

    public function getAllEnseignements() {
        $query = "SELECT * FROM {$this->tableName}";
        $stmt = $this->pdo->query($query);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getEnseignementById($id) {
        $query = "SELECT * FROM {$this->tableName} WHERE id = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function createEnseignement  (Enseignements $enseignements) {
        $query = "INSERT INTO {$this->tableName} (professeur_id, matiere_id, classe_id, semestre_id, created_at, updated_at) VALUES (?, ?, ?, ?, NOW(), NOW())";
        $stmt = $this->pdo->prepare($query);
        return $stmt->execute([$enseignements->getProfesseurId(), $enseignements->getMatiereId(), $enseignements->getClasseId(), $enseignements->getSemestreId()]);
    }

    public function updateEnseignement($id, $data) {
        $query = "UPDATE {$this->tableName} SET professeur_id = ?, matiere_id = ?, classe_id = ?, semestre_id = ?, updated_at = NOW() WHERE id = ?";
        $stmt = $this->pdo->prepare($query);
        return $stmt->execute([$data['professeur_id'], $data['matiere_id'], $data['classe_id'], $data['semestre_id'], $id]);
    }

    public function deleteEnseignement($id) {
        $query = "DELETE FROM {$this->tableName} WHERE id = ?";
        $stmt = $this->pdo->prepare($query);
        return $stmt->execute([$id]);
    }
    protected function hydrate(array $data): BaseEntity {
        $enseignements = new Enseignements($data['professeur_id'], $data['matiere_id'], $data['classe_id'], $data['semestre_id']);
        $enseignements->setId((int)$data['id']);
        $enseignements->setCreatedAt(isset($data['created_at']) ? new \DateTime($data['created_at']) : new \DateTime());
        $enseignements->setUpdatedAt(isset($data['updated_at']) ? new \DateTime($data['updated_at']) : new \DateTime());
        return $enseignements;
    }

}