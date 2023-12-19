<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>

  <div class="content mb-5">
    <div class="wrap">
      <div class="page-headline-wrap cc-category-headline">
        <h1 class="section-heading primary-text">Prodotti prenotati</h1>
        <p class="big-paragraph">Visualizza i prodotti prenotati</p>
      </div>
    </div>

    <div id="main-content" class="container allContent-section mt-5 py-4">
      <div>
        <?php if (!empty($products)): ?>
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th></th>
                <th>Prodotto</th>
                <th>Prezzo</th>
                <th>Quantità</th>
                <th>Totale</th>
                <th style="width: 3vw;">Azioni</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($products as $productId => $product) : ?>
                  <tr>
                    <td>
                      <?php if ($product['image']) : ?>
                        <img
                          src="<?= base_url('uploads/products/'.$product['image']); ?>"
                          data-src="<?= base_url('uploads/products/'.$product['image']); ?>"
                          alt="<?= $product['image']; ?>"
                          width='100'
                          height='100'
                        >
                      <?php else : ?>
                        <img
                        src="<?= base_url('public/img/yehorlisnyi210400016.jpg'); ?>"
                        data-src="<?= base_url('public/img/yehorlisnyi210400016.jpg'); ?>"
                        alt="Immagine non caricata"
                        width='100'
                        height='100'
                        >
                      <?php endif; ?>
                    </td>
                    <td><?= $product['description'] ?></td>
                    <td>€<?= number_format($product['price'], 2, ',', ' '); ?></td>
                    <td><?= $product['bookedCount']; ?></td>
                    <td>€<?= number_format($product['price'] * $product['bookedCount'], 2, ',', ' '); ?></td>
                    <td>
                      <form action="<?= site_url('order/delete/' . $product['id']) ?>" method="post" id="form_<?= $productId ?>">
                          <input type="hidden" name="association_id" value="<?= $product['association_id'] ?>">
                          <input type="hidden" name="quantity" id="quantity_<?= $productId ?>" value="<?= $product['quantity'] ?>">
                          <button class="btn btn-sm btn-danger" type="button" data-toggle="modal" data-target="#deleteParticipant<?= $productId ?>">
                              <i class="fa-solid fa-trash"></i>
                          </button>
                      </form>

                      <!-- Bootstrap Modal -->
                      <div class="modal fade" id="deleteParticipant<?= $productId ?>" tabindex="-1" role="dialog" aria-labelledby="deleteParticipantLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="deleteParticipantLabel">Conferma Eliminazione</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Chiudi">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body">
                                      Seleziona la quantità che vuoi rimuovere
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <div class="col-4 ml-3">

                                        <div class="quantity mainMenu">
                                            <button class="minus mt-2" type="button" onclick="decrementQuantity(<?= $productId ?>)">-</button>
                                            <span class='centerQuantity mt-2' id="quantityDisplay_<?= $productId ?>">1</span>
                                            <button class="plus mt-2" type="button" onclick="incrementQuantity(<?= $productId ?>, <?= $product['bookedCount'] ?>)">+</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                                      <button type="button" class="btn btn-danger" onclick="deleteParticipant(<?= $productId ?>)">Rimuovi</button>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </td>
              </tr>
          <?php endforeach; ?>
            </tbody>
          </table>
        <?php else: ?>
          <div class="row justify-content-center">
          <p>Nessuna transazione presente</p>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
  
  <script>
      function updateQuantityDisplay(productId, value) {
          document.getElementById('quantityDisplay_' + productId).innerText = value;
      }

      function incrementQuantity(productId, max) {
          const maxQuantity = max;
          const displayElement = document.getElementById('quantityDisplay_' + productId);
          let quantity = parseInt(displayElement.innerText, 10) || 0;

          if (quantity < maxQuantity) {
              quantity++;
              updateQuantityDisplay(productId, quantity);
          }
      }

      function decrementQuantity(productId) {
          const displayElement = document.getElementById('quantityDisplay_' + productId);
          let quantity = parseInt(displayElement.innerText, 10) || 0;

          if (quantity > 1) {
              quantity--;
              updateQuantityDisplay(productId, quantity);
          }
      }

      function deleteParticipant(productId) {
          const form = document.getElementById('form_' + productId);
          const input = document.createElement('input');
          input.type = 'hidden';
          input.name = 'quantity';
          input.value = document.getElementById('quantityDisplay_' + productId).innerText;
          form.appendChild(input);
          form.submit();
      }
    </script>
    
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

<?= $this->endSection() ?>
