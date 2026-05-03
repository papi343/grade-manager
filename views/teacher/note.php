<?php
    // Variables provided by NotesController: $note, $studentId, $classId, $matiereId, $semestreId
    ob_start(); 
    $title =  'Saisie des Notes';
    $currentPage = 'Teacher';
?>

<div class="container mx-auto px-4 py-8">
    <div class="max-w-md mx-auto bg-white rounded-lg shadow-md p-6">
        <div class="mb-6">
            <a href="/teacher/class?class_id=<?= $classId ?>&matiere_id=<?= $matiereId ?>&semestre_id=<?= $semestreId ?>" 
               class="text-blue-500 hover:text-blue-700 flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Retour à la liste
            </a>
        </div>

        <h2 class="text-2xl font-bold text-gray-800 mb-2">Saisie des notes</h2>
        <p class="text-sm text-gray-600 mb-6">Étudiant ID: <?= $studentId ?></p>

        <form action="/note" method="POST" class="space-y-4">
            <input type="hidden" name="student_id" value="<?= $studentId ?>">
            <input type="hidden" name="class_id" value="<?= $classId ?>">
            <input type="hidden" name="matiere_id" value="<?= $matiereId ?>">
            <input type="hidden" name="semestre_id" value="<?= $semestreId ?>">

            <div>
                <label for="devoir" class="block text-sm font-medium text-gray-700">Note de devoir</label>
                <input type="number" step="0.25" min="0" max="20" id="devoir" name="devoir" 
                       value="<?= $note ? $note->getNoteDevoir() : '' ?>"
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label for="examen" class="block text-sm font-medium text-gray-700">Note d'examen</label>
                <input type="number" step="0.25" min="0" max="20" id="examen" name="examen" 
                       value="<?= $note ? $note->getNoteExamen() : '' ?>"
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="pt-4">
                <button type="submit" class="w-full bg-green-500 text-white font-medium py-2 px-4 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-colors">
                    Enregistrer les notes
                </button>
            </div>
        </form>
    </div>
</div>

<?php
    $content = ob_get_clean();
    require __DIR__ . '/../layouts/main.php';
?>