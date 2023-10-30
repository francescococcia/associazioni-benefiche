<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>

  <div class="content mb-5">
    <div class="wrap">
      <div class="page-headline-wrap cc-category-headline">
        <h1>Dettagli</h1>
        <p class="big-paragraph">Informazioni riguardo l'associazione</p>
        <?php if (session()->get('isPlatformManager') && ($userId == session()->get('id'))): ?>
          <div class="row">
            <div class="col">
              <div class="text-center">
                <!-- Add data-toggle and data-target attributes for Bootstrap Modal -->
                <a href="#" data-toggle="modal" data-target="#feedbackModal"
                  class="btn btn-md btn-clean btn-c-4129 btn-rd">
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

                        <form action="<?= base_url('news/store') ?>" method="post">
                          <input type="hidden" name="association_id" id="association_id"
                            value="<?= $association['id'] ?>">
                            <div class="form-group">
                              <textarea
                                placeholder="Inserisci avviso"
                                class='form-control'
                                name="description"
                                id="description"
                                rows="4"
                                cols="50"></textarea>
                            </div>
                            <button class='btn btn-primary' type="submit">Aggiungi</button>
                        </form>

                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>

    <div class="row d-flex align-items-stretch">
      <div class="col-md-3 col-sm-6 offset-lg-3">
        <div class="card">
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
            <p><strong>Codice Fiscale:</strong> <?= $association['tax_code']; ?></p>
            <p><strong>Descrizione:</strong> <?= $association['description']; ?></p>
            <?php if ($association['link']) : ?>
              <p><strong>Link:</strong> <a href='<?= $association['link']; ?>'><?= $association['link']; ?></a></p>
              <?php else : ?>
                <p><strong>Link:</strong> Link non presente</p>
            <?php endif; ?>

            <hr>
            <h4>Avvisi</h4>
            <?php if ($news) : ?>
              <?php foreach ($news as $new) : ?>
                <div class="col-12 mb-3">
                  <div class="d-flex justify-content-between">
                    <ul class='pl-2'>
                      <li><p class="mb-0"><?= $new['description']; ?></p>
                      <p class="mb-0"><?= date('d/m/y', strtotime($new['created_at'])); ?></p></li>
                    </ul>
                  </div>

                  <div class="row ">

                    <?php if (session()->get('isPlatformManager') && ($userId == session()->get('id'))): ?>
                      <form action="<?= site_url('news/delete/' . $new['id']) ?>" method="post" id="form_<?= $new['id'] ?>">
                        <button class="btn btn-sm btn-danger mx-3" type="button" data-toggle="modal" data-target="#confirmationModal<?= $new['id'] ?>"><i class="fa-solid fa-trash"></i></button>
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
                        <button class="btn btn-sm btn-warning" type="button" data-toggle="modal" data-target="#editModal<?= $new['id'] ?>"><i class="fa-solid fa-pen-to-square"></i></button>
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

      <div class="col-md-5 col-sm-6">
        <div class="card">
          <div class="card-body">
            <h4>Eventi</h4>
            <hr>
            <div class="container mt-4 mb-4">
              <div class="row justify-content-center">
                <?php if ($events) : ?>
                  <?php foreach ($events as $event) : ?>
                    <div class="col-md-12 mb-3">
                      <h5><strong><?php echo $event['title']; ?></strong></h5>
                      <div class="d-flex justify-content-between">
                        <p class="mb-0">Luogo: <?php echo $event['location']; ?></p>
                        <p class="mb-0">Data: <?php echo date('d/m/y', strtotime($event['date'])); ?></p>
                        <a href="<?= site_url('events/detail/' . $event['id']) ?>" class="card-link">Dettagli</a>
                      </div>
                    </div>
                  <?php endforeach; ?>
                <?php else : ?>
                  <p>Nessun evento inserito.</p>
                <?php endif; ?>
              </div>
            </div>

            <h4>Prodotti</h4>
            <hr>
            <div class="container mt-4 mb-4">
              <div class="row justify-content-center">
                <?php if ($products) : ?>
                  <?php foreach ($products as $product) : ?>
                    <div class="col-12 mb-3">
                      <h5><strong><?php echo $product['name']; ?></strong></h5>
                      <div class="d-flex justify-content-between">
                        <p class="mb-0">Descrizione: <?php echo $product['description']; ?></p>
                        <p class="mb-0">Prezzo: <?php echo $product['price']; ?></p>
                        <a href="<?= site_url('product/detail/'.$product['id']) ?>" class="card-link">Dettagli</a>
                      </div>
                    </div>
                  <?php endforeach; ?>
                <?php else : ?>
                  <p>Nessun prodotto inserito.</p>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    function deleteRow(id) {
      // Construct the form ID based on the user ID
      var formId = 'form_' + id;

      // Submit the form with the constructed ID
      document.getElementById(formId).submit();
    }

  </script>
<?= $this->endSection() ?>
