<?php
namespace App\Repositories;
use App\Models\Matieres;
use App\Models\BaseEntity;
use PDO;

class MatiereRepository extends BaseRepository {
    protected string $tableName = 'matieres';
  


    protected function hydrate(array $data): BaseEntity {
        $matiere = new Matieres(
            $data['libelle'] ?? $data['libeller'] ?? $data['nommatiere'] ?? '',
            null, // id_prof
            null  // id_classe
        );
        $matiere->setId((int)($data['id'] ?? 0));
        return $matiere;
    }

    public function save(Matieres $matiere): bool {
        if($matiere->getId()) {
            $stmt = $this->pdo->prepare("UPDATE {$this->tableName} SET nommatiere = ? WHERE id = ?");
            return $stmt->execute([$matiere->getLibeller(), $matiere->getId()]);
        } else {
            $stmt = $this->pdo->prepare("INSERT INTO {$this->tableName} (nommatiere) VALUES (?)");
            $success = $stmt->execute([$matiere->getLibeller()]);
            if ($success) {
                $matiere->setId((int)$this->pdo->lastInsertId());
            }
            return $success;
        }
    }
    
    // protected function hydrate(array $data): Matiere {
    //     return new Matiere(
    //         $data['id'],
    //         $data['nom_matiere'],
    //         $data['niveau'],
    //         $data['filiere']
    //     );
    // }
}