<?php

require_once('../include/init.php');

// Redirection vers la page index si l'user n'est pas connecté main non admin.
if (!adminConnected()) {
  //                   http://localhost/php/shop/index.php
  header('location: ' . URL . 'index.php');
}

if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST') {

  // echo '<pre>';
  // print_r($_FILES);
  // echo '</pre>';

  // echo '<pre>';
  // print_r($_POST);
  // echo '</pre>';

  // $_FILES est une superglobale qui permet de stocker les données d'un fichier uploadé (nom, extension, taille etc...)
  // Si une image à bien été uploadée
  if (!empty($_FILES['picture']['name'])) {

    // Contrôle de l'extension
    $currentExtension = [1 => 'jpg', 2 => 'jpeg', 3 => 'png', 4 => 'webp'];
    $fileUploaded = new SplFileInfo($_FILES['picture']['name']);
    // SplFileInfo est une classe prédéfinie en PHP qui permet de traiter les données d'un fichier uploadé, elle contient ses propres métodes (fonctions)


    // echo '<pre>';
    // print_r($fileUploaded);
    // echo '</pre>';

    // echo '<pre>';
    // print_r(get_class_methods($fileUploaded));
    // echo '</pre>';

    // getExtension() est une méthode de la classe SplFileInfo qui retoune l'extension du fichier uploadé
    $fileUploadedExtension = $fileUploaded->getExtension();
    // echo "Format du fichier chargé :" . $fileUploadedExtension . '<br>';

    // array_search() permet de rechercher une valeur dans un tableau et retourne la position d'un élément (indice) si elle est trouvée
    // Exemple:     position            png              [jpg, jpeg, png, webp]
    $positionExtension = array_search($fileUploadedExtension, $currentExtension);
    // echo "Position de l'extension :" . $positionExtension . '<br>';

    // Si array_search() retourne FALSE, cela signifie que l'extension du fichier uploadé n'est pas dans le tableau Array $currentExtension alors on entre dans le IF
    if ($positionExtension === false) {
      $errorPicture = "<small class= 'has-text-danger'>Extention non valide. Veuillez utiliser .jpg, .jpeg, .png, .webp]</small>";
    } else {

      // On concatène la référence du produit avec le nom de l'image 
      $pictureName = $_POST['reference'] . '-' . $_FILES['picture']['name'];
      // echo $pictureName . '<br>';

      // On définit le chemin de l'image qui sera stockée en BDD
      $pictureUrlDb = URL . "assets/images-produits/$pictureName";
      // echo $pictureUrlDb . '<br>';

      // On définit le chemin physique de l'image qui sera stockée sur le serveur où sera copié l'image
      // /opt/lampp/htdocs/php/shop/assets/images-produits/2545CBT-p7.png
      $pictureFolder = RACINE_SITE . "assets/images-produits/$pictureName";
      // echo $pictureFolder;

      // La fonction prédéfinie copy() permet de copier un fichier depuis un emplacement vers un autre
      // 2 arguments : copy(chemin_source, chemin_destination)
      //               () image accéssible dans $_FILES , dossier de destination sur le serveur)
      copy($_FILES['picture']['tmp_name'], $pictureFolder);

      // Requête SQL d'insertion pour insérer un produit en BDD
      $data = $connect_db->prepare('INSERT INTO product (reference, category, title, color, size, description, price, stock, picture, public) VALUES (:reference, :category, :title, :color, :size, :description, :price, :stock, :picture, :public)');
      $data->bindValue(':reference', $_POST['reference'], PDO::PARAM_STR);
      $data->bindValue(':category', $_POST['category'], PDO::PARAM_STR);
      $data->bindValue(':title', $_POST['title'], PDO::PARAM_STR);
      $data->bindValue(':color', $_POST['color'], PDO::PARAM_STR);
      $data->bindValue(':size', $_POST['size'], PDO::PARAM_STR);
      $data->bindValue(':description', $_POST['description'], PDO::PARAM_STR);
      $data->bindValue(':price', $_POST['price']);
      $data->bindValue(':stock', $_POST['stock'], PDO::PARAM_INT);
      $data->bindValue(':picture', $pictureUrlDb, PDO::PARAM_STR);
      $data->bindValue(':public', $_POST['public'], PDO::PARAM_INT);
      $data->execute();
    }
  }
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

      <!-- enctype : mutlipart/formdata : permet de récupérer en php les données d'un fichier uploadé -->
      <form method="post" enctype="multipart/form-data">
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

                  <select name="public">
                    <option value="homme">Homme</option>
                    <option value="femme">Femme</option>
                    <option value="mixte">Mixte</option>
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
                  <input class="file-input" type="file" name="picture" />
                  <span class="file-cta">
                    <!-- <span class="file-icon">
                      <i class="fas fa-upload"></i>
                    </span> -->
                    <span class="file-label"> Choisir un fichier </span>
                  </span>
                  <span class="file-name"> Parcourir </span>
                </label>
              </div>
              <?php if (isset($errorPicture)) echo $errorPicture; ?>
            </div>
          </div>
        </div>


        <div class="field is-horizontal">
          <div class="field-label is-normal">
            <label class="label">Description</label>
          </div>
          <div class="field-body">
            <div class="field">
              <div class="control">
                <textarea
                  class="textarea"
                  name="description"
                  placeholder="Entrer une description du produit"></textarea>
              </div>
            </div>
          </div>
        </div>

        <div class="field is-horizontal">
          <div class="field-label is-normal">
            <label class="label">Prix | Stock</label>
          </div>
          <div class="field-body">
            <div class="field">
              <input class="input" type="text" name="price" placeholder="Entrer un prix produit" />
            </div>
            <div class="field">
              <input class="input" type="text" name="stock" placeholder="Entrer un stock produit" />
            </div>
          </div>
        </div>



        <!-- LE SWITCH POUR ACTIVER/DESACTIVER LE PRODUIT  -->
        <!-- <div class="field is-horizontal">
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
        </div> -->


        <hr />
        <div class="field is-horizontal">
          <div class="field-label">
            <!-- Left empty for spacing -->
          </div>
          <div class="field-body">
            <div class="field">
              <div class="field is-grouped">
                <div class="control">
                  <button type="submit" name="submit" class="button is-primary">
                    <span>Enregistrer</span>
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


Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam neque hic cumque id nihil aliquid eaque, porro corrupti quia quos odio perspiciatis alias aperiam ipsa quibusdam commodi pariatur molestiae maiores!