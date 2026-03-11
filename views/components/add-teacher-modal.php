


<div id="add-teacher-modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-medium text-gray-900">Ajouter un Professeur</h3>
                <button id="close-modal-btn" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <form action="/teachers/register" method="POST" class="space-y-4">
                <div>
                    <label for="prenom" class="block text-sm font-medium text-gray-700">Prénom</label>
                    <input type="text" id="prenom" name="prenom" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label for="nom" class="block text-sm font-medium text-gray-700">Nom</label>
                    <input type="text" id="nom" name="nom" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="text" id="email" name="email" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Mot de passe par défaut</label>
                    <div class="mt-1 block w-full px-3 py-2 bg-gray-100 border border-gray-300 rounded-md text-gray-700">
                        1234
                    </div>
                    <p class="text-xs text-gray-500 mt-1">Le mot de passe sera défini à "1234" par défaut.</p>
                </div>
                <div class="flex justify-end space-x-3 pt-4">
                    <button type="button" id="cancel-btn" class="btn-secondary px-4 py-2 rounded-lg font-medium">
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