<?php
namespace App\Controllers;

use App\Repositories\NoteRepository;
use App\Repositories\UserRepository;
use App\Models\Note;
use App\Models\Session;

class NotesController {
    private NoteRepository $noteRepository;
    private UserRepository $userRepository;

    public function __construct() {
        $this->noteRepository = new NoteRepository();
        $this->userRepository = new UserRepository();
    }

    public function showClass(int $classId) {
        // In a real app, we'd get matiere_id and semestre_id from the teacher's session or assignment
        $matiereId = (int)($_GET['matiere_id'] ?? 1);
        $semestreId = (int)($_GET['semestre_id'] ?? 1);
        
        $students = $this->userRepository->getStudentsByClasse($classId);
        
        // For each student, find their grades
        foreach ($students as &$student) {
            $note = $this->noteRepository->findByCriteria((int)$student['id'], $matiereId, $semestreId);
            $student['note_devoir'] = $note ? $note->getNoteDevoir() : '-';
            $student['note_examen'] = $note ? $note->getNoteExamen() : '-';
        }

        require_once __DIR__ . '/../../views/teacher/class.php';
    }

    public function showNoteForm() {
        $studentId = (int)$_GET['student_id'];
        $classId = (int)$_GET['class_id'];
        $matiereId = (int)($_GET['matiere_id'] ?? 1);
        $semestreId = (int)($_GET['semestre_id'] ?? 1);

        $note = $this->noteRepository->findByCriteria($studentId, $matiereId, $semestreId);
        
        require_once __DIR__ . '/../../views/teacher/note.php';
    }

    public function store() {
        $studentId = (int)$_POST['student_id'];
        $matiereId = (int)$_POST['matiere_id'];
        $semestreId = (int)$_POST['semestre_id'];
        $classId = (int)$_POST['class_id'];
        $noteDevoir = $_POST['devoir'] !== '' ? (float)$_POST['devoir'] : null;
        $noteExamen = $_POST['examen'] !== '' ? (float)$_POST['examen'] : null;

        $note = $this->noteRepository->findByCriteria($studentId, $matiereId, $semestreId);
        if (!$note) {
            $note = new Note($studentId, $matiereId, $semestreId);
        }
        
        $note->setNoteDevoir($noteDevoir);
        $note->setNoteExamen($noteExamen);

        if ($this->noteRepository->save($note)) {
            // Redirect back to class view
            header("Location: /teacher/class?class_id=$classId&matiere_id=$matiereId&semestre_id=$semestreId");
            exit;
        } else {
            echo "Erreur lors de la sauvegarde.";
        }
    }
}
