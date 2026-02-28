<?php
namespace App\Models;

use DateTime;

 class User extends BaseEntity{
    private string $prenom;
    private string $nom;
    private string $email;
    private string $password;
    private string $role;

        public function __construct(string $nom = '', 
    string $prenom = '', 
    string $email = '',
     string $password = '',string $role = '') {
        parent::__construct(); // Appel au constructeur parent
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }

    public function getPrenom(): string{
        return $this->prenom;
    }
     public function getNom(): string{
        return $this->nom;
    }
    public function getEmail(): string{
        return $this->email;
    }
    public function getPassword(): string{
        return $this->password;
    }
    public function getRole(): string{
        return $this->role;
    }
        public function getPasswordHash(): string {
        return $this->password;
    }

        // Setters: Modifier les attributs privés

    public function setNom(string $nom): self
    {
        $this->nom = $nom;
        return $this;
    }
    public function setPrenom(string $prenom): self {
        $this->prenom = trim($prenom);
        return $this; //Pour le chaînage
    }
    public function setEmail(string $email): self {
        $this->email = strtolower(trim($email));
        return $this; //Pour le chaînage
    }



    public function setRole(?string $role): self {
        // Validation simple avec : admin, member
        if(in_array($role, ['profeseur', 'etudiant'])) {
            $this->role = $role;
        }
        return $this;
    }



    /**
     * Définir le mot de passe de l'utilisateur (hashé automatiquement)
     * 
     */
    public function setPassword(string $password): self {
        // hachage du mots de passe 
        $this->password = password_hash($password, PASSWORD_BCRYPT);
        return $this;
    }

    // Ajouter une autre methode pour setter le mot de passe sans le hasher
    public function setPasswordHash(string $passwordHash): self {
        $this->password = $passwordHash;
        return $this;
    }
      // verfication du mots de passe comparaison avec celui hacher dans la base de donnner 
    public function verifyPassword(string $password): bool {
        return password_verify($password, $this->password);
    }


    public function toArray(): array
    {
        return [
            'id'=> $this->id,
            'prenom' => $this->prenom,
            'nom'=> $this->nom,
            'email'=> $this->email,
            'password'=> $this->password,
            'createdAt'=> $this->createdAt ? $this->createdAt->format('Y-m-d h:i:s') : null,
            'updatedAt'=> $this->updatedAt ? $this->createdAt->format('Y-m-d h:i:s') : null,
        ];
    }

}