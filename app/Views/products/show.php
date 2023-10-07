<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>
  <div class="content mb-5">
    <div class="wrap">
      <div class="page-headline-wrap cc-category-headline">
        <h1>Dettagli Prodotto</h1>
        <p class="big-paragraph">Informazioni riguardo il prodotto</p>
        <?php if ($isQuantityAvailable && !session()->get('isPlatformManager')): ?>
          <div class="row">
            <div class="col">
              <div class="text-center">
                <form method="post" action="<?php echo base_url(); ?>/ProductsController/buy">
                  <input type="hidden" name="product_id" value="<?= $product['id']; ?>">
                  <div class="row">
                    <div class="col-12 d-flex justify-content-center align-items-center">
                      <div class="col-12 col-md-8 col-lg-3">
                        <label for="quantity-<?php echo $product['id']; ?>">Quantità:</label>
                        <input class='form-control' type="number" name="quantity" min="1" max="<?= $isQuantityAvailable ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="text-center">
                    <button class="btn btn-md btn-clean btn-c-4129 btn-rd mt-3" type="submit">Aggiungi al Carrello</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        <?php elseif(session()->get('isPlatformManager')): ?>
        <div class="row">
            <div class="col">
              <div class="text-center">
                <!-- Add data-toggle and data-target attributes for Bootstrap Modal -->
                <a href="<?= site_url('product/edit/'.$product['id']) ?>"
                  class="btn btn-md btn-clean btn-c-4129 btn-rd">
                    Modifica
                </a>
              </div>
            </div>
          </div>
        <?php endif; ?>
      </div>

      <div class="row">
        <div class="col-12 m-5">
          <div class="card">
            <div class="card-body">
              <h3 class="mb-3"><strong><?= $product['name']; ?></strong></h3>
              <p><strong>Descrizione:</strong> <?= $product['description']; ?></p>
              <p><strong>Prezzo:</strong> <?= $product['price']; ?></p>
              <p><strong>Quantità:</strong> <?= $product['quantity']; ?></p>
              <p><strong>Quantità disponibile:</strong> <?= $isQuantityAvailable; ?></p>
              <?php if (session()->get('isPlatformManager')): ?>
                <form action="<?= site_url('product/delete/' . $product['id']) ?>" method="post" onsubmit="return false;">
                    <button class='btn btn-danger' type="button" data-toggle="modal" data-target="#confirmationModal">Rimuovi</button>
                </form>

                <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="confirmationModalLabel">Conferma Eliminazione</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Chiudi">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        Sei sicuro di voler rimuovere l'elemento?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                        <button type="button" class="btn btn-danger" id="confirmDelete">Rimuovi</button>
                      </div>
                    </div>
                  </div>
                </div>
                <?php endif; ?>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
<?= $this->endSection() ?>
