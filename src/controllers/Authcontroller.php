<?php
namespace App\Controllers;

use App\Utils\Auth;
use App\Utils\Session;
use App\Repositories\UserRepository;
use App\Models\User;

/**
 * Classe AuthController - Contrôleur pour l'authentification utilisateur
 * Gère:
 * - Affichage des formulaires de login et d'inscription
 * - Traitement des soumissions de formulaires
 * - Redirections après login/logout
 */
class AuthController {
    private UserRepository $userRepository;

    public function __construct() {
        $this->userRepository = new UserRepository();
    }

    public function showLoginForm(): void {
        // Si l'utilisateur est déjà connecté, le rediriger vers la page d'accueil sinon le rediriger vers le formulaire
        if(Auth::check()) {
        
            $this->redirect('/');
        }
        require __DIR__ . '/../../views/auth/login.php';
    }
    

     public function showRegisterForm(): void {
         // Si l'utilisateur est déjà connecté, le rediriger vers la page d'accueil sinon le rediriger vers le formulaire
        if(Auth::check()) {
            $this->redirect('/');
        }
        require __DIR__ . '/../../views/auth/register.php';
    }

    // Traitement du formulaire de login
    public function login(): void {
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        // Validation basique
        if(empty($email) || empty($password)) {
            Session::flash('error', 'Veuillez remplir tous les champs.');
            $this->redirect('/login');
            return;
        }

        if(Auth::attempt($email, $password)) {
            Session::flash('success', 'Connexion réussie ! Bienvenue ' . Auth::user()->getNom() .Auth::user()->getPrenom() . '!');
            $this->redirect('/'); // Redirection vers la page d'accueil
        } else {
            Session::flash('error', 'Email ou mot de passe incorrect.');
            $this->redirect('/login');
        }
    }

    // Traitement du formulaire d'inscription
    public function register(): void {
        $email = trim($_POST['email'] ?? '');
        $name = trim($_POST['lastname'] ?? '');
        $firstname = trim($_POST['firstname'] ?? '');
        $password = $_POST['password'] ?? '';

        // Validation basique
        if(empty($email) || empty($password) || empty($name) || empty($firstname)) {
            Session::flash('error', 'Veuillez remplir tous les champs.');
            $this->redirect('/register');
            return;
        }
        $pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_]).{8,}$/";
        if(!preg_match($pattern,$password))
            {
                Session::flash('error',"le mots de passe doit au moinse contenir un majuscule et un caractere special");
                 $this->redirect('/register');
            }

        // Vérifier si l'email est déjà utilisé
        if($this->userRepository->findByEmail($email)) {
            Session::flash('error', 'Cet email est déjà utilisé.');
            $this->redirect('/register');
            return;
        }

        // Créer un nouvel utilisateur
        $user = new User();
        $user->setNom($name);
        $user->setPrenom($firstname);
        $user->setEmail($email);
        $user->setPassword($password); // Le mot de passe sera hashé dans le setter
    //     var_dump($user);
    //    var_dump($this->userRepository->save($user));
    //    die("ici");
        if($this->userRepository->save($user)) {
            // Connection automatique après inscription (optionnel)
            Auth::login($user);
            Session::flash('success', 'Inscription réussie ! Bienvenue ' . Auth::user()->getNom().Auth::user()->getPrenom().'|');
            $this->redirect('/'); // Redirection vers la page d'accueil
        } else {
            Session::flash('error', 'Erreur lors de l\'inscription.');
            $this->redirect('/register');
        }
    }

    // Déconnexion de l'utilisateur
    public function logout(): void {
        Auth::logout();
        Session::flash('success', 'Vous avez été déconnecté avec succès.');
        $this->redirect('/login');
    }

    /**
     * Permet de faire la redirection vers une autre page
     */
    private function redirect(string $path): void {
        header("Location: " . $path);
        exit();
    }
}
