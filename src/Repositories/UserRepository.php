<?php
namespace App\Repositories;

use App\Models\User;
use App\Models\BaseEntity;

class UserRepository extends BaseRepository {
    protected string $tableName = 'professeurs';

    protected function hydrate(array $data): User
    { 
        $user = new User();
        
       $user ->setNom($data['nom'])
             ->setPrenom($data['prenom'])
             ->setEmail($data['email'])
             ->setPasswordHash($data['password']) // Charger le hash depuis la DB
             ->setRole($data['role'] ?? null)
             ->setCreatedAt(new \DateTime($data['created_at']))
             ->setUpdatedAt(new \DateTime($data['updated_at']))
             ->setId((int)$data['id']);
        return $user;
    }

    public function findByEmail(string $email): ?User {
        try {
            $sql = "SELECT * FROM {$this->tableName} WHERE email = :email";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':email', $email, \PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(); // Tableau associatif ou false
            /* var_dump($result);
            die('ici'); */
            if ($result) {
                return $this->hydrate($result);
            }
            return null;
        } catch (\PDOException $e) {
            $this->logError($e);
            return null;
        }
    }

    public function save(User $user): bool {
        if ($user->getId() === null) {
            // Insertion
            $sql = "INSERT INTO {$this->tableName} (nom, prenom, email, password, created_at, updated_at)
                    VALUES (:nom, :prenom, :email, :password, NOW(), NOW())";
            $params = [
                ':nom' => $user->getNom(),
                ':prenom' => $user->getPrenom(),
                ':email' => $user->getEmail(),
                ':password' => $user->getPasswordHash(),
            ];
            $success = $this->executeCommand($sql, $params);
            if ($success) {
                $user->setId($this->lastInsertId());
            }
            return $success;
        } else {
            // Mise à jour
            $sql = "UPDATE {$this->tableName} SET
                    nom = :nom,
                    prenom = :prenom,
                    email = :email,
                    password = :password,
                    updated_at = NOW()
                    WHERE id = :id";
            $params = [
                ':nom' => $user->getNom(),
                ':prenom' => $user->getPrenom(),
                ':email' => $user->getEmail(),
                ':password' => $user->getPasswordHash(),
                ':id' => $user->getId(),
            ];
            return $this->executeCommand($sql, $params);
        }
    }
}