<?php

include '../includes/header.php';

// // Démarrage de la session
// session_start();

// // Vérification si l'utilisateur est déjà connecté
// if (isset($_SESSION['user_id'])) {
//   // Rediriger vers la page d'accueil
//   header('Location: index.php');
//   exit();
// }

// // Variables pour les messages
// $error = '';
// $success = '';

// // Traitement du formulaire si soumis
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//   // Récupération des données du formulaire
//   $nom = isset($_POST['nom']) ? trim($_POST['nom']) : '';
//   $prenom = isset($_POST['prenom']) ? trim($_POST['prenom']) : '';
//   $civilite = isset($_POST['civilite']) ? $_POST['civilite'] : '';
//   $pseudo = isset($_POST['pseudo']) ? trim($_POST['pseudo']) : '';
//   $telephone = isset($_POST['telephone']) ? trim($_POST['telephone']) : '';
//   $email = isset($_POST['email']) ? trim($_POST['email']) : '';
//   $password = isset($_POST['password']) ? $_POST['password'] : '';
//   $confirm_password = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';

//   // Validation des données
//   if (empty($nom) || empty($prenom) || empty($civilite) || empty($pseudo) || empty($telephone) || empty($email) || empty($password) || empty($confirm_password)) {
//     $error = 'Tous les champs sont obligatoires.';
//   } elseif ($password !== $confirm_password) {
//     $error = 'Les mots de passe ne correspondent pas.';
//   } else {
//     // Hashage du mot de passe
//     $hashed_password = password_hash($password, PASSWORD_DEFAULT);

//     // Connexion à la base de données
//     $conn = new mysqli('localhost', 'root', '', 'annonceo');

//     // Vérification de la connexion
//     if ($conn->connect_error) {
//       die('Erreur de connexion : ' . $conn->connect_error);
//     }

//     // Préparation de la requête d'insertion
//     $stmt = $conn->prepare('INSERT INTO users (nom, prenom, civilite, pseudo, telephone, email, password) VALUES (?, ?, ?, ?, ?, ?, ?)');
//     $stmt->bind_param('sssssss', $nom, $prenom, $civilite, $pseudo, $telephone, $email, $hashed_password);

//     // Exécution de la requête
//     if ($stmt->execute()) {
//       $success = 'Inscription réussie. Vous pouvez maintenant vous connecter.';
//     } else {
//       $error = 'Erreur lors de l\'inscription : ' . $stmt->error;
//     }

//     // Fermeture de la connexion
//     $stmt->close();
//     $conn->close();
//   }
// }

include '../includes/navbar.php';

?>

<div class="flex items-center justify-center min-h-screen bg-gray-100 m-16">
  <div class="container max-w-md bg-white p-8 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-6 text-center">Inscription</h1>

    <?php if (!empty($error)): ?>
      <div class="bg-red-100 text-red-700 p-4 rounded mb-4"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>

    <?php if (!empty($success)): ?>
      <div class="bg-green-100 text-green-700 p-4 rounded mb-4"><?php echo htmlspecialchars($success); ?></div>
    <?php endif; ?>

    <form method="post" action="">
      <div class="mb-4">
        <label for="nom" class="block text-sm font-medium text-gray-700">Nom</label>
        <input type="text" id="nom" name="nom" required class="w-full border border-gray-300 rounded-md px-3 py-2 mt-1">
      </div>

      <div class="mb-4">
        <label for="prenom" class="block text-sm font-medium text-gray-700">Prénom</label>
        <input type="text" id="prenom" name="prenom" required class="w-full border border-gray-300 rounded-md px-3 py-2 mt-1">
      </div>

      <div class="mb-4">
        <label for="civilite" class="block text-sm font-medium text-gray-700">Civilité</label>
        <select id="civilite" name="civilite" required class="w-full border border-gray-300 rounded-md px-3 py-2 mt-1">
          <option value="M">Monsieur</option>
          <option value="Mme">Madame</option>
        </select>
      </div>

      <div class="mb-4">
        <label for="pseudo" class="block text-sm font-medium text-gray-700">Pseudo</label>
        <input type="text" id="pseudo" name="pseudo" required class="w-full border border-gray-300 rounded-md px-3 py-2 mt-1">
      </div>

      <div class="mb-4">
        <label for="telephone" class="block text-sm font-medium text-gray-700">Téléphone</label>
        <input type="text" id="telephone" name="telephone" required class="w-full border border-gray-300 rounded-md px-3 py-2 mt-1">
      </div>

      <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" id="email" name="email" required class="w-full border border-gray-300 rounded-md px-3 py-2 mt-1">
      </div>

      <div class="mb-4">
        <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
        <input type="password" id="password" name="password" required class="w-full border border-gray-300 rounded-md px-3 py-2 mt-1">
      </div>

      <div class="mb-8">
        <label for="confirm_password" class="block text-sm font-medium text-gray-700">Confirmer le mot de passe</label>
        <input type="password" id="confirm_password" name="confirm_password" required class="w-full border border-gray-300 rounded-md px-3 py-2 mt-1">
      </div>

      <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-300">S'inscrire</button>

      <div class="mt-6 text-center">
        <p class="text-sm text-gray-600">
          Déjà inscrit ? <a href="connexion.php" class="text-blue-600 hover:underline">Connectez-vous</a>
        </p>
      </div>
    </form>
  </div>
</div>

<?php

include '../includes/footer.php';

?>