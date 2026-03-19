<?php
    ob_start(); 
    $title =  'Teacher';
    $currentPage = 'Teacher';

    $classes = [
        [
            'id' => 1,
            'name' => 'Classe 1',
            'student_count' => 25,
            'students' => [
                ['id' => 1, 'name' => 'Boubacar Mbaye', 'devoir' => 14, 'examen' => 16],
                ['id' => 2, 'name' => 'Mohamed Tine', 'devoir' => 12, 'examen' => 18],
                ['id' => 3, 'name'=> 'Yaya Dabo', 'devoir' => 15, 'examen' => 17],
                ['id' => 4, 'name'=> 'Abdallah Diouf', 'devoir' => 10, 'examen' => 14],
                ['id' => 5, 'name'=> 'Aissatou Sow', 'devoir' => 13, 'examen' => 15]
            ]
        ]
    ];

?>


            <main class="p-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Étudiants de la classe "<?= htmlspecialchars($classes[0]['name']) ?>"</h2>
                <div class="grid grid-cols-1 ">
                    
                    <table class="min-w-full bg-white">
                        <thead>
                            <tr>
                                <td class="py-2 px-4 border-b font-bold">Nom</td>
                                <td class="py-2 px-4 border-b font-bold">devoir</td>
                                <td class="py-2 px-4 border-b font-bold">examen</td>
                                <td class="py-2 px-4 border-b font-bold">Action</td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($classes[0]['students'] as $student): ?>
                                <tr>
                                    <td class="py-2 px-4 border-b"><?= htmlspecialchars($student['name']) ?></td>
                                    <td class="py-2 px-4 border-b"><?= $student['devoir'] ?></td>
                                    <td class="py-2 px-4 border-b"><?= $student['examen'] ?></td>
                                    <td class="py-2 px-4 border-b">
                                        <a href="/note?student_id=<?= $student['id'] ?>&class_id=<?= $classes[0]['id'] ?>" class="text-blue-500 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Note</a>
                                    </td>
                                    
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                      
                 
                </div>
            </main>

<?php
    $content = ob_get_clean();
    require __DIR__ . '/../layouts/main.php';

