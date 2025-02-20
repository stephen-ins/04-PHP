<?php

require_once('../include/init.php');

// Redirection vers la page index si l'user n'est pas connecté main non admin.
if (!adminConnected()) {
  //                   http://localhost/php/shop/index.php
  header('location:' . URL . 'index.php');
}

// Afficher les commandes en cours de traitement provenant de la table order
$selectAllOrders = $connect_db->query("SELECT * FROM `order` WHERE state = 'treatment'");
// echo '<pre>';
// print_r($selectAllOrders);
// echo '</pre>';
$selectAllOrders = $selectAllOrders->fetchAll(PDO::FETCH_ASSOC);
// echo '<pre>';
// print_r($selectAllOrders);
// echo '</pre>';

// Afficher les clients qui ont passé des commandes en cours de traitment via une requete inner join
$selectAllClients = $connect_db->query("SELECT * FROM `order` INNER JOIN user ON `order`.user_id = id_user WHERE `order`.state = 'treatment'");
// echo '<pre>';
// print_r($selectAllClients);
// echo '</pre>';
$selectAllClients = $selectAllClients->fetchAll(PDO::FETCH_ASSOC);
// echo '<pre>';
// print_r($selectAllClients);
// echo '</pre>';

// J'ai maintenant les 11 commandes (actuelles) associé au client que j'aimerais afficher dans le tableau par tour de boucle
// Afficher les colonnes dans l'ordre suivant: id_order, id_user, created, rising, state, firstname, lastname, email, phone
// Ce qui done 9 colonnes à afficher : 
// Numéro de clients: Customer number
// Numéro de commande: Order number
// Date de commande: Order date
// Montant: Amount
// État de la commande: Order status
// Prénom: First name
// Nom: Last name
// Email: Email
// Téléphone: Phone






// Afficher les produits commandés par les clients



// Afficher le nombre de commande en cours de traitement
$countOrders = $connect_db->query("SELECT COUNT(*) AS total_orders FROM `order` WHERE state = 'treatment'");
$countOrders = $countOrders->fetch(PDO::FETCH_ASSOC)['total_orders'];
// echo '<pre>';
// print_r($countOrders);
// echo '</pre>';






require_once('include/header.php');

?>


<!DOCTYPE html>
<html
  lang="en"
  class="has-aside-left has-aside-mobile-transition has-navbar-fixed-top has-aside-expanded">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Boutique Admin Dashboard</title>

  <!-- Bulma is included -->
  <link rel="stylesheet" href="../assets/css/main.min.css" />

  <!-- Fonts -->
  <link rel="dns-prefetch" href="https://fonts.gstatic.com" />
  <link
    href="https://fonts.googleapis.com/css?family=Nunito"
    rel="stylesheet"
    type="text/css" />

  <!-- jQuery (OBLIGATOIRE pour DataTables) -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
  <!-- DataTables JS -->
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

</head>

<body>
  <div id="app">


    <section class="section is-title-bar">
      <div class="level">
        <div class="level-left">
          <div class="level-item">
            <ul>
              <li>Admin</li>
              <li>Commandes</li>
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
        Lorem ipsum, dolor sit amet consectetur adipisicing elit.
      </div> -->
      <div class="card has-table">
        <header class="card-header">
          <p class="card-header-title">
            <span class="icon"><span class="mdi mdi-cart-outline"></span>
              <!-- Afficher les commandes le nombres de commande présentes dans BDD -->
            </span>

            <span> <?php echo "<span style='color: red;'>$countOrders </span> commande" . ($countOrders > 1 ? "s" : ""); ?> en cours de traitement</span>



          </p>
          <a href="#" class="card-header-icon">
            <span class="icon"><i class="mdi mdi-reload"></i></span>
          </a>
        </header>
        <div class="card-content">
          <div class="b-table has-pagination">
            <div class="table-wrapper has-mobile-cards">
              <table id="table-clients"
                class="table is-fullwidth is-striped is-hoverable is-fullwidth">
                <thead>
                  <tr>
                    <th class="is-checkbox-cell">
                      <!-- <label class="b-checkbox checkbox">
                        <input type="checkbox" value="false" />
                        <span class="check"></span>
                      </label> -->
                    </th>

                    <!-- <th></th> -->
                    <th>Customer number</th>
                    <th>Order number</th>
                    <th>Order date</th>
                    <th>Amount</th>
                    <th>Order status</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>

                  <!-- Boucle foreach -->

                  <?php foreach ($selectAllClients as $client) : ?>
                    <tr>
                      <td class="is-checkbox-cell">
                        <label class="b-checkbox checkbox">
                          <input type="checkbox" value="false" />
                          <span class="check"></span>
                        </label>
                      </td>

                      <td data-label="Customer number" style="text-align: center;">CUSTOMER<?php echo  $client['user_id'] ?></td>
                      <td data-label="Order number" style="text-align: center;"> <span style="font-weight: bold; color: blue;"> FAMMS<?php echo $client['id_order'] ?></td>
                      <td data-label="Order date"><?php echo date('d/m/Y H:i', strtotime($client['date'])) ?></td>
                      <td data-label="Amount" style="text-align: right;"><span style="font-weight: bold; color: red;"><?php echo $client['rising'] ?></span> €</td>
                      <td data-label="Order status" style="text-align: center;"><?php echo $client['state'] ?></td>
                      <!-- <td data-label="Oder status" class="is-progress-cell">
                        <progress
                          max="100"
                          class="progress is-small is-primary"
                          value="50">
                          50
                        </progress>
                      </td> -->
                      <td data-label="Firstname"><?php echo $client['firstName'] ?></td>
                      <td data-label="Lastname"><?php echo strtoupper($client['lastName']) ?></td>
                      <td data-label="Email"><?php echo $client['email'] ?></td>
                      <td data-label="Phone"><?php echo $client['phone'] ?></td>

                      <!-- '<div class="alert alert-success text-center">Merci pour votre achat. Votre commande a bien été validée. Numéro de commande n°= ' . '<strong>FAMMS' . "$idOrder" . '</strong></div>'; -->



                      <td class="is-actions-cell">
                        <div class="buttons is-right">
                          <button
                            class="button is-small is-primary"
                            type="button">
                            <span class="icon"><i class="mdi mdi-eye"></i></span>
                          </button>

                          <button
                            class="button is-small is-danger jb-modal"
                            data-target="sample-modal"
                            type="button">
                            <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                          </button>

                        </div>
                      </td>
                    </tr>
                  <?php endforeach; ?>

                </tbody>
              </table>

              <script>
                $(document).ready(function() {
                  $("#table-clients").DataTable({
                    language: {
                      url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json",
                    },
                    aoColumnDefs: [{
                      bSortable: false,
                      aTargets: [0, 10],
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

    <!-- <section class="section is-main-section">
      <div class="card has-table">
        <header class="card-header">
          <p class="card-header-title">
            <span class="icon"><span class="mdi mdi-cart-arrow-down"></span>
            </span>
            Détails commande
          </p>
          <a href="#" class="card-header-icon">
            <span class="icon"><i class="mdi mdi-reload"></i></span>
          </a>
        </header>
        <div class="card-content">
          <div class="b-table has-pagination">
            <div class="table-wrapper has-mobile-cards">
              <table
                class="table is-fullwidth is-striped is-hoverable is-fullwidth">
                <thead>
                  <tr>
                    <th class="is-checkbox-cell">
                      <label class="b-checkbox checkbox">
                        <input type="checkbox" value="false" />
                        <span class="check"></span>
                      </label>
                    </th>
                    <th></th>
                    <th>Name</th>
                    <th>Company</th>
                    <th>City</th>
                    <th>Progress</th>
                    <th>Created</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="is-checkbox-cell">
                      <label class="b-checkbox checkbox">
                        <input type="checkbox" value="false" />
                        <span class="check"></span>
                      </label>
                    </td>
                    <td class="is-image-cell">
                      <div class="image">
                        <img
                          src="https://avatars.dicebear.com/v2/initials/rebecca-bauch.svg"
                          class="is-rounded" />
                      </div>
                    </td>
                    <td data-label="Name">Rebecca Bauch</td>
                    <td data-label="Company">Daugherty-Daniel</td>
                    <td data-label="City">South Cory</td>
                    <td data-label="Progress" class="is-progress-cell">
                      <progress
                        max="100"
                        class="progress is-small is-primary"
                        value="79">
                        79
                      </progress>
                    </td>
                    <td data-label="Created">
                      <small
                        class="has-text-grey is-abbr-like"
                        title="Oct 25, 2020">Oct 25, 2020</small>
                    </td>
                    <td class="is-actions-cell">
                      <div class="buttons is-right">
                        <button
                          class="button is-small is-primary"
                          type="button">
                          <span class="icon"><i class="mdi mdi-eye"></i></span>
                        </button>
                        <button
                          class="button is-small is-danger jb-modal"
                          data-target="sample-modal"
                          type="button">
                          <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                        </button>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div> -->
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
    <!-- </div>
        </div>
      </div>
    </section> -->



    <section class="section is-main-section">
      <div class="card">
        <header class="card-header">
          <p class="card-header-title">
            <span class="icon"><i class="mdi mdi-ballot"></i></span>
            Modification commande
          </p>
        </header>
        <div class="card-content">
          <form method="get">
            <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label class="label">From</label>
              </div>
              <div class="field-body">
                <div class="field">
                  <p class="control is-expanded has-icons-left">
                    <input class="input" type="text" placeholder="Name" />
                    <span class="icon is-small is-left"><i class="mdi mdi-account"></i></span>
                  </p>
                </div>
                <div class="field">
                  <p
                    class="control is-expanded has-icons-left has-icons-right">
                    <input
                      class="input is-success"
                      type="email"
                      placeholder="Email"
                      value="alex@smith.com" />
                    <span class="icon is-small is-left"><i class="mdi mdi-mail"></i></span>
                    <span class="icon is-small is-right"><i class="mdi mdi-check"></i></span>
                  </p>
                </div>
              </div>
            </div>
            <div class="field is-horizontal">
              <div class="field-label"></div>
              <div class="field-body">
                <div class="field is-expanded">
                  <div class="field has-addons">
                    <p class="control">
                      <a class="button is-static">+33</a>
                    </p>
                    <p class="control is-expanded">
                      <input
                        class="input"
                        type="tel"
                        placeholder="Your phone number" />
                    </p>
                  </div>
                  <p class="help">Do not enter the first zero</p>
                </div>
              </div>
            </div>
            <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label class="label">Department</label>
              </div>
              <div class="field-body">
                <div class="field is-narrow">
                  <div class="control">
                    <div class="select is-fullwidth">
                      <select>
                        <option>Business development</option>
                        <option>Marketing</option>
                        <option>Sales</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label class="label">Subject</label>
              </div>
              <div class="field-body">
                <div class="field">
                  <div class="control">
                    <input
                      class="input is-danger"
                      type="text"
                      placeholder="e.g. Partnership opportunity" />
                  </div>
                  <p class="help is-danger">This field is required</p>
                </div>
              </div>
            </div>

            <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label class="label">Question</label>
              </div>
              <div class="field-body">
                <div class="field">
                  <div class="control">
                    <textarea
                      class="textarea"
                      placeholder="Explain how we can help you"></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="field is-horizontal">
              <div class="field-label">
                <label class="label">Switch</label>
              </div>
              <div class="field-body">
                <div class="field">
                  <label class="switch is-rounded"><input type="checkbox" value="false" />
                    <span class="check"></span>
                    <span class="control-label">Default</span>
                  </label>
                </div>
              </div>
            </div>
            <hr />
            <div class="field is-horizontal">
              <div class="field-label">
                <!-- Left empty for spacing -->
              </div>
              <div class="field-body">
                <div class="field">
                  <div class="field is-grouped">
                    <div class="control">
                      <button type="submit" class="button is-primary">
                        <span>Submit</span>
                      </button>
                    </div>
                    <div class="control">
                      <button
                        type="button"
                        class="button is-primary is-outlined">
                        <span>Reset</span>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>

    <?php
    require_once('include/footer.php');
    ?>