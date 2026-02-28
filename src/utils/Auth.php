<?php

namespace App\Utils;

use App\Models\User;
use App\Repositories\UserRepository;

class Auth {
 /**
  * Utilisateur en cache
  */
  private static ?User $currentUser = null;

  /**
     * Verifier si un utilisateur est connecté
     * 
     * @return bool True si un utilisateur est connecté, sinon false
  */
  public static function check(): bool {
    Session::start();
    return Session::has('user_id');
  }



  /**
   * Connecter un utilisateur
   * 
   * @param User $user
   * @return void
   */
  public static function login(User $user): void {
    Session::start();
    Session::set('user_id', $user->getId());

    //Mettre en cache l'utilisateur connecté
    self::$currentUser = $user;
  }

  /** Déconnecter l'utilisateur */
  public static function logout(): void {
    Session::destroy();
    self::$currentUser = null;
  }

  /**
   * Récupérer l'utilisateur connecté
   */
  public static function id(): ?int {
    if (!self::check()) {
      return null;
    }
    return Session::get('user_id');
  }

  /**
   * Récupérer l'utilisateur connecté sous forme d'objet User
   */
  public static function user(): ?User {
    // Si l'utilisateur est déjà en cache, le retourner
    if (self::$currentUser !== null) {
      return self::$currentUser;
    }

    // Récupérer l'ID utilisateur depuis la session
    $userId = self::id();
    if ($userId === null) {
      return null;
    }

    // Récupérer l'utilisateur depuis la base de données
    $userRepository = new UserRepository();
    self::$currentUser = $userRepository->findById($userId);

    return self::$currentUser;
   }



  /**
   * Tenter de se connecter avec un email et un mot de passe
   *
   * @param string $email
   * @param string $password
   * @return bool True si la connexion est réussie, false sinon
   */
  public static function attempt(string $email, string $password): bool {
        $userRepository = new UserRepository();
        $user = $userRepository->findByEmail($email);

        // Un utilisateur avec cet email n'existe pas
        if($user === null) {
            return false;
        }

        // Le mot de passe ne correspond pas
        if (!$user->verifyPassword($password)) {
            return false;
        }

        // Connexion réussie
        self::login($user);
        return true;
 }

}