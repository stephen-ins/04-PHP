  <!-- Header -->
  <header class="bg-white shadow-md">
    <div class="container mx-auto px-4 py-3">
      <div class="flex flex-col md:flex-row md:justify-between md:items-center">
        <!-- Logo -->
        <div class="flex items-center justify-between">
          <a href="/php/annonceo/index.php" class="text-2xl font-bold text-blue-600">
            <span class="text-orange-500">Annonceo</span><span class="text-black text-sm"> by lebonCoin</span>
          </a>
          <button class="md:hidden focus:outline-none">
            <i class="fas fa-bars text-gray-600 text-xl"></i>
          </button>
        </div>

        <!-- Navigation -->
        <nav class="hidden md:flex space-x-6 text-gray-700">
          <a href="/php/annonceo/index.php" class="hover:text-blue-600 py-2 transition duration-300">Accueil</a>
          <a href="/php/annonceo/pages/annonces.php" class="hover:text-blue-600 py-2 transition duration-300">Annonces</a>
          <!-- <a href="pages/categories.php" class="hover:text-blue-600 py-2 transition duration-300">Catégories</a> -->
          <a href="/php/annonceo/pages/deposer-annonce.php" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-full transition duration-300">Déposer une annonce</a>
        </nav>

        <!-- User Menu -->
        <div class="hidden md:flex items-center space-x-4">
          <a href="/php/annonceo/pages/connexion.php" class="flex items-center hover:text-blue-600 transition duration-300">
            <i class="fa-regular fa-user mr-2"></i>
            Connexion
          </a>
        </div>
      </div>
    </div>
  </header>