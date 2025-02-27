<?php
// Inclusion des parties communes
include '../includes/header.php';

















include '../includes/navbar.php';
?>

<!-- Contenu de la page des annonces -->
<section class="py-12 bg-gray-100">
  <div class="container mx-auto px-4">
    <h1 class="text-3xl font-bold mb-8 text-center">Toutes nos annonces</h1>

    <!-- Filtres de recherche -->
    <div class="bg-white p-4 mb-8 rounded-lg shadow">
      <form action="annonces.php" method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="mb-4 md:mb-0">
          <label for="categorie" class="block text-sm font-medium text-gray-700 mb-1">Catégorie</label>
          <select name="categorie" id="categorie" class="w-full border border-gray-300 rounded-md px-3 py-2">
            <option value="">Toutes les catégories</option>
            <option value="immobilier">Immobilier</option>
            <option value="vehicules">Véhicules</option>
            <option value="multimedia">Multimédia</option>
            <option value="maison">Maison</option>
            <option value="loisirs">Loisirs</option>
            <option value="materiels">Matériels</option>
            <option value="services">Services</option>
            <option value="maison">Maison</option>
            <option value="vetements">Vêtements</option>
            <option value="autres">Autres</option>
          </select>
        </div>

        <div class="mb-4 md:mb-0">
          <label for="prix" class="block text-sm font-medium text-gray-700 mb-1">Prix maximum</label>
          <input type="number" name="prix" id="prix" placeholder="€" class="w-full border border-gray-300 rounded-md px-3 py-2">
        </div>

        <div class="flex items-end">
          <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md transition duration-300 w-full">
            Filtrer les annonces
          </button>
        </div>
      </form>
    </div>

    <!-- Liste des annonces -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <!-- Annonces s'afficheront ici, à interconnecter avec la base de données ultérieurement -->







    </div>
  </div>
</section>

<?php
// Inclusion du pied de page
include '../includes/footer.php';
?>