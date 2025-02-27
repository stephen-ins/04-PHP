<?php
// Inclusion du fichier de configuration de la base de données
require_once '../config/database.php';

// Vérification de connexion à l'administration (à implémenter)
// ...

// Inclusion d'un header spécifique à l'administration
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Administration - Annonceo</title>
  <!-- Intégration de Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-gray-100">
  <div class="flex h-screen">
    <!-- Sidebar -->
    <aside class="bg-slate-800 text-white w-64 p-4">
      <div class="mb-6">
        <h1 class="text-2xl font-bold">Annonceo Admin</h1>
      </div>
      <nav>
        <ul>
          <li class="mb-2">
            <a href="index.php" class="flex items-center p-2 rounded-md bg-slate-700">
              <i class="fas fa-tachometer-alt mr-3"></i> Tableau de bord
            </a>
          </li>
          <li class="mb-2">
            <a href="annonces.php" class="flex items-center p-2 rounded-md hover:bg-slate-700">
              <i class="fas fa-bullhorn mr-3"></i> Annonces
            </a>
          </li>
          <li class="mb-2">
            <a href="categories.php" class="flex items-center p-2 rounded-md hover:bg-slate-700">
              <i class="fas fa-tags mr-3"></i> Catégories
            </a>
          </li>
          <li class="mb-2">
            <a href="membres.php" class="flex items-center p-2 rounded-md hover:bg-slate-700">
              <i class="fas fa-users mr-3"></i> Membres
            </a>
          </li>
          <li class="mb-2">
            <a href="commentaires.php" class="flex items-center p-2 rounded-md hover:bg-slate-700">
              <i class="fas fa-comments mr-3"></i> Commentaires
            </a>
          </li>
          <li class="mb-2">
            <a href="parametres.php" class="flex items-center p-2 rounded-md hover:bg-slate-700">
              <i class="fas fa-cog mr-3"></i> Paramètres
            </a>
          </li>
          <li class="mt-8">
            <a href="../index.php" class="flex items-center p-2 rounded-md hover:bg-slate-700">
              <i class="fas fa-home mr-3"></i> Retour au site
            </a>
          </li>
          <li class="mb-2">
            <a href="../logout.php" class="flex items-center p-2 rounded-md hover:bg-slate-700 text-red-300">
              <i class="fas fa-sign-out-alt mr-3"></i> Déconnexion
            </a>
          </li>
        </ul>
      </nav>
    </aside>

    <!-- Main content -->
    <main class="flex-1 p-6 overflow-auto">
      <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Tableau de bord</h2>
        <div class="text-sm text-gray-600">
          Bienvenue, Admin | <?php echo date('d/m/Y'); ?>
        </div>
      </div>

      <!-- Stats cards -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <div class="bg-white rounded-lg shadow p-4">
          <div class="flex items-center">
            <div class="p-3 rounded-full bg-blue-500 text-white">
              <i class="fas fa-bullhorn"></i>
            </div>
            <div class="ml-4">
              <p class="text-gray-600 text-sm">Annonces</p>
              <p class="text-2xl font-semibold">
                <?php
                // Compter les annonces (à implémenter)
                echo '247';
                ?>
              </p>
            </div>
          </div>
        </div>
        <div class="bg-white rounded-lg shadow p-4">
          <div class="flex items-center">
            <div class="p-3 rounded-full bg-green-500 text-white">
              <i class="fas fa-users"></i>
            </div>
            <div class="ml-4">
              <p class="text-gray-600 text-sm">Utilisateurs</p>
              <p class="text-2xl font-semibold">
                <?php
                // Compter les utilisateurs (à implémenter)
                echo '184';
                ?>
              </p>
            </div>
          </div>
        </div>
        <div class="bg-white rounded-lg shadow p-4">
          <div class="flex items-center">
            <div class="p-3 rounded-full bg-yellow-500 text-white">
              <i class="fas fa-comments"></i>
            </div>
            <div class="ml-4">
              <p class="text-gray-600 text-sm">Commentaires</p>
              <p class="text-2xl font-semibold">
                <?php
                // Compter les commentaires (à implémenter)
                echo '93';
                ?>
              </p>
            </div>
          </div>
        </div>
        <div class="bg-white rounded-lg shadow p-4">
          <div class="flex items-center">
            <div class="p-3 rounded-full bg-purple-500 text-white">
              <i class="fas fa-tags"></i>
            </div>
            <div class="ml-4">
              <p class="text-gray-600 text-sm">Catégories</p>
              <p class="text-2xl font-semibold">
                <?php
                // Compter les catégories (à implémenter)
                echo '12';
                ?>
              </p>
            </div>
          </div>
        </div>
      </div>

      <!-- Recent activity -->
      <div class="bg-white rounded-lg shadow p-6 mb-6">
        <h3 class="text-xl font-semibold mb-4">Activité récente</h3>
        <table class="w-full">
          <thead>
            <tr class="text-left text-gray-600 border-b">
              <th class="pb-2">Action</th>
              <th class="pb-2">Utilisateur</th>
              <th class="pb-2">Date</th>
              <th class="pb-2">Détails</th>
            </tr>
          </thead>
          <tbody>
            <!-- Ces données seront dynamiques à l'avenir -->
            <tr class="border-b">
              <td class="py-2">Nouvelle annonce</td>
              <td>Jean Dupont</td>
              <td>05/07/2023</td>
              <td><a href="#" class="text-blue-500">Voir</a></td>
            </tr>
            <tr class="border-b">
              <td class="py-2">Inscription</td>
              <td>Marie Martin</td>
              <td>04/07/2023</td>
              <td><a href="#" class="text-blue-500">Voir</a></td>
            </tr>
            <tr class="border-b">
              <td class="py-2">Commentaire signalé</td>
              <td>Paul Bernard</td>
              <td>04/07/2023</td>
              <td><a href="#" class="text-blue-500">Voir</a></td>
            </tr>
            <tr>
              <td class="py-2">Modification catégorie</td>
              <td>Admin</td>
              <td>03/07/2023</td>
              <td><a href="#" class="text-blue-500">Voir</a></td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Quick actions -->
      <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-xl font-semibold mb-4">Actions rapides</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
          <a href="annonces.php?action=ajouter" class="bg-blue-500 hover:bg-blue-600 text-white p-3 rounded-lg flex items-center justify-center">
            <i class="fas fa-plus mr-2"></i> Ajouter une annonce
          </a>
          <a href="categories.php?action=ajouter" class="bg-green-500 hover:bg-green-600 text-white p-3 rounded-lg flex items-center justify-center">
            <i class="fas fa-plus mr-2"></i> Ajouter une catégorie
          </a>
          <a href="commentaires.php?filter=signales" class="bg-yellow-500 hover:bg-yellow-600 text-white p-3 rounded-lg flex items-center justify-center">
            <i class="fas fa-exclamation-triangle mr-2"></i> Commentaires signalés
          </a>
          <a href="parametres.php" class="bg-gray-500 hover:bg-gray-600 text-white p-3 rounded-lg flex items-center justify-center">
            <i class="fas fa-cog mr-2"></i> Paramètres du site
          </a>
        </div>
      </div>
    </main>
  </div>

  <script>
    // JavaScript pour interactions futures
    document.addEventListener('DOMContentLoaded', function() {
      // Code JavaScript ici
    });
  </script>
</body>

</html>