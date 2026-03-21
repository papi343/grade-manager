<?php 

    $professeurs = [
        ['id' => 1, 'name' => 'M. Ndiaye'],
        ['id' => 2, 'name' => 'Mme Seck'],
        ['id' => 3, 'name' => 'M. Longate'],
        ['id' => 4, 'name' => 'Mme Diop'],
        ['id'=> 5, 'name'=> 'Mme Dieng'],
        ['id'=> 6, 'name'=> 'M Dabo'],
    ];

    //matieres informatiques algo, php, js, html, css, bd, reseau ..
    $matieres = [
        ['id' => 1, 'name' => 'Algorithmique'],
        ['id' => 2, 'name' => 'PHP'],
        ['id' => 3, 'name' => 'JavaScript'],
        ['id' => 4, 'name' => 'HTML/CSS'],
        ['id' => 5, 'name' => 'Base de données'],
        ['id' => 6, 'name' => 'Réseau'],
        ['id'=> 7, 'name'=> 'Laravel'],
        ['id'=> 8, 'name'=> 'Rust'],
        ['id'=> 9, 'name'=> 'Ruby On rails'],
    ];

?>


<div id="assign-modal" class=" fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-medium text-gray-900">Assigner une Matière</h3>
                <button id="close-modal-btn-assign" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <form action="/assign" method="POST" class="space-y-4">
                <div>
                    <label for="professeur" class="block text-sm font-medium text-gray-700">Professeur</label>
                    <select name="professeur" id="professeur" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <option value="disabled">Sélectionnez un professeur</option>

                        <?php foreach ($professeurs as $professeur): ?>
                            <option value="<?= $professeur['id'] ?>"><?= htmlspecialchars($professeur['name']) ?></option>
                        <?php endforeach; ?>  

                    </select>
                </div>
                <div>
                    <label for="matiere" class="block text-sm font-medium text-gray-700">Matieres</label>
                    <select name="matiere" id="matiere" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <option value="disabled">Sélectionnez une matière</option>

                        <?php foreach ($matieres as $matiere): ?>
                            <option value="<?= $matiere['id'] ?>"><?= htmlspecialchars($matiere['name']) ?></option>    
                        <?php endforeach; ?>

                    </select>
                </div>
               
                <div class="flex justify-end space-x-3 pt-4">
                    <button type="button" id="cancel-btn-assign" class="btn-secondary px-4 py-2 rounded-lg font-medium">
                        Annuler
                    </button>
                    <button type="submit" class="btn-primary px-4 py-2 rounded-lg font-medium">
                        Ajouter
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>