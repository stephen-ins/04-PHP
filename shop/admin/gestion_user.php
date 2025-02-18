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
echo '<pre>';
print_r($dataUsers);
echo '</pre>';

// Recherche des client par rapport au 'roles' -> admin
$dataAdmin = $connect_db->query("SELECT * FROM user WHERE roles = 'admin'");
$dataAdmin = $dataAdmin->fetchAll(PDO::FETCH_ASSOC);
echo '<pre>';
print_r($dataAdmin);
echo '</pre>';












require_once('include/header.php');

?>



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
  <div class="notification is-primary">
    <button class="delete"></button>
    Le client a été retiré avec succès.
  </div>
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
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>City</th>
                <th>Created</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <!-- Par tour de boucle, insérer les 'roles' user dans ce tableau -->
              <?php foreach ($dataUsers as $user) : ?>
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

                  <td data-label="Firstname"><?php echo $user['firstName']; ?></td>
                  <td data-label="Lastname"><?php echo $user['lastName']; ?></td>
                  <td data-label="Email"><?php echo $user['email']; ?></td>
                  <td data-label="City"><?php echo $user['city']; ?></td>
                  <td data-label="Created"><?php echo $user['firstname']; ?></td>

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
              <?php endforeach; ?>

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
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>City</th>
                <th>Created</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <!-- Par tour de boucle, insérer les 'roles' admin dans ce tableau -->
              <?php foreach ($dataAdmin as $admin) : ?>
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

                  </td>

                  <td data-label="Firstname"><?php echo $admin['firstName']; ?></td>
                  <td data-label="Lastname"><?php echo $admin['lastName']; ?></td>
                  <td data-label="Email"><?php echo $admin['email']; ?></td>
                  <td data-label="City"><?php echo $admin['city']; ?></td>
                  <td data-label="Created"><?php echo $admin['']; ?></td>

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
              <?php endforeach; ?>

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

<section class="section is-main-section">
  <div class="card">
    <header class="card-header">
      <p class="card-header-title">
        <span class="icon"><i class="mdi mdi-ballot"></i></span>
        Modification utilisateur
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