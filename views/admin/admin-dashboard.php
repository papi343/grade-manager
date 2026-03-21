<?php 

    $title = "Admin";
    $currentPage = "admin";

    ob_start();


?>
    <script src="https://unpkg.com/heroicons@2.0.18/24/outline/index.js" type="module"></script>

    <style>
        
        .card-hover {
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }
        .card-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            background-color: #3b82f6;
            color: white;
            transition: background-color 0.2s ease-in-out;
        }
        .btn-primary:hover {
            background-color: #2563eb;
        }
        .btn-secondary {
            background-color: #6b7280;
            color: white;
            transition: background-color 0.2s ease-in-out;
        }
        .btn-secondary:hover {
            background-color: #4b5563;
        }
        .btn-danger {
            background-color: #ef4444;
            color: white;
            transition: background-color 0.2s ease-in-out;
        }
        .btn-danger:hover {
            background-color: #dc2626;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-8">Dashboard Administrateur - Grade Manager</h1>

       
        <?php include __DIR__ . '/../components/stats-cards.php'; ?>

        <div class="my-8 border-t border-gray-300 pt-8">
            <a href="/dashboard" class="text-white bg-blue-500 px-4 py-2 rounded-md hover:bg-blue-700">Dashboard</a>
            <a href="/statistiques" class="text-white bg-gray-900 px-4 py-2 rounded-md hover:bg-gray-800">Stats Etudiants</a>
        </div>
        <div class="mb-8">
            <h2 class="text-2xl font-semibold text-gray-700 mb-4">Gestion des Professeurs</h2>
            <div>
                <button id="add-teacher-btn" class="btn-primary px-4 py-2 rounded-lg font-medium">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                Ajouter un Professeur
                </button>

                <button id="assign-btn" class="btn-primary px-4 py-2 rounded-lg font-medium">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Assigner matiere
                </button>
            </div>
        </div>

       
        <?php include __DIR__ . '/../components/teachers-table.php'; ?>

        <?php include __DIR__ . '/../components/students-preview.php'; ?>

        <?php include __DIR__ . '/../components/add-teacher-modal.php'; ?>

        <?php include __DIR__ . '/../components/assign-modal.php'; ?>
    </div>

   
    <script>
        const modal = document.getElementById('add-teacher-modal');
        const openBtn = document.getElementById('add-teacher-btn');
        const closeBtn = document.getElementById('close-modal-btn');
        const cancelBtn = document.getElementById('cancel-btn');



        openBtn.addEventListener('click', () => {
            modal.classList.remove('hidden');
        });

        closeBtn.addEventListener('click', () => {
            modal.classList.add('hidden');
        });

        cancelBtn.addEventListener('click', () => {
            modal.classList.add('hidden');
        });
        
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.classList.add('hidden');
            }
        });


        const assignModal = document.getElementById('assign-modal');
        const assignBtn = document.getElementById('assign-btn');
        const closeAssignBtn = document.getElementById('close-modal-btn-assign');
        const cancelAssignBtn = document.getElementById('cancel-btn-assign');

        assignBtn.addEventListener('click', () => {
            assignModal.classList.remove('hidden');
        });

        closeAssignBtn.addEventListener('click', () => {
            assignModal.classList.add('hidden');
        });

        cancelAssignBtn.addEventListener('click', () => {
            assignModal.classList.add('hidden');
        });

        assignModal.addEventListener('click', (e) => {
            if (e.target === assignModal) {
                assignModal.classList.add('hidden');
            }
        });
    </script>

<?php
    $content = ob_get_clean();
    require __DIR__ .'/../layouts/main.php';