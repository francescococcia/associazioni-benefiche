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
                                        Sei sicuro di voler rimuovere la prenotazione?
                                    </div>
                                    <div class="form-group">
                                        <div class="quantity mainMenu">
                                            <button class="minus mt-2" type="button" onclick="decrementQuantity(<?= $productId ?>)">-</button>
                                            <span class='centerQuantity mt-2' id="quantityDisplay_<?= $productId ?>">1</span>
                                            <button class="plus mt-2" type="button" onclick="incrementQuantity(<?= $productId ?>)">+</button>
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
                <script>
                    let quantity_<?= $productId ?> = 1; // Initial quantity for each product

                    function incrementQuantity(productId) {
                        const maxQuantity = <?= $product['bookedCount'] ?>; // Fetch the maximum available quantity
                        if (quantity_<?= $productId ?> < maxQuantity) {
                            quantity_<?= $productId ?>++;
                            document.getElementById('quantityDisplay_<?= $productId ?>').innerText = quantity_<?= $productId ?>;
                        }
                    }

                    function decrementQuantity(productId) {
                        if (quantity_<?= $productId ?> > 1) {
                            quantity_<?= $productId ?>--;
                            document.getElementById('quantityDisplay_<?= $productId ?>').innerText = quantity_<?= $productId ?>;
                        }
                    }

                    function deleteParticipant(productId) {
                        const form = document.getElementById('form_' + productId);
                        const input = document.createElement('input');
                        input.type = 'hidden';
                        input.name = 'quantity';
                        input.value = quantity_<?= $productId ?>;
                        form.appendChild(input);
                        form.submit();
                    }
                </script>
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

<?= $this->endSection() ?>
