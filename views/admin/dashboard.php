<?php 

    $title = "Dashboard Admin";
    $currentPage = 'admin';

    ob_start();

    ?>

    <div class="container mx-auto px-4 py-8">
       
        <h1 class="text-2xl font-bold text-gray-800">Dashboard Administrateur</h1>
   

        <div class="my-8 border-t border-gray-300 pt-8">
            <a href="/admin" class="text-white bg-red-500 px-4 py-2 rounded-md hover:bg-red-700">Retour</a>
            <a href="/statistiques" class="text-white bg-gray-900 px-4 py-2 rounded-md hover:bg-gray-800">Stats Etudiants</a>
        </div>
       
 


<?php 
    $content = ob_get_clean();
    require __DIR__ . '/../layouts/main.php';
?>