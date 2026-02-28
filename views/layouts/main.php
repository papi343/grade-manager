<?php
    ob_start(); 
    $title = "Grade Manager - " . ($title ?? 'Accueil');
    $currentPage = $currentPage ?? '';
    
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= $title ?? 'Grade Manager' ?></title>
    


    
    
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Custom CSS pour le menu mobile, animations et dark mode -->
  

</head>
    <body class="bg-gray-50 relative  transition-colors duration-300">

        <header class="sticky top-0 z-50 bg-white dark:bg-gray-900 backdrop-blur-md border-b border-gray-200 dark:border-gray-800 transition-colors duration-300">
            <nav class="max-w-6xl mx-auto px-4 sm:px-6">

                <div class="flex items-center justify-between h-16">

                    <!-- Logo -->
                    <a href="/" class="text-xl font-bold tracking-tight text-gray-900 dark:text-white hover:opacity-75 transition-opacity">
                        GradeManager
                    </a>

                    <!-- Desktop: liens gauche -->
                    <ul class="hidden md:flex items-center gap-6 text-sm font-semibold text-gray-600 dark:text-gray-300">
                        <li><a href="/" class="nav-link text-xl hover:text-gray-900 dark:hover:text-white transition-colors <?= $currentPage === 'home' ? 'text-gray-900 dark:text-white' : '' ?>">Accueil</a></li>
                        <li><a href="/about" class="nav-link text-xl hover:text-gray-900 dark:hover:text-white transition-colors <?= $currentPage === 'about' ? 'text-gray-900 dark:text-white' : '' ?>">À propos</a></li>
                        <li><a href="/contact" class="nav-link text-xl hover:text-gray-900 dark:hover:text-white transition-colors <?= $currentPage === 'contact' ? 'text-gray-900 dark:text-white' : '' ?>">Contact</a></li>
                    </ul>

                   

                        <div class="flex gap-4">
                            <a href="/login"
                            class="px-4 py-1.5 text-sm font-semibold text-gray-700 dark:text-gray-200 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
                            Connexion
                        </a>
                        <a href="/register"
                            class="px-4 py-1.5 text-sm font-semibold text-white bg-gray-900 dark:bg-white dark:text-gray-900 rounded-lg hover:opacity-80 transition-opacity">
                            Inscription
                        </a>
                        </div>
                    </div>

                    
                    <!-- <div class="flex md:hidden items-center gap-2">
                        <button id="theme-toggle-mobile" aria-label="Toggle theme"
                            class="p-2 rounded-lg text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
                            <svg class="w-5 h-5 hidden dark:block" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M4.93 19.07l1.41-1.41M17.66 6.34l1.41-1.41"/>
                            </svg>
                            <svg class="w-5 h-5 block dark:hidden" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/>
                            </svg>
                        </button>

                        <button id="burger" aria-label="Menu" aria-expanded="false"
                            class="p-2 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
                            <svg id="burger-icon" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                            </svg>
                            <svg id="close-icon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div> -->

                </div>
            </nav>

            
                <!-- <div id="mobile-menu" class="md:hidden bg-white dark:bg-gray-900 border-t border-gray-100 dark:border-gray-800">
                    <ul class="px-4 pt-3 pb-2 space-y-1 text-sm font-semibold text-gray-600 dark:text-gray-300">
                        <li><a href="/index" class="block py-2 px-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">Accueil</a></li>
                        <li><a href="/about" class="block py-2 px-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">À propos</a></li>
                        <li><a href="/contact" class="block py-2 px-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">Contact</a></li>
                    </ul>
                    <div class="px-4 pb-4 pt-1 flex flex-col gap-2">
                        <a href="/login"
                            class="block text-center py-2 text-sm font-semibold text-gray-700 dark:text-gray-200 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
                            Connexion
                        </a>
                        <a href="/register"
                            class="block text-center py-2 text-sm font-semibold text-white bg-gray-900 dark:bg-white dark:text-gray-900 rounded-lg hover:opacity-80 transition-opacity">
                            Inscription
                        </a>
                    </div>
                </div> -->
        </header>
        <?php 
         // Affichage des messages flash
            use App\Utils\Session;

            $successMessage = Session::getFlash('success');
            $errorMessage = Session::getFlash('error');

            ?>
            <?php if($successMessage): ?>
                <div class="container mx-auto px-4 mt-4" role="alert">
                    <div class="bg-green-50 border-l-4 border-green-500 text-green-800 p-4 rounded shadow-sm" role="alert">
                        <strong class="font-bold">Succès!</strong>
                        <span class="block sm:inline"><?= htmlspecialchars($successMessage); ?></span>
                    </div>
                </div>
            <?php endif; ?>

            <?php if($errorMessage): ?>
                <div class="container mx-auto px-4 mt-4" role="alert">
                    <div class="bg-red-50 border-l-4 border-red-500 text-red-800 p-4 rounded shadow-sm" role="alert">
                        <strong class="font-bold">Erreur!</strong>
                        <span class="block sm:inline"><?= htmlspecialchars($errorMessage); ?></span>
                    </div>
                </div>
            <?php endif; ?>

    <?= $content ?>

    <script src="/theme.js"></script>
</body>
</html>