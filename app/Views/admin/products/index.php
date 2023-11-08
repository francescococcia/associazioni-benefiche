<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>
  <?= $this->include('admin/sidebar'); ?>
  <div id="main-content" class="container allContent-section mt-5 py-4">
    <h2>Prodotti</h2>
    <?php if ($products) : ?>
      <table>
        <thead>
          <tr>
              <th>ID</th>
              <th>Titolo</th>
              <th>Descrizione</th>
              <th>Prezzo</th>
              <th>Quantità</th>
              <th>Azioni</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($products as $product) : ?>
            <tr>
              <td><?= $product['id'] ?></td>
              <td><?= $product['name'] ?></td>
              <td><?= $product['description'] ?></td>
              <td>€<?= number_format($product['price'], 2, ',', ' '); ?></td>
              <td><?= $product['quantity'] ?></td>
              <td class='row'>
                <div class="col-3">

                  <form action="<?= site_url('admin/products/delete/' . $product['id']) ?>" method="post" id="form_<?= $product['id'] ?>">
                    <button class="btn btn-sm btn-danger" type="button" data-toggle="modal" data-target="#confirmationModal<?= $product['id'] ?>">
                      <i class="fa-solid fa-trash"></i>
                    </button>
                  </form>

                  <!-- Bootstrap Modal -->
                  <div class="modal fade" id="confirmationModal<?= $product['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
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
                            <button type="button" class="btn btn-danger" onclick="deleteRow(<?= $product['id'] ?>)" id="confirmDelete<?= $product['id'] ?>">
                                Rimuovi
                            </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-3">
                <form action="<?= site_url('admin/products/edit/' . $product['id']) ?>" method="post" id="productForm_<?= $product['id'] ?>">
                    <button class="btn btn-sm btn-warning text-white mx-3" type="button" data-toggle="modal" data-target="#editProductModal_<?= $product['id'] ?>">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                  </form>

                  <!-- Bootstrap Modal for Editing Product Information -->
                  <div class="modal fade" id="editProductModal_<?= $product['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editProductModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="editProductModalLabel">Modifica Prodotto</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Chiudi">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                            <form action="<?= base_url(); ?>/admin/products/update" method="post"
                              data-form-type="blocs-form" novalidate=""
                              enctype="multipart/form-data">
                              <input type="hidden" name="product_id" value="<?= $product['id']; ?>">

                                  <div class="form-group">
                                    <label for="name" ></label>Titolo</label>
                                    <input class="form-control" type="text" name="name" value="<?= $product['name'] ?>" required>
                                  </div>

                                  <div class="form-group">
                                    <label for="description"></label>Descrizione</label>
                                    <input class="form-control" required type="text" name="description" value="<?= $product['description'] ?>">
                                  </div>

                                  <div class="form-group">
                                    <label for="price">Prezzo</label>
                                    <input
                                      class="form-control"
                                      required
                                      type="number"
                                      min='1'
                                      name="price"
                                      value="<?= $product['price'] ?>">
                                  </div>

                                  <div class="form-group">
                                    <label for="quantity">Quantità</label>
                                    <input type="number" class="form-control" required min='1' name="quantity" value="<?= $product['quantity'] ?>">
                                  </div>

                                  <div class="form-group">
                                    <label for="image" class="form-label">Immagine</label>
                                    <div class="input_container">
                                      <label for="choose-file" class="custom-file-upload" id="choose-file-label">Seleziona file</label>
                                      <input type="file"  id="choose-file"  name="image" accept=".jpg, .jpeg, .png, .gif" style="display:none;">
                                    </div>
                                    <?php if ($product['image']): ?>
                                      <img
                                        src="<?= base_url('uploads/products/'.$product['image']) ?>"
                                        alt="<?= $product['name'] ?>"
                                        class="mt-3 ml-5"
                                        style="max-width: 300px;"
                                      >
                                    <?php endif; ?>
                                  </div>

                                  <div class="text-center">
                                    <button class="btn btn-clean float-lg-none btn-c-4129 btn-rd mt-lg-4" type="submit">
                                      Aggiorna
                                    </button>
                                  </div>

                            </form>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php else : ?>
      <p>Nessun producto presente.</p>
    <?php endif; ?>
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