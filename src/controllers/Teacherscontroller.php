<?php
namespace App\Controllers;

use App\Utils\Auth;
use App\Utils\Session;
use App\Repositories\UserRepository;
use App\Models\User;
use App\Repositories\ClasseRepository;

class Teacherscontroller {
    private $userRepository;
    private $classeRepository;

    public function __construct() {
        $this->userRepository = new UserRepository();
        $this->classeRepository = new ClasseRepository();
    }

    public function index() {
        $teachers = $this->userRepository->getAllTeachers();
        require __DIR__ . '/../views/admin/teachers.php';
    }

   public function register(){
       $meail = $_POST['email'];
       $password = $_POST['password']??'1234';
       $name = $_POST['nom'];
       $firstname = $_POST['prenom'];
       $role = "professeur";
     if(empty($meail) || empty($password) || empty($name) || empty($firstname)){
        Session::flash('error', 'Veuillez remplir tous les champs.');
        $this->redirect('/admin');
        return;
     }

       $user = new User();
       $user->setEmail($meail);
       $user->setPassword($password);
       $user->setNom($name);
       $user->setPrenom($firstname);
       $user->setRole($role);
   
       if($this->userRepository->save($user)){
        Session::flash('success', 'Professeur ajouté avec succès.');
       }else{
        Session::flash('error', 'Erreur lors de l\'ajout du professeur.');
       }
       $this->redirect('/admin');
   }

   

    public function redirect(string $path): void {
        header("Location: " . $path);
        exit();
    }
}