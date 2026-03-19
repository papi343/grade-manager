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
                ['name' => 'Boubacar Mbaye', 'devoir' => 14, 'examen' => 16],
                ['name' => 'Mohamed Tine', 'devoir' => 12, 'examen' => 18],
                ['name'=> 'Yaya Dabo', 'devoir' => 15, 'examen' => 17],
                ['name'=> 'Abdallah Diouf', 'devoir' => 10, 'examen' => 14],
                ['name'=> 'Aissatou Sow', 'devoir' => 13, 'examen' => 15]
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
                                <th class="py-2 px-4 border-b">Nom</th>
                                <th class="py-2 px-4 border-b">devoir</th>
                                <th class="py-2 px-4 border-b">examen</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($classes[0]['students'] as $student): ?>
                                <tr>
                                    <td class="py-2 px-4 border-b"><?= htmlspecialchars($student['name']) ?></td>
                                    <td class="py-2 px-4 border-b"><?= $student['devoir'] ?></td>
                                    <td class="py-2 px-4 border-b"><?= $student['examen'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                      
                 
                </div>
            </main>

<?php
    $content = ob_get_clean();
    require __DIR__ . '/../layouts/main.php';

