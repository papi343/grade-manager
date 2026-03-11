<?php
namespace App\Repositories;

use App\Config\Database;
use App\Models\Classe;
use PDO;

class ClasseRepository extends BaseRepository {
    protected string $tableName = 'classes';
  


   protected function hydrate(array $data): Classe {
        return new Classe(
            $data['nomclasse'],
            $data['filiere'],
            $data['niveau']
        );
    }
    public function hydrateMultiple(array $results): array {
        $entities = [];
        foreach ($results as $row) {
            $entities[] = $this->hydrate($row);
        }
        return $entities;
    }


    public function save(Classe $classe): bool {
        if($classe->getId()) {
            $stmt = $this->db->getConnection()->prepare("UPDATE {$this->tableName} SET nomclasse = ?, niveau = ?, filiere = ? WHERE id = ?");
            return $stmt->execute([$classe->getNom(), $classe->getNiveau(), $classe->getFiliere(), $classe->getId()]);
        } else {
            $stmt = $this->db->getConnection()->prepare("INSERT INTO {$this->tableName} (nomclasse, niveau, filiere) VALUES (?, ?, ?)");
            return $stmt->execute([$classe->getNom(), $classe->getNiveau(), $classe->getFiliere()]);
        }
    }

    // protected function hydrate(array $data): Classe {
    //     return new Classe(
    //         $data['id'],
    //         $data['nom_classe'],
    //         $data['niveau'],
    //         $data['filiere']
    //     );
    // }
}