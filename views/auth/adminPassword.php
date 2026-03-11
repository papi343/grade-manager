<?php 
    ob_start();
    $title = "Connexion";
    $currentPage = "login";
    ?>

    
    <div class="h-screen lg:h-[90vh]  flex justify-center items-center bg-gray-100 ">

        <form action="/password-reset" method="post" class="p-8 border rounded-xl bg-white">

            <h2 class="text-2xl font-bold mb-6 text-gray-900 ">Creez un nouveau mot de passe</h2>

            <div class="mb-4">
                <label for="password" class="block text-gray-700 mb-1 ">Nouveau Mot de passe</label>
                <input type="password" id="password" name="password" required class="md:w-[500px] sm:w-[300px] w-full px-3 py-2 border border-gray-300  rounded-lg focus:outline-none focus:ring focus:ring-gray-200  transition-colors">
            </div>

            <div class="mb-6">
                <label for="confirm_password" class="block text-gray-700  mb-1">Confirmer le Mot de passe</label>
                <input type="password" id="confirm_password" name="confirm_password" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-gray-200 transition-colors">
            </div>

            <div id="error" class="text-red-500 mb-4"></div>

            <button type="submit" class="w-full py-2 bg-gray-900 text-white rounded-lg hover:bg-white hover:text-gray-900 hover:border-gray-900 hover:border-2 transition-colors ">Changer le mot de passe</button>

        </form>

    </div>


    <script>

        const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('confirm_password');
        const errorDiv = document.getElementById('error');

        
        confirmPasswordInput.addEventListener('input', () => {
            if (confirmPasswordInput.value !== passwordInput.value) {
                errorDiv.textContent = "Les mots de passe ne correspondent pas.";
            } else {
                errorDiv.textContent = "";
                confirmPasswordInput.setCustomValidity("");
            }
        });

       

        





    </script>
<?php
    $content = ob_get_clean();
    require_once __DIR__ . '/../layouts/main.php';    
    ?>
