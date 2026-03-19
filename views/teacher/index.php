<?php 
    ob_start(); 
    $title =  'Teacher';
    $currentPage =  'teacher';

    $classes = [
        [
            'id' => 1,
            'name' => 'Classe 1',
            'student_count' => 25
        ],
        
        [
            'id' => 2,
            'name' => 'Classe 2',
            'student_count' => 20
        ],

         [
            'id' => 3,
            'name' => 'Classe 3',
            'student_count' => 18
        ]
    ];


    
?>




<!-- layout-teacher  avec liste de ses classes et une fois dans une classe une liste des etudiants-->
    <div class="flex flex-col min-h-screen bg-gray-50 ">

        <?php if (!isset($_GET['class_id'])): ?>
            <main class="p-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Mes Classes</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php foreach ($classes as $class): ?>
                        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                            <h3 class="text-xl font-semibold text-gray-900"><?= htmlspecialchars($class['name']) ?></h3>
                            <p class="text-gray-600 mt-2"><?= $class['student_count'] ?? 0 ?> Étudiants</p>
                            <a href="/classe?class_id=<?= $class['id'] ?>" class="mt-4 inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition-colors">Voir les étudiants</a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </main>


            
        <?php endif; ?>

    </div>

<?php
    $content = ob_get_clean();
    require __DIR__ . '/../layouts/main.php';
