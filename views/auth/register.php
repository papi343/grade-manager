<?php 
    ob_start();
    $title = "Inscription";
    $currentPage = "register";
    ?>

    
    <div class="h-screen lg:h-[90vh] flex justify-center items-center bg-gray-100 ">

        <form action="/register" method="post" class="p-8 border rounded-xl bg-white ">

            <h2 class="text-2xl font-bold mb-6 text-gray-900 ">Inscription</h2>

            <div class="mb-4">
                <label for="firstname" class="block text-gray-700 mb-1 ">Prenom</label>
                <input type="text" id="firstname" name="firstname" class="md:w-[500px] sm:w-[300px] w-full px-3 py-2 border border-gray-300  rounded-lg focus:outline-none focus:ring focus:ring-gray-200  transition-colors">
            </div>

            <div class="mb-4">
                <label for="lastname" class="block text-gray-700 mb-1 ">Nom</label>
                <input type="text" id="lastname" name="lastname" required class="md:w-[500px] sm:w-[300px] w-full px-3 py-2 border border-gray-300  rounded-lg focus:outline-none focus:ring focus:ring-gray-200  transition-colors">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 mb-1 ">Email</label>
                <input type="email" id="email" name="email" required class="md:w-[500px] sm:w-[300px] w-full px-3 py-2 border border-gray-300  rounded-lg focus:outline-none focus:ring focus:ring-gray-200  transition-colors">
            </div>

            <div class="mb-6">
                <label for="password" class="block text-gray-700  mb-1">Mot de passe</label>
                <input type="password" id="password" name="password" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-gray-200 transition-colors">
            </div>

            <div class="mb-6">
                <label for="password_confirmation" class="block text-gray-700  mb-1">Confirmation du mot de passe</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-gray-200 transition-colors">
            </div>

            <button type="submit" class="w-full py-2 bg-gray-900 text-white rounded-lg hover:bg-white hover:text-gray-900 hover:border-gray-900 hover:border-2 transition-colors ">Se connecter</button>

            <div class="mt-6">
                <p class="md:text-lg xs:text-sm">
                    <span >
                        Vous avez déjà un compte ? </span>
                    <a href="/login" class="text-blue-500 hover:underline transition-colors">connectez-vous</a>
                </p>
            </div>
        </form>

    </div>

<?php
    $content = ob_get_clean();
    require_once __DIR__ . '/../layouts/main.php';    
?>