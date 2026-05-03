<?php
    // Variables provided by NotesController: $students, $classId, $matiereId, $semestreId
    ob_start(); 
    $title =  'Teacher';
    $currentPage = 'Teacher';
?>

<main class="p-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Gestion des notes</h2>
        <a href="/admin" class="text-white bg-blue-500 px-4 py-2 rounded-md hover:bg-blue-600">Retour Admin</a>
    </div>

    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Étudiant</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Devoir</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Examen</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php if (empty($students)): ?>
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">Aucun étudiant dans cette classe.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($students as $student): ?>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                <?= htmlspecialchars($student['prenom'] . ' ' . $student['nom']) ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <?= $student['note_devoir'] ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <?= $student['note_examen'] ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="/note?student_id=<?= $student['id'] ?>&class_id=<?= $classId ?>&matiere_id=<?= $matiereId ?>&semestre_id=<?= $semestreId ?>" 
                                   class="text-blue-600 hover:text-blue-900 bg-blue-50 px-3 py-1 rounded-full transition-colors">
                                    Noter
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>

<?php
    $content = ob_get_clean();
    require __DIR__ . '/../layouts/main.php';
?>
