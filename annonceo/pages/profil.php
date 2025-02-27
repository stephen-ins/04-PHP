<?php
include '../includes/header.php';

// Démarrage de la session si pas déjà fait
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

// Vérification si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
  // Rediriger vers la page de connexion
  header('Location: connexion.php');
  exit();
}

// Variables pour les messages
$error = '';
$success = '';

// Connexion à la base de données
$conn = new mysqli('localhost', 'root', '', 'annonceo');

// Vérification de la connexion
if ($conn->connect_error) {
  die('Erreur de connexion : ' . $conn->connect_error);
}

// Récupération des données de l'utilisateur
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare('SELECT nom, prenom, civilite, pseudo, telephone, email FROM users WHERE id = ?');
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Traitement du formulaire de mise à jour
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nom = isset($_POST['nom']) ? trim($_POST['nom']) : '';
  $prenom = isset($_POST['prenom']) ? trim($_POST['prenom']) : '';
  $civilite = isset($_POST['civilite']) ? $_POST['civilite'] : '';
  $pseudo = isset($_POST['pseudo']) ? trim($_POST['pseudo']) : '';
  $telephone = isset($_POST['telephone']) ? trim($_POST['telephone']) : '';
  $email = isset($_POST['email']) ? trim($_POST['email']) : '';
  $current_password = isset($_POST['current_password']) ? $_POST['current_password'] : '';
  $new_password = isset($_POST['new_password']) ? $_POST['new_password'] : '';
  $confirm_new_password = isset($_POST['confirm_new_password']) ? $_POST['confirm_new_password'] : '';

  // Validation des données
  if (empty($nom) || empty($prenom) || empty($civilite) || empty($pseudo) || empty($telephone) || empty($email)) {
    $error = 'Les champs nom, prénom, civilité, pseudo, téléphone et email sont obligatoires.';
  } else {
    // Vérification du mot de passe actuel si un nouveau mot de passe est fourni
    if (!empty($new_password)) {
      // Récupérer le mot de passe hashé actuel
      $password_stmt = $conn->prepare('SELECT password FROM users WHERE id = ?');
      $password_stmt->bind_param('i', $user_id);
      $password_stmt->execute();
      $password_result = $password_stmt->get_result();
      $password_data = $password_result->fetch_assoc();

      if (empty($current_password) || !password_verify($current_password, $password_data['password'])) {
        $error = 'Le mot de passe actuel est incorrect.';
      } elseif ($new_password !== $confirm_new_password) {
        $error = 'Les nouveaux mots de passe ne correspondent pas.';
      } else {
        // Hashage du nouveau mot de passe
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Mise à jour de l'utilisateur avec nouveau mot de passe
        $update_stmt = $conn->prepare('UPDATE users SET nom=?, prenom=?, civilite=?, pseudo=?, telephone=?, email=?, password=? WHERE id=?');
        $update_stmt->bind_param('sssssssi', $nom, $prenom, $civilite, $pseudo, $telephone, $email, $hashed_password, $user_id);
      }
    } else {
      // Mise à jour de l'utilisateur sans modifier le mot de passe
      $update_stmt = $conn->prepare('UPDATE users SET nom=?, prenom=?, civilite=?, pseudo=?, telephone=?, email=? WHERE id=?');
      $update_stmt->bind_param('ssssssi', $nom, $prenom, $civilite, $pseudo, $telephone, $email, $user_id);
    }

    // Exécution de la mise à jour
    if (isset($update_stmt)) {
      if ($update_stmt->execute()) {
        $success = 'Profil mis à jour avec succès.';

        // Mise à jour des données affichées
        $user['nom'] = $nom;
        $user['prenom'] = $prenom;
        $user['civilite'] = $civilite;
        $user['pseudo'] = $pseudo;
        $user['telephone'] = $telephone;
        $user['email'] = $email;
      } else {
        $error = 'Erreur lors de la mise à jour: ' . $update_stmt->error;
      }
    }
  }
}

include '../includes/navbar.php';
?>

<div class="flex items-center justify-center min-h-screen bg-gray-100 m-16">
  <div class="container max-w-md bg-white p-8 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-6 text-center">Votre Profil</h1>

    <?php if (!empty($error)): ?>
      <div class="bg-red-100 text-red-700 p-4 rounded mb-4"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>

    <?php if (!empty($success)): ?>
      <div class="bg-green-100 text-green-700 p-4 rounded mb-4"><?php echo htmlspecialchars($success); ?></div>
    <?php endif; ?>

    <form method="post">
      <div class="mb-4">
        <label for="nom" class="block text-sm font-medium text-gray-700">Nom</label>
        <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($user['nom']); ?>" required class="w-full border border-gray-300 rounded-md px-3 py-2 mt-1">
      </div>

      <div class="mb-4">
        <label for="prenom" class="block text-sm font-medium text-gray-700">Prénom</label>
        <input type="text" id="prenom" name="prenom" value="<?php echo htmlspecialchars($user['prenom']); ?>" required class="w-full border border-gray-300 rounded-md px-3 py-2 mt-1">
      </div>

      <div class="mb-4">
        <label for="civilite" class="block text-sm font-medium text-gray-700">Civilité</label>
        <select id="civilite" name="civilite" required class="w-full border border-gray-300 rounded-md px-3 py-2 mt-1">
          <option value="M" <?php echo ($user['civilite'] == 'M') ? 'selected' : ''; ?>>Monsieur</option>
          <option value="Mme" <?php echo ($user['civilite'] == 'Mme') ? 'selected' : ''; ?>>Madame</option>
        </select>
      </div>

      <div class="mb-4">
        <label for="pseudo" class="block text-sm font-medium text-gray-700">Pseudo</label>
        <input type="text" id="pseudo" name="pseudo" value="<?php echo htmlspecialchars($user['pseudo']); ?>" required class="w-full border border-gray-300 rounded-md px-3 py-2 mt-1">
      </div>

      <div class="mb-4">
        <label for="telephone" class="block text-sm font-medium text-gray-700">Téléphone</label>
        <input type="text" id="telephone" name="telephone" value="<?php echo htmlspecialchars($user['telephone']); ?>" required class="w-full border border-gray-300 rounded-md px-3 py-2 mt-1">
      </div>

      <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required class="w-full border border-gray-300 rounded-md px-3 py-2 mt-1">
      </div>

      <h2 class="text-xl font-bold mb-4 mt-8">Changer de mot de passe</h2>
      <p class="text-sm text-gray-600 mb-4">Laissez vide si vous ne souhaitez pas modifier votre mot de passe</p>

      <div class="mb-4">
        <label for="current_password" class="block text-sm font-medium text-gray-700">Mot de passe actuel</label>
        <input type="password" id="current_password" name="current_password" class="w-full border border-gray-300 rounded-md px-3 py-2 mt-1">
      </div>

      <div class="mb-4">
        <label for="new_password" class="block text-sm font-medium text-gray-700">Nouveau mot de passe</label>
        <input type="password" id="new_password" name="new_password" class="w-full border border-gray-300 rounded-md px-3 py-2 mt-1">
      </div>

      <div class="mb-8">
        <label for="confirm_new_password" class="block text-sm font-medium text-gray-700">Confirmer le nouveau mot de passe</label>
        <input type="password" id="confirm_new_password" name="confirm_new_password" class="w-full border border-gray-300 rounded-md px-3 py-2 mt-1">
      </div>

      <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-300">Mettre à jour le profil</button>
    </form>
  </div>
</div>

<?php
include '../includes/footer.php';
$conn->close();
?>