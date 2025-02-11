<!DOCTYPE html>
<html
  lang="en"
  class="has-aside-left has-aside-mobile-transition has-navbar-fixed-top has-aside-expanded">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin One HTML - Bulma Admin Dashboard</title>

  <!-- Bulma is included -->
  <link rel="stylesheet" href="../assets/css/main.min.css" />

  <!-- Fonts -->
  <link rel="dns-prefetch" href="https://fonts.gstatic.com" />
  <link
    href="https://fonts.googleapis.com/css?family=Nunito"
    rel="stylesheet"
    type="text/css" />
</head>

<body>
  <div id="app">
    <nav id="navbar-main" class="navbar is-fixed-top">
      <div class="navbar-brand">
        <a class="navbar-item is-hidden-desktop jb-aside-mobile-toggle">
          <span class="icon"><i class="mdi mdi-forwardburger mdi-24px"></i></span>
        </a>
      </div>
      <div class="navbar-menu fadeIn animated faster" id="navbar-menu">
        <div class="navbar-end">
          <div
            class="navbar-item has-dropdown has-dropdown-with-icons has-divider has-user-avatar is-hoverable">
            <a class="navbar-link is-arrowless">
              <div class="is-user-avatar">
                <img
                  src="https://avatars.dicebear.com/v2/initials/john-doe.svg"
                  alt="John Doe" />
              </div>
              <div class="is-user-name"><span>John Doe</span></div>
              <!-- <span class="icon"><i class="mdi mdi-chevron-down"></i></span> -->
            </a>
            <!-- <div class="navbar-dropdown">
                <a href="profile.php" class="navbar-item">
                  <span class="icon"><i class="mdi mdi-account"></i></span>
                  <span>My Profile</span>
                </a>
                <a class="navbar-item">
                  <span class="icon"><i class="mdi mdi-settings"></i></span>
                  <span>Settings</span>
                </a>
                <a class="navbar-item">
                  <span class="icon"><i class="mdi mdi-email"></i></span>
                  <span>Messages</span>
                </a>
                <hr class="navbar-divider" />
                <a class="navbar-item">
                  <span class="icon"><i class="mdi mdi-logout"></i></span>
                  <span>Log Out</span>
                </a>
              </div> -->
          </div>
          <a title="Log out" class="navbar-item is-desktop-icon-only">
            <span class="icon"><i class="mdi mdi-logout"></i></span>
            <span>Log out</span>
          </a>
        </div>
      </div>
    </nav>
    <aside class="aside is-placed-left is-expanded">
      <div class="aside-tools">
        <div class="aside-tools-label">
          <span><b>Boutique</b> Admin</span>
        </div>
      </div>
      <div class="menu is-menu-main">
        <p class="menu-label">General</p>
        <ul class="menu-list">
          <li>
            <a href="index.php" class="has-icon">
              <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
              <span class="menu-item-label">Dashboard</span>
            </a>
          </li>
        </ul>
        <p class="menu-label">MENU</p>
        <ul class="menu-list">
          <li>
            <a href="gestion_boutique.php" class="is-active has-icon">
              <span class="icon has-update-mark"><span class="mdi mdi-store"></span>
              </span>
              <span class="menu-item-label">Boutique</span>
            </a>
          </li>
          <li>
            <a href="gestion_commande.php" class="has-icon">
              <span class="icon"><span class="mdi mdi-sheep"></span> </span>
              <span class="menu-item-label">Commandes</span>
            </a>
          </li>
          <li>
            <a href="gestion_user.php" class="has-icon">
              <span class="icon"><i class="mdi mdi-account-circle"></i></span>
              <span class="menu-item-label">Utilisateurs</span>
            </a>
          </li>
          <li>
            <a href="../index.php" title="Log out" class="has-icon">
              <span class="icon"><i class="mdi mdi-logout"></i></span>
              <span>Quitter</span>
            </a>
          </li>
        </ul>
      </div>
    </aside>
    <section class="section is-title-bar">
      <div class="level">
        <div class="level-left">
          <div class="level-item">
            <ul>
              <li>Admin</li>
              <li>Dashboard</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <section class="hero is-hero-bar">
      <div class="hero-body">
        <div class="level">
          <div class="level-left">
            <div class="level-item">
              <h1 class="title">Dashboard</h1>
            </div>
          </div>
          <div class="level-right" style="display: none">
            <div class="level-item"></div>
          </div>
        </div>
      </div>
    </section>
    <section class="section is-main-section">
      <div class="tile is-ancestor">
        <div class="tile is-parent">
          <div class="card tile is-child">
            <div class="card-content">
              <div class="level is-mobile">
                <div class="level-item">
                  <div class="is-widget-label">
                    <h3 class="subtitle is-spaced">Clients</h3>
                    <h1 class="title">512</h1>
                  </div>
                </div>
                <div class="level-item has-widget-icon">
                  <div class="is-widget-icon">
                    <span class="icon has-text-primary is-large"><i class="mdi mdi-account-multiple mdi-48px"></i></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tile is-parent">
          <div class="card tile is-child">
            <div class="card-content">
              <div class="level is-mobile">
                <div class="level-item">
                  <div class="is-widget-label">
                    <h3 class="subtitle is-spaced">Sales</h3>
                    <h1 class="title">$7,770</h1>
                  </div>
                </div>
                <div class="level-item has-widget-icon">
                  <div class="is-widget-icon">
                    <span class="icon has-text-info is-large"><i class="mdi mdi-cart-outline mdi-48px"></i></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tile is-parent">
          <div class="card tile is-child">
            <div class="card-content">
              <div class="level is-mobile">
                <div class="level-item">
                  <div class="is-widget-label">
                    <h3 class="subtitle is-spaced">Performance</h3>
                    <h1 class="title">256%</h1>
                  </div>
                </div>
                <div class="level-item has-widget-icon">
                  <div class="is-widget-icon">
                    <span class="icon has-text-success is-large"><i class="mdi mdi-finance mdi-48px"></i></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="card has-table has-mobile-sort-spaced">
        <header class="card-header">
          <p class="card-header-title">
            <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
            Produits stock insuffisant
          </p>
          <a href="#" class="card-header-icon">
            <span class="icon"><i class="mdi mdi-reload"></i></span>
          </a>
        </header>
        <div class="card-content">
          <div class="b-table has-pagination">
            <div class="table-wrapper has-mobile-cards">
              <table
                class="table is-fullwidth is-striped is-hoverable is-sortable is-fullwidth">
                <thead>
                  <tr>
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
    <footer class="footer">
      <div class="container-fluid">
        <div class="level">
          <div class="level-left">
            <div class="level-item">© 2025, Grégory LACROIX</div>
          </div>
        </div>
      </div>
    </footer>
  </div>

  <div id="sample-modal" class="modal">
    <div class="modal-background jb-modal-close"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">Confirm action</p>
        <button class="delete jb-modal-close" aria-label="close"></button>
      </header>
      <section class="modal-card-body">
        <p>This will permanently delete <b>Some Object</b></p>
        <p>This is sample modal</p>
      </section>
      <footer class="modal-card-foot">
        <button class="button jb-modal-close">Cancel</button>
        <button class="button is-danger jb-modal-close">Delete</button>
      </footer>
    </div>
    <button
      class="modal-close is-large jb-modal-close"
      aria-label="close"></button>
  </div>

  <!-- Scripts below are for demo only -->
  <script type="text/javascript" src="../assets/js/main.min.js"></script>
  <script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
  <script type="text/javascript" src="js/chart.sample.min.js"></script>

  <!-- Icons below are for demo only. Feel free to use any icon pack. Docs: https://bulma.io/documentation/elements/icon/ -->
  <link
    rel="stylesheet"
    href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css" />
</body>

</html>