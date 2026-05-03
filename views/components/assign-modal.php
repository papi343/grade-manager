<?php 
    // Data is provided by admin-dashboard.php
?>

<div id="assign-modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
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

            <form action="/assigne" method="POST" class="space-y-4">
                <div>
                    <label for="professeur_id" class="block text-sm font-medium text-gray-700">Professeur</label>
                    <select name="professeur_id" id="professeur_id" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Sélectionnez un professeur</option>
                        <?php foreach ($professeurs as $prof): ?>
                            <option value="<?= $prof['id'] ?>"><?= $prof['prenom'] . ' ' . $prof['nom'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label for="matiere_id" class="block text-sm font-medium text-gray-700">Matière</label>
                    <select name="matiere_id" id="matiere_id" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Sélectionnez une matière</option>
                        <?php foreach ($matieres as $matiere): ?>
                            <option value="<?= $matiere->getId() ?>"><?= $matiere->getLibeller() ?: 'Matière sans nom' ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label for="classe_id" class="block text-sm font-medium text-gray-700">Classe</label>
                    <select name="classe_id" id="classe_id" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Sélectionnez une classe</option>
                        <?php foreach ($classes as $classe): ?>
                            <option value="<?= $classe->getId() ?>"><?= $classe->getNiveau() ?> <?= $classe->getFiliere() ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label for="semestre_id" class="block text-sm font-medium text-gray-700">Semestre</label>
                    <select name="semestre_id" id="semestre_id" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Sélectionnez un semestre</option>
                        <?php foreach ($semestres as $semestre): ?>
                            <option value="<?= $semestre->getId() ?>"><?= $semestre->getNom() ?: 'Semestre sans nom' ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
               
                <div class="flex justify-end space-x-3 pt-4">
                    <button type="button" id="cancel-btn-assign" class="btn-secondary px-4 py-2 rounded-lg font-medium">
                        Annuler
                    </button>
                    <button type="submit" class="btn-primary px-4 py-2 rounded-lg font-medium">
                        Assigner
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>