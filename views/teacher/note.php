<?php
    ob_start(); 
    $title =  'Teacher';
    $currentPage = 'Teacher';

    $student_id = isset($_GET['student_id']) ? (int)$_GET['student_id'] : null;
    $class_id = isset($_GET['class_id']) ? (int)$_GET['class_id'] : null;

?>


    <div class="mx-auto mt-5 p-6 bg-white ">

        <div>
            <a href="/teacher" class="text-blue-500 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Retour à la classe</a>
            <a href="/classe?class_id=<?= $class_id ?>" class="text-blue-500 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Voir la classe</a>
        </div>

        <div class="flex justify-center min-h-screen items-center flex-col gap-4 rounded-lg w-50 shadow-md">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Notes de l'étudiant ID: <?= $student_id ?></h2>
            <p class="text-gray-600">Ici vous pouvez afficher et modifier les notes de l'étudiant avec l'ID <?= $student_id ?>.</p>
            <form action="">
                <div>
                    <label for="devoir" class="block text-sm font-medium text-gray-700">Note de devoir</label>
                    <input type="number" id="devoir" name="devoir" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" value="14">
                </div>
                <div class="mt-4">
                    <label for="examen" class="block text-sm font-medium text-gray-700">Note d'examen</label>
                    <input type="number" id="examen" name="examen" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" value="16">
                </div>

                <button type="submit" class="mt-6 px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 transition-colors">Enregistrer les notes</button>    
            </form>
        </div>

    </div>




<?php
    $content = ob_get_clean();
    require __DIR__ . '/../layouts/main.php';