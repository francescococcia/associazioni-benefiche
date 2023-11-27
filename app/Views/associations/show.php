<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>

  <div class="content mb-5">
    <div class="wrap">
      <div class="page-headline-wrap cc-category-headline">
        <h1 class="section-heading primary-text">Dettagli</h1>
        <!-- <#?php if(session()->get('isPlatformManager')): ?>
          <p class="big-paragraph">Visualizza gli eventi inseriti</p>
          <div class="row">
            <div class="col">
              <a
                class="btn btn-clean btn-c-4129 btn-rd"
                href="<#?php echo base_url();?>/events/new">Inserisci evento</a>
            </div>
          </div>
          <#?php else: ?> -->
            <p class="big-paragraph">Informazioni riguardo l'associazione</p>
          <!-- <#?php endif; ?> -->
      </div>
    </div>
  </div>

  <div class="content mb-5">
    <div class="row d-flex">
      <!-- start associations -->
      <div class="col-md-6 col-sm-6 offset-lg-2">
        <div class="card shadow-lg p-3 mb-5 bg-white rounded">
          <div class="card-body">
            <div class="text-center mb-4">
              <h3><strong><?= $association['name']; ?></strong></h3>
            </div>
            <?php if ($association['image']) : ?>
              <picture>
                <img src="<?php echo base_url('uploads/'.$association['image']); ?>"
                  data-src="<?php echo base_url('uploads/'.$association['image']); ?>"
                  class="img-fluid img-rd-lg lazyload mb-5 center"
                  alt="<?php echo $association['image']; ?>" width="350" height="350">
              </picture>
            <?php endif; ?>
            <p><strong>Sede Legale:</strong> <?= $association['legal_address']; ?></p>
            <?php if ($association['office']): ?>
              <p><strong>Sede Operativa:</strong> <?= $association['office']; ?></p>
            <?php endif; ?>
            <p><strong>Codice Fiscale:</strong> <?= $association['tax_code']; ?></p>
            <p><strong>Descrizione:</strong> <?= $association['description']; ?></p>
            <?php if ($association['link']): ?>
              Per saperne di più su <strong><?= $association['name']; ?></strong> clicca sul seguente
              <a href="<?= ($association['link'])?>" target="_blank">LINK</a>
            <?php endif; ?>

            <?php if (session()->get('isPlatformManager') &&
              session()->get('id') == $association['id']): ?>
              <div class="col-2 ml-0 pl-0 mt-3">
                <!-- Add data-toggle and data-target attributes for Bootstrap Modal -->
                <a href="<?= site_url('profile-manager') ?>"
                  class="btn btn-warning text-white">
                    Modifica
                </a>
              </div>
            <?php endif; ?>
          </div>
        </div>

        <!-- start events -->
        <section class="pt-5 pb-5">
          <div class="container">
            <div class="row">
              <div class="col-6">
                  <h3 class="mb-3">Eventi</h3>
              </div>
              <div class="col-6 text-right">
                <a class="btn btn-primary mb-3 mr-1" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                    <i class="fa fa-arrow-left"></i>
                </a>
                <a class="btn btn-primary mb-3" href="#carouselExampleIndicators2" role="button" data-slide="next">
                    <i class="fa fa-arrow-right"></i>
                </a>
              </div>
              <div class="col-12">
                <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                      <?php if ($events) {
                          $i = 0;
                          while ($i < count($events)) {
                              echo '<div class="carousel-item ' . ($i === 0 ? 'active' : '') . '">';
                              echo '<div class="row">';
                              for ($j = 0; $j < 3 && $i < count($events); $j++, $i++) {
                                  echo '<div class="col-md-4 mb-3">';
                                  echo '<div class="card">';
                                  echo '<img class="card-img card-img-top image" src="';
                                  if ($events[$i]['image']) {
                                      echo base_url('uploads/events/'.$events[$i]['image']);
                                  } else {
                                      echo base_url('public/img/yehorlisnyi210400016.jpg');
                                  }
                                  echo '" alt="' . $events[$i]['image'] . '">';
                                  echo '<div class="card-body">';
                                  echo "<p class='card-text'>" . formatDateItalian($events[$i]['date']) . "</p>";
                                  if (strlen($events[$i]['title']) > 20) {
                                    echo "<h5 class='card-title'><strong>" . (substr($events[$i]['title'], 0, 20).'...') . "</strong></h5>";
                                  } else {
                                    echo "<h5 class='card-title'><strong>{$events[$i]['title']}</strong></h5>";
                                  }
                                  echo "<a href='".site_url('event/detail/' . $events[$i]['id'])."' class='card-link'>Maggiori Informazioni <i class='fa-solid fa-arrow-right'></i></a>";
                                  echo '</div>';
                                  echo '</div>';
                                  echo '</div>';
                              }
                              echo '</div>';
                              echo '</div>';
                          }
                      } else {
                          echo '<p>Nessun evento inserito.</p>';
                      }
                      ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- end events -->

        <!-- start products -->
        <section class="pt-5 pb-5">
          <div class="container">
            <div class="row">
              <div class="col-6">
                  <h3 class="mb-3">Prodotti</h3>
              </div>
              <div class="col-6 text-right">
                <a class="btn btn-primary mb-3 mr-1" href="#carouselExampleIndicators3" role="button" data-slide="prev">
                    <i class="fa fa-arrow-left"></i>
                </a>
                <a class="btn btn-primary mb-3" href="#carouselExampleIndicators3" role="button" data-slide="next">
                    <i class="fa fa-arrow-right"></i>
                </a>
              </div>
              <div class="col-12">
                <div id="carouselExampleIndicators3" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                      <?php if ($products) {
                          $i = 0;
                          while ($i < count($products)) {
                              echo '<div class="carousel-item ' . ($i === 0 ? 'active' : '') . '">';
                              echo '<div class="row">';
                              for ($j = 0; $j < 3 && $i < count($products); $j++, $i++) {
                                  echo '<div class="col-md-4 mb-3">';
                                  echo '<div class="card">';
                                  echo '<img class="card-img card-img-top image" src="';
                                  if ($products[$i]['image']) {
                                      echo base_url('uploads/products/'.$products[$i]['image']);
                                  } else {
                                      echo base_url('public/img/yehorlisnyi210400016.jpg');
                                  }
                                  echo '" alt="' . $products[$i]['image'] . '">';
                                  echo '<div class="card-body">';
                                  if (strlen($products[$i]['name']) > 20) {
                                    echo "<h5 class='card-title'><strong>" . (substr($products[$i]['name'], 0, 20).'...') . "</strong></h5>";
                                  } else {
                                    echo "<h5 class='card-title'><strong>{$products[$i]['name']}</strong></h5>";
                                  }
                                  echo "<a href='".site_url('product/detail/' . $products[$i]['id'])."' class='card-link'>Maggiori Informazioni <i class='fa-solid fa-arrow-right'></i></a>";
                                  echo '</div>';
                                  echo '</div>';
                                  echo '</div>';
                              }
                              echo '</div>';
                              echo '</div>';
                          }
                      } else {
                          echo '<p>Nessun prodotto inserito.</p>';
                      }
                      ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- end products -->
      </div>
      <!-- end associations -->

      <!-- start news -->
      <div class="col-md-3 col-sm-6">
        <div class="card shadow-lg p-3 mb-5 bg-white rounded">
          <div class="card-body">
            <h4 class="card-title mb-3">News
              <?php if (session()->get('isPlatformManager') && ($userId == session()->get('id'))): ?>
                <!-- Add data-toggle and data-target attributes for Bootstrap Modal -->
                <a href="#" data-toggle="modal" data-target="#feedbackModal"
                  class="btn btn-md btn-clean btn-c-4129"
                  style="float: right;">
                    Aggiungi avviso
                </a>

                <div class="modal fade" id="feedbackModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <!-- Modal Header -->
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Aggiungi avviso</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <!-- Modal Body -->
                      <div class="modal-body">
                        <!-- Place your feedback form or content here -->

                        <form action="<?= base_url('news/store') ?>" method="post" data-form-type="blocs-form" novalidate="">
                          <input type="hidden" name="association_id" id="association_id"
                            value="<?= $association['id'] ?>">
                            <div class="form-group">
                              <textarea
                                placeholder="Inserisci avviso"
                                class='form-control'
                                name="description"
                                id="description"
                                rows="4"
                                cols="50"
                                required></textarea>
                            </div>
                            <button class='btn btn-primary' type="submit">Aggiungi</button>
                        </form>

                      </div>
                    </div>

                  </div>
                </div>
              <?php endif; ?>
            </h4>
            <hr>
            <div class="container mt-4 mb-4">
              <div class="row justify-content-center">
                <?php if ($news) : ?>
                  <?php foreach ($news as $new) : ?>
                    <div class="col-12 mb-3">
                      <div class="d-flex justify-content-between">
                        <ul class='pl-2'>
                          <li><p class="mb-0"><?= $new['description']; ?></p>
                          <p class="mb-0" style='color:gray; font-size:15.5px'><?= formatDateItalian($new['created_at']); ?></p></li>
                        </ul>
                      </div>

                      <div class="row ">

                        <?php if (session()->get('isPlatformManager') && ($userId == session()->get('id'))): ?>
                          <form action="<?= site_url('news/delete/' . $new['id']) ?>" method="post" id="form_<?= $new['id'] ?>">
                            <button class="btn btn-sm btn-danger mx-3" type="button" data-toggle="modal" data-target="#confirmationModal<?= $new['id'] ?>">
                              <i class="fa-solid fa-trash"></i>
                            </button>
                          </form>
                          <div class="modal fade" id="confirmationModal<?= $new['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirmationModalLabel">Conferma Eliminazione</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Chiudi">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Sei sicuro di voler rimuovere l'avviso?
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                                  <button type="button" class="btn btn-danger" onclick="deleteRow(<?= $new['id'] ?>)" id="confirmDelete<?= $new['id'] ?>">
                                      Rimuovi
                                  </button>
                                </div>
                              </div>
                            </div>
                          </div>

                          <form action="<?= site_url('news/edit/' . $new['id']) ?>" method="post" id="form_<?= $new['id'] ?>">
                            <button class="btn btn-sm btn-warning text-white" type="button" data-toggle="modal" data-target="#editModal<?= $new['id'] ?>"><i class="fa-solid fa-pen-to-square"></i></button>
                          </form>
                          <!-- Bootstrap Modal -->
                          <div class="modal fade" id="editModal<?= $new['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirmationModalLabel">Aggiorna le informazioni</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Chiudi">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="<?= base_url(); ?>/new/update" method="post">
                                  <div class="modal-body">
                                      <input type="hidden" name="new_id" id="new_id"
                                        value="<?= $new['id'] ?>">
                                      <input type="hidden" name="association_id" id="association_id"
                                        value="<?= $association['id'] ?>">
                                        <div class="form-group">
                                        <textarea class="form-control" name="description" rows="4" cols="50"><?= $new['description'] ?></textarea>
                                        </div>
                                        <!-- <button csubmitlass='btn btn-primary' type="submit">Aggiungi</button> -->
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                                    <!-- <button type="button" class="btn btn-primary"> -->
                                    <button type="submit" class="btn btn-primary">
                                        Aggiorna
                                    </button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        <?php endif; ?>
                      </div>
                    </div>
                  <?php endforeach; ?>
                <?php else : ?>
                  <p>Nessun avviso inserito.</p>
                <?php endif; ?>
              </div>
            </div>

          </div>
        </div>
      </div>
      <!-- end news  -->
    </div>
  </div>


  <style>
    .card-img {
        width: 100%; /* Adjust the width to fit the card */
        height: 300px; /* Define a fixed height for uniformity */
        object-fit: cover; /* Crop the image to cover the container */
    }
  </style>


  <script>
    function deleteRow(id) {
      // Construct the form ID based on the user ID
      var formId = 'form_' + id;

      // Submit the form with the constructed ID
      document.getElementById(formId).submit();
    }

  </script>
<?= $this->endSection() ?>
