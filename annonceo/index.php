<?php
// Inclusion des parties communes
include 'includes/header.php';


























include 'includes/navbar.php';
?>

<!-- Hero Section -->
<section class="bg-gradient-to-r from-slate-500 to-slate-800 py-16 text-white">
  <div class="container mx-auto px-4">
    <div class="max-w-3xl mx-auto text-center">
      <h1 class="text-4xl md:text-5xl font-bold mb-10">Votre bonheur est ici</h1>
      <p class="text-xl my-10">Produit.</p>

      <!-- Search Form -->
      <form action="pages/recherche.php" method="GET" class="bg-white rounded-full p-1 flex flex-col md:flex-row">
        <input type="text" name="q" placeholder="Que recherchez-vous ?" class="flex-1 py-3 px-6 rounded-full focus:outline-none text-gray-800">
        <select name="categorie" class="py-3 px-6 rounded-full focus:outline-none text-gray-800 border-l border-gray-300">
          <option value="">Toutes catégories</option>
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
        <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 px-6 rounded-full transition duration-300">
          <i class="fas fa-search mr-2"></i> Rechercher
        </button>
      </form>
    </div>
  </div>
</section>

<!-- Latest Ads Section -->
<section class="py-12 bg-gray-100">
  <div class="container mx-auto px-4">
    <h2 class="text-3xl font-bold mb-8 text-center">Nos annonces</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
      <!-- Ad 1 -->
      <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
        <div class="h-48 bg-gray-300 relative">
          <img src="https://via.placeholder.com/400x300" alt="iPhone 12 Pro" class="w-full h-full object-cover">
          <span class="absolute top-2 right-2 bg-blue-600 text-white text-sm font-bold px-3 py-1 rounded-full">700 €</span>
        </div>
        <div class="p-4">
          <h3 class="text-lg font-bold mb-2">iPhone 12 Pro - 128 Go</h3>
          <p class="text-gray-600 text-sm mb-4">Excellent état, encore sous garantie</p>
          <div class="flex justify-between items-center">
            <span class="text-gray-500 text-sm"><i class="fas fa-map-marker-alt mr-1"></i> Paris</span>
            <span class="text-gray-500 text-sm"><i class="far fa-clock mr-1"></i> Il y a 2 heures</span>
          </div>
        </div>
      </div>

      <!-- Ad 2 -->
      <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
        <div class="h-48 bg-gray-300 relative">
          <img src="https://via.placeholder.com/400x300" alt="Vélo électrique" class="w-full h-full object-cover">
          <span class="absolute top-2 right-2 bg-blue-600 text-white text-sm font-bold px-3 py-1 rounded-full">850 €</span>
        </div>
        <div class="p-4">
          <h3 class="text-lg font-bold mb-2">Vélo électrique Nakamura</h3>
          <p class="text-gray-600 text-sm mb-4">1 an d'utilisation, très bon état</p>
          <div class="flex justify-between items-center">
            <span class="text-gray-500 text-sm"><i class="fas fa-map-marker-alt mr-1"></i> Lyon</span>
            <span class="text-gray-500 text-sm"><i class="far fa-clock mr-1"></i> Il y a 1 jour</span>
          </div>
        </div>
      </div>

      <!-- Ad 3 -->
      <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
        <div class="h-48 bg-gray-300 relative">
          <img src="https://via.placeholder.com/400x300" alt="Canapé d'angle" class="w-full h-full object-cover">
          <span class="absolute top-2 right-2 bg-blue-600 text-white text-sm font-bold px-3 py-1 rounded-full">450 €</span>
        </div>
        <div class="p-4">
          <h3 class="text-lg font-bold mb-2">Canapé d'angle convertible</h3>
          <p class="text-gray-600 text-sm mb-4">Tissu gris, comme neuf</p>
          <div class="flex justify-between items-center">
            <span class="text-gray-500 text-sm"><i class="fas fa-map-marker-alt mr-1"></i> Marseille</span>
            <span class="text-gray-500 text-sm"><i class="far fa-clock mr-1"></i> Il y a 3 jours</span>
          </div>
        </div>
      </div>

      <!-- Ad 4 -->
      <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
        <div class="h-48 bg-gray-300 relative">
          <img src="https://via.placeholder.com/400x300" alt="PlayStation 5" class="w-full h-full object-cover">
          <span class="absolute top-2 right-2 bg-blue-600 text-white text-sm font-bold px-3 py-1 rounded-full">400 €</span>
        </div>
        <div class="p-4">
          <h3 class="text-lg font-bold mb-2">PlayStation 5 avec 2 manettes</h3>
          <p class="text-gray-600 text-sm mb-4">Achetée il y a 6 mois, peu utilisée</p>
          <div class="flex justify-between items-center">
            <span class="text-gray-500 text-sm"><i class="fas fa-map-marker-alt mr-1"></i> Toulouse</span>
            <span class="text-gray-500 text-sm"><i class="far fa-clock mr-1"></i> Il y a 5 heures</span>
          </div>
        </div>
      </div>
    </div>

    <div class="text-center mt-8">
      <a href="pages/annonces.php" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-full transition duration-300">
        Voir toutes les annonces
      </a>
    </div>
  </div>
</section>

<!-- Why Choose Us -->
<section class="py-12 bg-white">
  <div class="container mx-auto px-4">
    <h2 class="text-3xl font-bold mb-12 text-center">Pourquoi choisir Annonceo ?</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <!-- Feature 1 -->
      <div class="text-center">
        <div class="bg-blue-100 p-6 rounded-full w-24 h-24 mx-auto mb-6 flex items-center justify-center">
          <i class="fas fa-check text-blue-600 text-3xl"></i>
        </div>
        <h3 class="text-xl font-bold mb-3">Fiabilité</h3>
        <p class="text-gray-600">Une selection premium.</p>
      </div>

      <!-- Feature 2 -->
      <div class="text-center">
        <div class="bg-green-100 p-6 rounded-full w-24 h-24 mx-auto mb-6 flex items-center justify-center">
          <i class="fas fa-bolt text-green-600 text-3xl"></i>
        </div>
        <h3 class="text-xl font-bold mb-3">Rapidité</h3>
        <p class="text-gray-600">Ne perdez pas de temps.</p>
      </div>

      <!-- Feature 3 -->
      <div class="text-center">
        <div class="bg-orange-100 p-6 rounded-full w-24 h-24 mx-auto mb-6 flex items-center justify-center">
          <i class="fas fa-hand-holding-heart text-orange-600 text-3xl"></i>
        </div>
        <h3 class="text-xl font-bold mb-3">Écologique</h3>
        <p class="text-gray-600">La seconde vie est notre raison.</p>
      </div>
    </div>
  </div>
</section>

<!-- CTA Section -->
<section class="bg-orange-500 py-16 text-white">
  <div class="container mx-auto px-4 text-center">
    <h2 class="text-3xl font-bold mb-6">Vous avez des objets à vendre ?</h2>
    <p class="text-xl max-w-3xl mx-auto mb-8">Photographier, rédiger, publier !</p>
    <a href="pages/deposer-annonce.php" class="inline-block bg-white text-blue-600 hover:bg-gray-100 font-bold py-3 px-8 rounded-full transition duration-300">
      Déposer une annonce maintenant
    </a>
  </div>
</section>

<?php
// Inclusion du pied de page
include 'includes/footer.php';
?>