<!-- STUDENTS PREVIEW SECTION -->
<section class="mb-8">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-semibold text-gray-700">Aperçu des Élèves</h2>
        <button class="btn-primary px-4 py-2 rounded-lg font-medium">
            Voir plus
        </button>
    </div>
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Classe</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php
                    // Exemple de données fictives - à remplacer par une boucle PHP réelle
                    $students = [
                        ['id' => 1, 'nom' => 'Alice Dupont', 'classe' => '6ème A'],
                        ['id' => 2, 'nom' => 'Bob Martin', 'classe' => '5ème B'],
                        ['id' => 3, 'nom' => 'Charlie Dubois', 'classe' => '4ème C'],
                        ['id' => 4, 'nom' => 'Diana Garcia', 'classe' => '3ème A'],
                        ['id' => 5, 'nom' => 'Eve Lefebvre', 'classe' => '2nde B'],
                    ];
                    foreach ($students as $student): ?>
                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><?php echo $student['id']; ?></td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo $student['nom']; ?></td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                                <?php echo $student['classe']; ?>
                            </span>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>