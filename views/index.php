<?php 
   
    $title = "Accueil";
    $currentPage = 'home';

    ob_start();

    ?>


    <div class="h-screen">

    </div>




<?php
    $content = ob_get_clean();
    require_once __DIR__ . '/../views/layouts/main.php';
?>