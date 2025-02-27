<?php
// Inclusion des parties communes
include '../includes/header.php';

















include '../includes/navbar.php';
?>

<!-- Contenu du formulaire de dépôt d'annonce -->
<section class="py-12 bg-gray-100">
  <div class="container mx-auto px-4">
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow">
      <h1 class="text-3xl font-bold mb-8 text-center">Déposer une annonce</h1>

      <form action="traitement-annonce.php" method="POST" enctype="multipart/form-data">
        <!-- Titre de l'annonce -->
        <div class="mb-6">
          <label for="titre" class="block text-sm font-medium text-gray-700 mb-1">Titre de l'annonce *</label>
          <input type="text" name="titre" id="titre" required class="w-full border border-gray-300 rounded-md px-3 py-2">
        </div>

        <!-- Catégorie -->
        <div class="mb-6">
          <label for="categorie" class="block text-sm font-medium text-gray-700 mb-1">Catégorie *</label>
          <select name="categorie" id="categorie" required class="w-full border border-gray-300 rounded-md px-3 py-2">
            <option value="">Sélectionnez une catégorie</option>
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

        <!-- Description -->
        <div class="mb-6">
          <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description *</label>
          <textarea name="description" id="description" rows="5" required class="w-full border border-gray-300 rounded-md px-3 py-2"></textarea>
        </div>

        <!-- Prix -->
        <div class="mb-6">
          <label for="prix" class="block text-sm font-medium text-gray-700 mb-1">Prix en € *</label>
          <div class="flex items-center">
            <input type="number" name="prix" id="prix" required class="w-full border border-gray-300 rounded-md px-3 py-2">
            <!-- <span class="ml-2 text-gray-700">€</span> -->
          </div>
        </div>

        <!-- Photo -->
        <div class="mb-6">
          <label for="photo" class="block text-sm font-medium text-gray-700 mb-1">Photo principale *</label>
          <input type="file" name="photo" id="photo" accept="image/*" required class="w-full border border-gray-300 rounded-md px-3 py-2">
        </div>

        <!-- Localisation -->
        <div class="mb-6">
          <label for="ville" class="block text-sm font-medium text-gray-700 mb-1">Ville *</label>
          <input type="text" name="ville" id="ville" required class="w-full border border-gray-300 rounded-md px-3 py-2">
        </div>

        <!-- Bouton de soumission -->
        <div class="mt-8">
          <button type="submit" class="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 px-4 rounded-lg transition duration-300">
            Publier mon annonce
          </button>
        </div>
      </form>
    </div>
  </div>
</section>

<?php
// Inclusion du pied de page
include '../includes/footer.php';
?>