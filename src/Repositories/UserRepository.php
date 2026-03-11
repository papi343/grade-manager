<?php
namespace App\Repositories;

use App\Models\User;
use App\Models\BaseEntity;

class UserRepository extends BaseRepository {

    protected string $tableName = 'users';

    protected function hydrate(array $data): User
    { 
        $user = new User();
        $user->setId((int)$data['id'])
             ->setNom($data['nom'])
             ->setPrenom($data['prenom'])
             ->setEmail($data['email'])
             ->setPasswordHash($data['password']) // Charger le hash depuis la DB
             ->setRole($data['role'] ?? null)
             ->setIdClasse($data['classe_id'] ?? null)
             ->setPasswordVerifyAt($data['password_verify_at'] ?? null)
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
            $sql = "INSERT INTO {$this->tableName} (nom, prenom, email, password, role,classe_id,password_verify_at, created_at, updated_at)
                    VALUES (:nom, :prenom, :email, :password, :role, :classe_id,:password_verify_at, NOW(), NOW())";
            $params = [
                ':nom' => $user->getNom(),
                ':prenom' => $user->getPrenom(),
                ':email' => $user->getEmail(),
                ':password' => $user->getPassword(),
                ':role' => $user->getRole(),
                ':classe_id' => $user->getIdClasse(),
                ':password_verify_at' => $user->getPasswordVerifyAt(),

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
                    role = :role,
                    classe_id = :classe_id,
                    password_verify_at = :password_verify_at,
                    updated_at = NOW()
                    WHERE id = :id";
            $params = [
                ':nom' => $user->getNom(),
                ':prenom' => $user->getPrenom(),
                ':email' => $user->getEmail(),
                ':password' => $user->getPasswordHash(),
                ':role' => $user->getRole(),
                ':classe_id' => $user->getIdClasse(),
                ':password_verify_at' => $user->getPasswordVerifyAt(),
                ':id' => $user->getId(),
            ];
            return $this->executeCommand($sql, $params);
        }
    }
}