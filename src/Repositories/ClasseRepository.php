<?php
namespace App\Repositories;

use App\Config\Database;
use App\Models\Classe;
use PDO;

class ClasseRepository {
    protected string $tableName = 'classes';
  
    private Database $db;
    private PDO $pdo;

    public function __construct() {
        $this->db = Database::getInstance();
        $this->pdo = $this->db->getConnection();
       
    }
   protected function hydrate(array $data): Classe {
        return new Classe(
            $data['id'],
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

    public function findAll(): array {
        try {
            $sql = "SELECT * FROM {$this->tableName} ORDER BY created_at DESC";
            $stmt = $this->pdo->prepare($sql);// Prepare la requête
            $stmt->execute();
            $results = $stmt->fetchAll(); // Tableau de tableaux associatifs
            return $this->hydrateMultiple($results);
        } catch (PDOException $e) {
             $this->logError($e);
            return [];
        }
    }
    public function findById(int $id): ?Classe {
        $stmt = $this->db->getConnection()->prepare("SELECT * FROM {$this->tableName} WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row) {
            return new Classe(
                $row['id'],
                $row['nom_classe'],
                $row['niveau'],
                $row['filiere']
            );
        }
        return null;
    }

    public function save(Classe $classe): bool {
        if($classe->getId()) {
            $stmt = $this->db->getConnection()->prepare("UPDATE {$this->tableName} SET nom = ?, niveau = ?, filiere = ? WHERE id = ?");
            return $stmt->execute([$classe->getNom(), $classe->getNiveau(), $classe->getFiliere(), $classe->getId()]);
        } else {
            $stmt = $this->db->getConnection()->prepare("INSERT INTO {$this->tableName} (nom, niveau, filiere) VALUES (?, ?, ?)");
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