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
          <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-md transition duration-300 w-full">
            Filtrer les annonces
          </button>
        </div>
      </form>
    </div>

    <section class="py-12 bg-gray-100">
      <div class="container mx-auto px-4">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

          <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:shadow-lg hover:scale-[1.03] hover:-translate-y-1 hover:bg-orange-200">
            <div class="h-48 bg-gray-300 relative">
              <img src="https://via.placeholder.com/400x300" alt="material" class="w-full h-full object-cover">
              <span class="absolute top-2 right-2 bg-slate-700 text-white text-sm font-bold px-3 py-1 rounded-full">0 €</span>
            </div>
            <div class="p-4">
              <h3 class="text-lg font-bold mb-2">Title product</h3>
              <p class="text-gray-600 text-sm mb-4">Grade</p>
              <div class="flex justify-between items-center">
                <span class="text-gray-500 text-sm"><i class="fas fa-map-marker-alt mr-1"></i> City</span>
                <span class="text-gray-500 text-sm"><i class="far fa-clock mr-1"></i> Date</span>
              </div>
            </div>
          </div>
          <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:shadow-lg hover:scale-[1.03] hover:-translate-y-1 hover:bg-orange-200">
            <div class="h-48 bg-gray-300 relative">
              <img src="https://via.placeholder.com/400x300" alt="material" class="w-full h-full object-cover">
              <span class="absolute top-2 right-2 bg-slate-700 text-white text-sm font-bold px-3 py-1 rounded-full">0 €</span>
            </div>
            <div class="p-4">
              <h3 class="text-lg font-bold mb-2">Title product</h3>
              <p class="text-gray-600 text-sm mb-4">Grade</p>
              <div class="flex justify-between items-center">
                <span class="text-gray-500 text-sm"><i class="fas fa-map-marker-alt mr-1"></i> City</span>
                <span class="text-gray-500 text-sm"><i class="far fa-clock mr-1"></i> Date</span>
              </div>
            </div>
          </div>
          <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:shadow-lg hover:scale-[1.03] hover:-translate-y-1 hover:bg-orange-200">
            <div class="h-48 bg-gray-300 relative">
              <img src="https://via.placeholder.com/400x300" alt="material" class="w-full h-full object-cover">
              <span class="absolute top-2 right-2 bg-slate-700 text-white text-sm font-bold px-3 py-1 rounded-full">0 €</span>
            </div>
            <div class="p-4">
              <h3 class="text-lg font-bold mb-2">Title product</h3>
              <p class="text-gray-600 text-sm mb-4">Grade</p>
              <div class="flex justify-between items-center">
                <span class="text-gray-500 text-sm"><i class="fas fa-map-marker-alt mr-1"></i> City</span>
                <span class="text-gray-500 text-sm"><i class="far fa-clock mr-1"></i> Date</span>
              </div>
            </div>
          </div>
          <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:shadow-lg hover:scale-[1.03] hover:-translate-y-1 hover:bg-orange-200">
            <div class="h-48 bg-gray-300 relative">
              <img src="https://via.placeholder.com/400x300" alt="material" class="w-full h-full object-cover">
              <span class="absolute top-2 right-2 bg-slate-700 text-white text-sm font-bold px-3 py-1 rounded-full">0 €</span>
            </div>
            <div class="p-4">
              <h3 class="text-lg font-bold mb-2">Title product</h3>
              <p class="text-gray-600 text-sm mb-4">Grade</p>
              <div class="flex justify-between items-center">
                <span class="text-gray-500 text-sm"><i class="fas fa-map-marker-alt mr-1"></i> City</span>
                <span class="text-gray-500 text-sm"><i class="far fa-clock mr-1"></i> Date</span>
              </div>
            </div>
          </div>
          <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:shadow-lg hover:scale-[1.03] hover:-translate-y-1 hover:bg-orange-200">
            <div class="h-48 bg-gray-300 relative">
              <img src="https://via.placeholder.com/400x300" alt="material" class="w-full h-full object-cover">
              <span class="absolute top-2 right-2 bg-slate-700 text-white text-sm font-bold px-3 py-1 rounded-full">0 €</span>
            </div>
            <div class="p-4">
              <h3 class="text-lg font-bold mb-2">Title product</h3>
              <p class="text-gray-600 text-sm mb-4">Grade</p>
              <div class="flex justify-between items-center">
                <span class="text-gray-500 text-sm"><i class="fas fa-map-marker-alt mr-1"></i> City</span>
                <span class="text-gray-500 text-sm"><i class="far fa-clock mr-1"></i> Date</span>
              </div>
            </div>
          </div>
          <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:shadow-lg hover:scale-[1.03] hover:-translate-y-1 hover:bg-orange-200">
            <div class="h-48 bg-gray-300 relative">
              <img src="https://via.placeholder.com/400x300" alt="material" class="w-full h-full object-cover">
              <span class="absolute top-2 right-2 bg-slate-700 text-white text-sm font-bold px-3 py-1 rounded-full">0 €</span>
            </div>
            <div class="p-4">
              <h3 class="text-lg font-bold mb-2">Title product</h3>
              <p class="text-gray-600 text-sm mb-4">Grade</p>
              <div class="flex justify-between items-center">
                <span class="text-gray-500 text-sm"><i class="fas fa-map-marker-alt mr-1"></i> City</span>
                <span class="text-gray-500 text-sm"><i class="far fa-clock mr-1"></i> Date</span>
              </div>
            </div>
          </div>
          <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:shadow-lg hover:scale-[1.03] hover:-translate-y-1 hover:bg-orange-200">
            <div class="h-48 bg-gray-300 relative">
              <img src="https://via.placeholder.com/400x300" alt="material" class="w-full h-full object-cover">
              <span class="absolute top-2 right-2 bg-slate-700 text-white text-sm font-bold px-3 py-1 rounded-full">0 €</span>
            </div>
            <div class="p-4">
              <h3 class="text-lg font-bold mb-2">Title product</h3>
              <p class="text-gray-600 text-sm mb-4">Grade</p>
              <div class="flex justify-between items-center">
                <span class="text-gray-500 text-sm"><i class="fas fa-map-marker-alt mr-1"></i> City</span>
                <span class="text-gray-500 text-sm"><i class="far fa-clock mr-1"></i> Date</span>
              </div>
            </div>
          </div>
          <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:shadow-lg hover:scale-[1.03] hover:-translate-y-1 hover:bg-orange-200">
            <div class="h-48 bg-gray-300 relative">
              <img src="https://via.placeholder.com/400x300" alt="material" class="w-full h-full object-cover">
              <span class="absolute top-2 right-2 bg-slate-700 text-white text-sm font-bold px-3 py-1 rounded-full">0 €</span>
            </div>
            <div class="p-4">
              <h3 class="text-lg font-bold mb-2">Title product</h3>
              <p class="text-gray-600 text-sm mb-4">Grade</p>
              <div class="flex justify-between items-center">
                <span class="text-gray-500 text-sm"><i class="fas fa-map-marker-alt mr-1"></i> City</span>
                <span class="text-gray-500 text-sm"><i class="far fa-clock mr-1"></i> Date</span>
              </div>
            </div>
          </div>
          <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:shadow-lg hover:scale-[1.03] hover:-translate-y-1 hover:bg-orange-200">
            <div class="h-48 bg-gray-300 relative">
              <img src="https://via.placeholder.com/400x300" alt="material" class="w-full h-full object-cover">
              <span class="absolute top-2 right-2 bg-slate-700 text-white text-sm font-bold px-3 py-1 rounded-full">0 €</span>
            </div>
            <div class="p-4">
              <h3 class="text-lg font-bold mb-2">Title product</h3>
              <p class="text-gray-600 text-sm mb-4">Grade</p>
              <div class="flex justify-between items-center">
                <span class="text-gray-500 text-sm"><i class="fas fa-map-marker-alt mr-1"></i> City</span>
                <span class="text-gray-500 text-sm"><i class="far fa-clock mr-1"></i> Date</span>
              </div>
            </div>
          </div>
          <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:shadow-lg hover:scale-[1.03] hover:-translate-y-1 hover:bg-orange-200">
            <div class="h-48 bg-gray-300 relative">
              <img src="https://via.placeholder.com/400x300" alt="material" class="w-full h-full object-cover">
              <span class="absolute top-2 right-2 bg-slate-700 text-white text-sm font-bold px-3 py-1 rounded-full">0 €</span>
            </div>
            <div class="p-4">
              <h3 class="text-lg font-bold mb-2">Title product</h3>
              <p class="text-gray-600 text-sm mb-4">Grade</p>
              <div class="flex justify-between items-center">
                <span class="text-gray-500 text-sm"><i class="fas fa-map-marker-alt mr-1"></i> City</span>
                <span class="text-gray-500 text-sm"><i class="far fa-clock mr-1"></i> Date</span>
              </div>
            </div>
          </div>
          <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:shadow-lg hover:scale-[1.03] hover:-translate-y-1 hover:bg-orange-200">
            <div class="h-48 bg-gray-300 relative">
              <img src="https://via.placeholder.com/400x300" alt="material" class="w-full h-full object-cover">
              <span class="absolute top-2 right-2 bg-slate-700 text-white text-sm font-bold px-3 py-1 rounded-full">0 €</span>
            </div>
            <div class="p-4">
              <h3 class="text-lg font-bold mb-2">Title product</h3>
              <p class="text-gray-600 text-sm mb-4">Grade</p>
              <div class="flex justify-between items-center">
                <span class="text-gray-500 text-sm"><i class="fas fa-map-marker-alt mr-1"></i> City</span>
                <span class="text-gray-500 text-sm"><i class="far fa-clock mr-1"></i> Date</span>
              </div>
            </div>
          </div>
          <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:shadow-lg hover:scale-[1.03] hover:-translate-y-1 hover:bg-orange-200">
            <div class="h-48 bg-gray-300 relative">
              <img src="https://via.placeholder.com/400x300" alt="material" class="w-full h-full object-cover">
              <span class="absolute top-2 right-2 bg-slate-700 text-white text-sm font-bold px-3 py-1 rounded-full">0 €</span>
            </div>
            <div class="p-4">
              <h3 class="text-lg font-bold mb-2">Title product</h3>
              <p class="text-gray-600 text-sm mb-4">Grade</p>
              <div class="flex justify-between items-center">
                <span class="text-gray-500 text-sm"><i class="fas fa-map-marker-alt mr-1"></i> City</span>
                <span class="text-gray-500 text-sm"><i class="far fa-clock mr-1"></i> Date</span>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section>

  </div>
  </div>
</section>

<?php
// Inclusion du pied de page
include '../includes/footer.php';
?>