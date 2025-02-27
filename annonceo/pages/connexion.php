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

// // Variable pour les messages d'erreur
// $error = '';

// // Traitement du formulaire si soumis
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//   // Récupération des données du formulaire
//   $email = isset($_POST['email']) ? trim($_POST['email']) : '';
//   $password = isset($_POST['password']) ? $_POST['password'] : '';

//   // Validation basique
//   if (empty($email) || empty($password)) {
//     $error = 'Veuillez remplir tous les champs.';
//   } else {
//     // Connexion à la base de données
//     try {
//       $pdo = new PDO('mysql:host=localhost;dbname=annonceo', 'root', '');
//       $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//       // Préparation de la requête
//       $stmt = $pdo->prepare('SELECT id, email, mot_de_passe FROM utilisateurs WHERE email = :email');
//       $stmt->execute(['email' => $email]);
//       $user = $stmt->fetch(PDO::FETCH_ASSOC);

//       // Vérification si l'utilisateur existe et si le mot de passe est correct
//       if ($user && password_verify($password, $user['mot_de_passe'])) {
//         // Création de la session
//         $_SESSION['user_id'] = $user['id'];
//         $_SESSION['user_email'] = $user['email'];

//         // Redirection vers la page d'accueil
//         header('Location: index.php');
//         exit();
//       } else {
//         $error = 'Email ou mot de passe incorrect.';
//       }
//     } catch (PDOException $e) {
//       $error = 'Erreur de connexion à la base de données: ' . $e->getMessage();
//     }
//   }
// }




include '../includes/navbar.php';

?>

<div class="flex items-center justify-center min-h-screen bg-gray-100">
  <div class="container max-w-md bg-white p-8 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-6 text-center">Connexion</h1>

    <?php if (!empty($error)) : ?>
      <div class="bg-red-100 text-red-700 p-4 rounded mb-4"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>

    <form method="post" action="">
      <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
        <input type="email" id="email" name="email" required value="<?php echo htmlspecialchars($email ?? ''); ?>" class="w-full border border-gray-300 rounded-md px-3 py-2 mt-1">
      </div>

      <div class="mb-8">
        <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe:</label>
        <input type="password" id="password" name="password" required class="w-full border border-gray-300 rounded-md px-3 py-2 mt-1">
      </div>

      <div class="mb-6">
        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md transition duration-300">Se connecter</button>
      </div>

      <div class="text-center">
        <span class="text-black">Pas encore inscrit ? </span><a href="inscription.php" class="text-blue-600 hover:underline mt-4"> S'inscrire</a>
      </div>

      <!-- <a href="mot_de_passe_oublie.php" class="text-blue-600 hover:underline">Mot de passe oublié?</a> -->
  </div>
  </form>
</div>
</div>


</body>



<?php
include '../includes/footer.php';
?>

</html>