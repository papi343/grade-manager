<?php 
    ob_start();
    $title = "À propos";
    $currentPage = "about";
    ?>

    <h1>À propos de Grade Manager</h1>
    <p>Grade Manager est une application de gestion des notes conçue pour les enseignants et les étudiants. Elle permet de suivre les performances académiques, de calculer les moyennes et de générer des rapports détaillés.</p>



<?php
    $content = ob_get_clean();
    require_once __DIR__ . '/../layouts/main.php';    
    ?>