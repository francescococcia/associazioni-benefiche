<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>
  <div class="content mb-5">
    <div class="wrap">
      <div class="page-headline-wrap cc-category-headline">
        <h1>Dettagli Prodotto</h1>
        <p class="big-paragraph">Informazioni riguardo il prodotto</p>
        <?php if ($isQuantityAvailable &&
          !session()->get('isPlatformManager') &&
          !session()->get('isAdmin')): ?>
          <div class="row">
            <div class="col">
              <div class="text-center">
                <form method="post" action="<?php echo base_url(); ?>/ProductsController/buy" data-form-type="blocs-form" novalidate="">
                  <input type="hidden" name="product_id" value="<?= $product['id']; ?>">
                  <div class="row">
                    <div class="col-12 d-flex justify-content-center align-items-center">
                      <div class="form-group">
                        <label for="quantity-<?php echo $product['id']; ?>">Quantità:</label>
                        <input class='form-control' type="number" name="quantity" min="1" max="<?= $isQuantityAvailable ?>" required
                          data-validation-min-message='Seleziona almeno una quantità'>
                      </div>
                    </div>
                  </div>
                  <button class="btn btn-md btn-clean btn-c-4129 btn-rd" type="submit">
                    Prenota prodotto
                  </button>
                </form>
              </div>
            </div>
          </div>
        <!-- <#?php elseif(session()->get('isPlatformManager')): ?>
          <div class="row">
            <div class="col">
              <div class="text-center">
                <a href="<#?= site_url('product/edit/'.$product['id']) ?>"
                  class="btn btn-md btn-clean btn-c-4129 btn-rd">
                    Modifica
                </a>
              </div>
            </div>
          </div> -->
        <?php endif; ?>
      </div>
    </div>

    <div class="row d-flex align-items-stretch">
      <div class="col-md-3 col-sm-6 offset-lg-3">
        <div class="card" style='border:none'>
          <div class="card-body">

            <?php if ($product['image']): ?>
              <picture>
                <img src="<?php echo base_url('uploads/products/'.$product['image']); ?>"
                  data-src="<?php echo base_url('uploads/products/'.$product['image']); ?>"
                  class="center"
                  alt="<?php echo $product['image']; ?>"
                  style='width:100% !important; height:100% !important'>
              </picture>
            <?php else : ?>
                <img
                  src="<?= base_url('public/img/yehorlisnyi210400016.jpg'); ?>"
                  data-src="<?= base_url('public/img/yehorlisnyi210400016.jpg'); ?>"
                  class=""
                  alt="Immagine non caricata"
                >
            <?php endif; ?>

          </div>
        </div>
      </div>

      <div class="col-md-5 col-sm-6">
        <div class="card" style='border:none'>
          <div class="card-body">
            <div class="mb-4">
              <h3><strong><?= $product['name']; ?></strong></h3>
              <p><strong>€<?= $product['price']; ?></strong></p>
            </div>
            <p><?= $isQuantityAvailable; ?> disponibili</p>
            <?php if ($productsBookedCount): ?>
              <p><?= $productsBookedCount; ?> prenotati</p>
            <?php endif; ?>
            
            <p>Descrizione</p>
            <div class="panel panel-default" style='heigth:30%;color: #333; background-color: #f5f5f5;border-color: #ddd;'>
              <div class="panel-body"><?= $product['description']; ?></div>
            </div>
            <?php if (session()->get('isPlatformManager')): ?>
              <div class="row">
                <div class="col-3">
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
                          Sei sicuro di voler rimuovere il prodotto?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                          <button type="button" class="btn btn-danger" id="confirmDelete">Rimuovi</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-3">
                  <!-- Add data-toggle and data-target attributes for Bootstrap Modal -->
                  <a href="<?= site_url('product/edit/'.$product['id']) ?>"
                    class="btn btn-warning text-white">
                    Modifica
                  </a>
                </div>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
<?= $this->endSection() ?>
