<?php
namespace App\Controllers;
use App\Models\Enseignements;
use App\Repositories\EnseignementsRepository;
use App\Repositories\UserRepository;
use App\Repositories\MatiereRepository;
use App\Repositories\ClasseRepository;
use App\Repositories\SemestreRepository;
use App\Utils\Session;

class Assigne_modalcontroller 
{
    private $enseignementRepository;
    private $professeurRepository;
    private $matiereRepository;
    private $classeRepository;
    private $semestreRepository;
    public function __construct() {
        $this->enseignementRepository = new EnseignementsRepository();
        $this->professeurRepository = new UserRepository();
        $this->matiereRepository = new MatiereRepository();
        $this->classeRepository = new ClasseRepository();
        $this->semestreRepository = new SemestreRepository();
    }
    public function showAssignForm() {
        $professeurs = $this->professeurRepository->getAllProfesseurs();
        $matieres = $this->matiereRepository->findAll();
        $classes = $this->classeRepository->findAll();
        $semestres = $this->semestreRepository->findAll();

        if (isset($_GET['action']) && $_GET['action'] === 'edit') {
            header('Content-Type: application/json');

            $format = function($items) {
                return array_map(function($item) {
                    return is_object($item) && method_exists($item, 'toArray') ? $item->toArray() : (array) $item;
                }, $items);
            };

            echo json_encode([
                'professeurs' => $professeurs,
                'matieres'    => $format($matieres),
                'classes'     => $format($classes),
                'semestres'   => $format($semestres)
            ]);
            exit();
        }

        $this->redirect('/admin');
    }
    public function createAssign() {
        if(!empty($_POST['professeur_id']) && !empty($_POST['matiere_id']) && !empty($_POST['classe_id']) && !empty($_POST['semestre_id'])) {
            $enseignements = new Enseignements($_POST['professeur_id'], $_POST['matiere_id'], $_POST['classe_id'], $_POST['semestre_id']);
            $this->enseignementRepository->createEnseignement($enseignements);
            if($this->enseignementRepository->createEnseignement($enseignements)) {
                Session::flash('success', 'Enseignement ajouté avec succès.');
                $this->redirect('/admin');
            } else {
                Session::flash('error', 'Erreur lors de l\'ajout de l\'enseignement.');
                $this->redirect('/admin');
            }
        } else {
            Session::flash('error', 'Veuillez remplir tous les champs.');
            $this->redirect('/admin');
        }
        
    }
    public function redirect(string $path): void {
        header("Location: " . $path);
        exit();
    }
}
