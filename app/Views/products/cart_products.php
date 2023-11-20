<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>

<link rel="stylesheet" type="text/css" href="<#?= base_url('public/css/admin.css') ?>"/>
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
                    <th></th>
                    <th>Prodotto</th>
                    <th>Prezzo</th>
                    <th>Quantità</th>
                    <th>Totale</th>
                </tr>
              </thead>
              <tbody>
                  <?php foreach ($products as $productId => $product) : ?>
                  <tr>
                    <td>
                      <form action="<?= site_url('order/delete/' . $product['id']) ?>" method="post" id="form_<?= $product['id'] ?>">
                        <button class="btn btn-sm btn-danger mt-3" type="button" data-toggle="modal" data-target="#deleteParticipant<?= $product['id'] ?>">
                          <i class="fa-solid fa-trash"></i>
                        </button>
                      </form>

                      <!-- Bootstrap Modal -->
                      <div class="modal fade" id="deleteParticipant<?= $product['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="deleteParticipantLabel" aria-hidden="true">
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
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                              <button type="button" class="btn btn-danger" onclick="deleteParticipant(<?= $product['id'] ?>)" id="deleteParticipant<?= $product['id'] ?>">
                                  Rimuovi
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
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
    function deleteParticipant(id) {
      // Construct the form ID based on the user ID
      var formId = 'form_' + id;

      // Submit the form with the constructed ID
      document.getElementById(formId).submit();
    }
  </script>

<?= $this->endSection() ?>
