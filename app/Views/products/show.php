<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>
  <div class="content mb-5">
    <div class="wrap">
      <div class="page-headline-wrap cc-category-headline">
        <h1 class="section-heading primary-text">Dettagli Prodotto</h1>
        <p class="big-paragraph">Informazioni sul prodotto</p>
        <!-- <#?php if ($quantityAvailable &&
          !session()->get('isPlatformManager') &&
          !session()->get('isAdmin')): ?>
          <div class="row">
            <div class="col">
              <div class="text-center">
                <form method="post" action="<#?php echo base_url(); ?>/ProductsController/buy" data-form-type="blocs-form" novalidate="">
                  <input type="hidden" name="product_id" value="<#?= $product['id']; ?>">
                  <div class="row">
                    <div class="col-12 d-flex justify-content-center align-items-center">
                      <div class="form-group">
                        <label for="quantity-<#?php echo $product['id']; ?>">Quantità:</label>
                        <input class='form-control' type="number" name="quantity" min="1" max="<#?= $quantityAvailable ?>" required
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
          </div> -->
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
        <!-- <#?php endif; ?> -->
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
                  style='width:100% !important; height:100% !important'
                  >
              </picture>
            <?php else : ?>
                <img
                  src="<?= base_url('public/img/yehorlisnyi210400016.jpg'); ?>"
                  data-src="<?= base_url('public/img/yehorlisnyi210400016.jpg'); ?>"
                  class="center"
                  alt="Immagine non caricata"
                  style='width:100% !important; height:100% !important'
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
              <div class="panel-body" style='font-size:20px'>
                <p><strong>€<?=  number_format($product['price'], 2, ',', ' '); ?></strong></p>
                <p style='font-size:18px'><?= $product['description']; ?></p>
              </div>
            </div>

            <?php if ($quantityAvailable): ?>
              <p><?= $quantityAvailable; ?> disponibili</p>
              <?php if (!session()->get('isPlatformManager') && !session()->get('isAdmin')): ?>
                <div class="row">
                  <div class="col">
                    <form id="productForm" method="post" action="<?php echo base_url(); ?>/ProductsController/buy" data-form-type="blocs-form" novalidate="">
                      <input type="hidden" name="product_id" value="<?= $product['id']; ?>">
                      <input type="hidden" name="association_id" value="<?= $product['association_id']; ?>">
                      <div class="row">
                        <div class="col-2 d-flex">
                          <div class="form-group">
                              <div class="quantity mainMenu">
                                  <button class="minus mt-2" type="button" onclick="decrementQuantity()">-</button>
                                  <span class='centerQuantity mt-2' id="quantityDisplay">1</span>
                                  <button class="plus mt-2" type="button" onclick="incrementQuantity()">+</button>
                              </div>
                          </div>
                        </div>
                        <div class="col">
                            <button class="btn btn-sm btn-clean btn-c-4129 primary-btn" type="button" onclick="submitForm()">
                                Prenota prodotto
                            </button>
                        </div>
                      </div>
                    </form>

                  </div>
                </div>
              <?php endif; ?>
            <?php else: ?>
                <p class='out-of-stock'><strong>Esaurito</strong></p>
            <?php endif; ?>


            <?php if (session()->get('isPlatformManager') && $association['id'] == session()->get('id')): ?>
              <div class="row">
                <div class="col-2">
                  <form action="<?= site_url('product/delete/' . $product['id']) ?>" method="post" id="form_<?= $product['id'] ?>">
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
                          <button
                            type="button"
                            class="btn btn-danger"
                            id="confirmDelete<?= $product['id'] ?>"
                            onclick="deleteRow(<?= $product['id'] ?>)"
                          >
                            Rimuovi
                            </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-2 ml-0 pl-0">
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
  <style>
    .quantity {
    display: flex;
    align-items: center;
    width: 150px; /* Adjust width as needed */
    }

    .form-control {
        width: 100%; /* Take up remaining space */
        text-align: center;
    }

    .minus,
    .plus {
        width: 30px;
        height: 30px;
        background-color: #ccc;
        border: none;
        color: #fff;
        cursor: pointer;
    }

    .minus:hover,
    .plus:hover {
        background-color: #999;
    }

    /* Adjust the button alignment */
    .minus {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
    }

    .plus {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }
    #quantityInput {
        display: none;
    }
    .mainMenu {
      list-style-type: none;
      text-align: center;
      position: relative;
      vertical-align: middle;
    }
    .centerQuantity {
      list-style-type: none;
      display: inline-block;
      width: 30px;
      height: 30px;
      border: 2px solid;
    }
    .out-of-stock{
      display: inline-block;
      font-weight: 700;
      color: #393939;
      padding-bottom: 1px;
      border-bottom: 2px solid;
      margin: 30px 0;
      color:#a30c02
    }
  </style>
  <script>
let quantity = 1; // Initial quantity

function incrementQuantity() {
    const maxQuantity = <?= $quantityAvailable ?>; // Fetch the maximum available quantity
    if (quantity < maxQuantity) {
        quantity++;
        document.getElementById('quantityDisplay').innerText = quantity;
    }
}

function decrementQuantity() {
    if (quantity > 1) {
        quantity--;
        document.getElementById('quantityDisplay').innerText = quantity;
    }
}

function submitForm() {
    const form = document.getElementById('productForm');
    const input = document.createElement('input');
    input.type = 'hidden';
    input.name = 'quantity';
    input.value = quantity;
    form.appendChild(input);
    form.submit();
}

  function deleteRow(id) {
      // Construct the form ID based on the user ID
      var formId = 'form_' + id;

      // Submit the form with the constructed ID
      document.getElementById(formId).submit();
    }
  </script>
<?= $this->endSection() ?>
