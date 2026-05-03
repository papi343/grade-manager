<?php
namespace App\Repositories;

use App\Config\Database;
use App\Models\Semestre;
use App\Models\BaseEntity;
use PDO;

class SemestreRepository extends BaseRepository {
    protected string $tableName = 'semestres';
  


    protected function hydrate(array $data): BaseEntity {
        $semestre = new Semestre(
            $data['nomSemestre'] ?? $data['nom'] ?? $data['nom_semestre'] ?? '',
            $data['niveau'] ?? '',
            $data['filiere'] ?? ''
        );
        $semestre->setId((int)($data['id'] ?? 0));
        return $semestre;
    }

    public function save(Semestre $semestre): bool {
        if($semestre->getId()) {
            $stmt = $this->pdo->prepare("UPDATE {$this->tableName} SET nom = ? WHERE id = ?");
            return $stmt->execute([$semestre->getNom(), $semestre->getId()]);
        } else {
            $stmt = $this->pdo->prepare("INSERT INTO {$this->tableName} (nom) VALUES (?)");
            $success = $stmt->execute([$semestre->getNom()]);
            if ($success) {
                $semestre->setId((int)$this->pdo->lastInsertId());
            }
            return $success;
        }
    }

    // protected function hydrate(array $data): Semestre {
    //     return new Semestre(
    //         $data['id'],
    //         $data['nom_matiere'],
    //         $data['niveau'],
    //         $data['filiere']
    //     );
    // }
}