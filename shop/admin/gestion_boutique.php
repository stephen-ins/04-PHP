<?php

require_once('../include/init.php');

// Redirection vers la page index si l'user n'est pas connecté main non admin.
if (!adminConnected()) {
  //                   http://localhost/php/shop/index.php
  header('location: ' . URL . 'index.php');
}

require_once('include/header.php');
?>





<section class="section is-title-bar">
  <div class="level">
    <div class="level-left">
      <div class="level-item">
        <ul>
          <li>Admin</li>
          <li>Boutique</li>
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
    Lorem ipsum, dolor sit amet consectetur adipisicing elit.
  </div>
  <div class="card has-table">
    <header class="card-header">
      <p class="card-header-title">
        <span class="icon"><span class="mdi mdi-shopping-outline"></span>
        </span>
        10 produits
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
        <span class="icon"><span class="mdi mdi-shopping-outline"></span></span>
        Ajout Produit
      </p>
    </header>
    <div class="card-content">
      <form method="post">


        <div class="field is-horizontal">
          <div class="field-label is-normal">
            <label class="label">Référence | Catégorie</label>
          </div>
          <div class="field-body">
            <div class="field">
              <input class="input" type="text" name="reference" placeholder="Entrer la référence du produit" />
              <!-- <span class="icon is-small is-left"><i class="mdi mdi-account"></i></span> -->
            </div>
            <div class="field">
              <input class="input" type="text" name="category" placeholder="Entrer une catégorie de produit" />
            </div>
          </div>
        </div>


        <div class="field is-horizontal">
          <div class="field-label is-normal">
            <label class="label">Titre | Couleur</label>
          </div>
          <div class="field-body">
            <div class="field">
              <input class="input" type="text" name="title" placeholder="Entrer le nom du produit" />
              <!-- <span class="icon is-small is-left"><i class="mdi mdi-account"></i></span> -->
            </div>
            <div class="field">
              <input class="input" type="text" name="color" placeholder="Entrer la couleur du produit" />
            </div>
          </div>
        </div>

        <div class="field is-horizontal">
          <div class="field-label is-normal">
            <label class="label">Taille | Genre</label>
          </div>
          <div class="field-body">
            <div class="field is-narrow">
              <div class="control">
                <div class="select is-fullwidth">

                  <select name="size">
                    <option value="XS">XS</option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                    <option value="XXL">XXL</option>
                  </select>

                </div>
              </div>
            </div>

            <div class="field is-narrow">
              <div class="control">
                <div class="select is-fullwidth">

                  <select name="size">
                    <option value="HOMME">Homme</option>
                    <option value="FEMME">Femme</option>
                    <option value="MIXTE">Mixte</option>
                  </select>

                </div>
              </div>
            </div>


          </div>
        </div>

        <div class="field is-horizontal">
          <div class="field-label is-normal">
            <label class="label">Photo produit</label>
          </div>
          <div class="field-body">
            <div class="field">




              <div class="file has-name">
                <label class="file-label">
                  <input class="file-input" type="file" name="resume" />
                  <span class="file-cta">
                    <!-- <span class="file-icon">
                      <i class="fas fa-upload"></i>
                    </span> -->
                    <span class="file-label"> Choisir un fichier </span>
                  </span>
                  <span class="file-name"> Parcourir </span>
                </label>
              </div>




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
              <p class="help">Ne pas saisir le 1er (0)</p>
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