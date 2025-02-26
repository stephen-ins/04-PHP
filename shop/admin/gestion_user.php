<?php

require_once('../include/init.php');

// Redirection vers la page index si l'user n'est pas connecté main non admin.
if (!adminConnected()) {
  //                   http://localhost/php/shop/index.php
  header('location:' . URL . 'index.php');
}


// Insérer les clients (user) inscrits dans la BDD, avec leur lastname, firstname , email, city, zipcode, et date d'inscription
$data = $connect_db->query("SELECT * FROM user");
// echo '<pre>';
// print_r($data);
// echo '</pre>';

// Recherche des client par rapport au 'roles' -> user
$dataUsers = $connect_db->query("SELECT * FROM user WHERE roles = 'user'");
$dataUsers = $dataUsers->fetchAll(PDO::FETCH_ASSOC);
// echo '<pre>';
// print_r($dataUsers);
// echo '</pre>';

// Recherche des client par rapport au 'roles' -> admin
$dataAdmin = $connect_db->query("SELECT * FROM user WHERE roles = 'admin'");
$dataAdmin = $dataAdmin->fetchAll(PDO::FETCH_ASSOC);
// echo '<pre>';
// print_r($dataAdmin);
// echo '</pre>';

// Commande SQL pour changer le format de la date
$dataUsers = $connect_db->query("SELECT *, DATE_FORMAT(created, '%d/%m/%Y') AS created FROM user WHERE roles = 'user'");
$dataUsers = $dataUsers->fetchAll(PDO::FETCH_ASSOC);

$dataAdmin = $connect_db->query("SELECT *, DATE_FORMAT(created, '%d/%m/%Y') AS created FROM user WHERE roles = 'admin'");
$dataAdmin = $dataAdmin->fetchAll(PDO::FETCH_ASSOC);


// Récupération des données clients à insérer dans une modale
$dataClient = $connect_db->query("SELECT * FROM user WHERE roles = 'user'");
$dataClient = $dataClient->fetchAll(PDO::FETCH_ASSOC);
// echo '<pre>';
// print_r($dataClient);
// echo '</pre>';

// Boucle pour afficher les commandes du client
$orderData = $connect_db->query("SELECT * FROM `order` INNER JOIN user ON order.user_id = user.id_user");
$orderData = $orderData->fetchAll(PDO::FETCH_ASSOC);
// echo '<pre>';
// print_r($orderData);
// echo '</pre>';




require_once('include/header.php');

?>


<!-- jQuery (OBLIGATOIRE pour DataTables) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>


<section class="section is-title-bar">
  <div class="level">
    <div class="level-left">
      <div class="level-item">
        <ul>
          <li>Admin</li>
          <li>Utilisateurs</li>
        </ul>
      </div>
    </div>
    <!-- <div class="level-right">
            <div class="level-item">
              <div class="buttons is-right">
                <a
                  href="https://github.com/vikdiesel/admin-one-bulma-dashboard"
                  target="_blank"
                  class="button is-primary"
                >
                  <span class="icon"
                    ><i class="mdi mdi-github-circle"></i
                  ></span>
                  <span>GitHub</span>
                </a>
              </div>
            </div>
          </div> -->
  </div>
</section>
<section class="section is-main-section">
  <!-- <div class="notification is-primary">
    <button class="delete"></button>
    Le client a été retiré avec succès.
  </div> -->
  <div class="card has-table">
    <header class="card-header">
      <p class="card-header-title">
        <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
        Clients
      </p>
      <a href="#" class="card-header-icon">
        <span class="icon"><i class="mdi mdi-reload"></i></span>
      </a>
    </header>
    <div class="card-content">
      <div class="b-table has-pagination">
        <div class="table-wrapper has-mobile-cards">
          <table id="table-clients" class="table is-fullwidth is-striped is-hoverable">
            <thead>
              <tr>
                <th class="is-checkbox-cell"></th>
                <th>Customer number</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Phone</th>
                <th>City</th>
                <th>Account created</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($dataUsers as $user) : ?>
                <tr>
                  <td class="is-image-cell">
                    <div class="image">
                      <img src="<?php echo ($user['gender'] == 'female') ? '../assets/images-famma/portrait_femme.jpg' : '../assets/images-famma/portrait_homme.jpg'; ?>" />
                    </div>
                  </td>
                  <td data-label="Customer number" class="has-text-centered"><?php echo 'CUSTOMER ' . $user['id_user']; ?></td>
                  <td data-label="Firstname"><?php echo $user['firstName']; ?></td>
                  <td data-label="Lastname"><?php echo strtoupper($user['lastName']); ?></td>
                  <td data-label="Email"><?php echo $user['email']; ?></td>
                  <td data-label="Phone"><?php echo $user['phone']; ?></td>
                  <td data-label="City"><?php echo $user['city']; ?></td>
                  <td data-label="Created"><?php echo $user['created']; ?></td>
                  <td class="is-actions-cell">
                    <div class="buttons is-right">
                      <button
                        type="button"
                        class="button is-small is-primary jb-modal"
                        data-target="sample-modal-<?= $user['id_user'] ?>">
                        <span class="icon"><i class="mdi mdi-eye"></i></span>
                      </button>
                    </div>
                  </td>
                </tr>

              <?php endforeach; ?>
            </tbody>
          </table>
          <!-- Affichage des données clients et des commandes en cours -->
          <?php foreach ($dataClient as $client) : ?>
            <div id="sample-modal-<?= $client['id_user'] ?>" class="modal">
              <div class="modal-background jb-modal-close"></div>
              <div class="modal-card">
                <header class="modal-card-head">

                  <button class="delete jb-modal-close" aria-label="close"></button>
                </header>
                <section class="modal-card-body">
                  <div class="columns">
                    <div class="column">
                      <p><strong>Order in progress:</strong></p>
                      <p><strong>Customer:</strong></p>
                      <p><strong>Email:</strong></p>
                      <p><strong>Phone:</strong></p>
                      <p><strong>City:</strong></p>
                      <p><strong>Zipcode:</strong></p>
                      <p><strong>Address:</strong></p>
                      <p><strong>Created:</strong></p>
                    </div>
                    <div class="column">
                      <?php foreach ($orderData as $order) : ?>
                        <?php if ($order['user_id'] == $client['id_user']) : ?>
                          <span><strong style="color: red;"><?= 'FAMMS' . $order['id_order'] ?></strong></span>
                        <?php endif; ?>
                      <?php endforeach; ?>
                      <p><?= 'CUSTOMER' . $client['id_user'] ?></p>
                      <p><?= $client['email'] ?></p>
                      <p><?= $client['phone'] ?></p>
                      <p><?= $client['city'] ?></p>
                      <p><?= $client['zipcode'] ?></p>
                      <p><?= $client['address'] ?></p>
                      <p><?= $client['created'] ?></p>
                    </div>
                  </div>
                </section>
                <footer class="modal-card-foot">
                  <button class="button jb-modal-close">Fermer</button>
                </footer>
              </div>
              <button class="modal-close is-large jb-modal-close" aria-label="close"></button>
            </div>
          <?php endforeach; ?>


          <script>
            $(document).ready(function() {
              $("#table-clients").DataTable({
                language: {
                  url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json",
                },
                aoColumnDefs: [{
                  bSortable: false,
                  aTargets: [0, 8],
                }, ],
              });
            });
          </script>

        </div>
        <!-- <div class="notification">
                <div class="level">
                  <div class="level-left">
                    <div class="level-item">
                      <div class="buttons has-addons">
                        <button type="button" class="button is-active">
                          1
                        </button>
                        <button type="button" class="button">2</button>
                        <button type="button" class="button">3</button>
                      </div>
                    </div>
                  </div>
                  <div class="level-right">
                    <div class="level-item">
                      <small>Page 1 of 3</small>
                    </div>
                  </div>
                </div>
              </div> -->
      </div>
    </div>
  </div>
</section>

<section class="section is-main-section">
  <div class="card has-table">
    <header class="card-header">
      <p class="card-header-title">
        <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
        Administrateurs
      </p>
      <a href="#" class="card-header-icon">
        <span class="icon"><i class="mdi mdi-reload"></i></span>
      </a>
    </header>
    <div class="card-content">
      <div class="b-table has-pagination">
        <div class="table-wrapper has-mobile-cards">
          <table id="table-clients0"
            class="table is-fullwidth is-striped is-hoverable is-fullwidth">
            <thead>
              <tr>
                <th class="is-checkbox-cell">
                </th>
                <th>Custom member</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Phone</th>
                <th>City</th>
                <th>Account created</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <!-- Par tour de boucle, insérer les 'roles' admin dans ce tableau -->
              <?php foreach ($dataAdmin as $admin) : ?>
                <tr>

                  <td class="is-image-cell">
                    <div class="image">

                      <div class="image">
                        <img src="<?php echo ($user['gender'] == 'female') ? '../assets/images-famma/portrait_femme.jpg' : '../assets/images-famma/portrait_homme.jpg'; ?>" />
                      </div>

                    </div>
                  </td>

                  <td data-label="Firstname" class="has-text-centered">ADMIN<?php echo $admin['id_user']; ?></td>
                  <td data-label="Firstname"><?php echo $admin['firstName']; ?></td>
                  <td data-label="Lastname"><?php echo   strtoupper($admin['lastName']); ?></td>
                  <td data-label="Email"><?php echo $admin['email']; ?></td>
                  <td data-label="Email"><?php echo $admin['phone']; ?></td>
                  <td data-label="City"><?php echo $admin['city']; ?></td>
                  <td data-label="Created"><?php echo $admin['created']; ?></td>



                  <td class="is-actions-cell">
                    <div class="buttons is-right">
                      <!-- <button
                        class="button is-small is-primary"
                        type="button">
                        <span class="icon"><i class="mdi mdi-eye"></i></span>
                      </button> -->






                    </div>
                  </td>
                </tr>




              <?php endforeach; ?>

            </tbody>
          </table>

          <script>
            $(document).ready(function() {
              $("#table-clients0").DataTable({
                language: {
                  url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json",
                },
                aoColumnDefs: [{
                  bSortable: false,
                  aTargets: [0, 8],
                }, ],
              });
            });
          </script>

        </div>
        <!-- <div class="notification">
                <div class="level">
                  <div class="level-left">
                    <div class="level-item">
                      <div class="buttons has-addons">
                        <button type="button" class="button is-active">
                          1
                        </button>
                        <button type="button" class="button">2</button>
                        <button type="button" class="button">3</button>
                      </div>
                    </div>
                  </div>
                  <div class="level-right">
                    <div class="level-item">
                      <small>Page 1 of 3</small>
                    </div>
                  </div>
                </div>
              </div> -->
      </div>
    </div>
  </div>
</section>



<?php
require_once('include/footer.php');
?>