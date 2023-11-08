<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>

  <?= $this->include('admin/sidebar'); ?>
  <div id="main-content" class="container allContent-section mt-5 py-4">
      <h2>Associazioni</h2>
      <table>
        <thead>
          <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>Email</th>
              <th>Indirizzo</th>
              <th>Codice Fiscale</th>
              <th>Link</th>
              <th>Descrizione</th>
              <th>Azioni</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($associations as $association): ?>
            <tr>
              <td><?= $association['id'] ?></td>
              <td><?= $association['name'] ?></td>
              <td><?= $association['email'] ?></td>
              <td><?= $association['legal_address'] ?></td>
              <td><?= $association['tax_code'] ?></td>
              <td><?= $association['link'] ?></td>
              <td><?= $association['description'] ?></td>
              <td class='row'>
                <div class="col-3">
                  <form action="<?= site_url('admin/associations/delete/' . $association['id']) ?>" method="post" id="form_<?= $association['id'] ?>">
                    <button class="btn btn-sm btn-danger ml-0" type="button" data-toggle="modal" data-target="#confirmationModal<?= $association['id'] ?>">
                      <i class="fa-solid fa-trash"></i>
                    </button>
                  </form>

                  <!-- Bootstrap Modal -->
                  <div class="modal fade" id="confirmationModal<?= $association['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmationModalLabel">Conferma Eliminazione</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Chiudi">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Sei sicuro di voler rimuovere l'associazione?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                          <button type="button" class="btn btn-danger" onclick="deleteRow(<?= $association['id'] ?>)" id="confirmDelete<?= $association['id'] ?>">
                              Rimuovi
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-3">
                  <!-- Your button to trigger the modal -->
                  <form action="<?= site_url('admin/associations/edit/' . $association['user_id']) ?>" method="post" id="associationForm_<?= $association['id'] ?>">
                    <button class="btn btn-sm btn-warning text-white mx-3" type="button" data-toggle="modal" data-target="#editAssociationModal_<?= $association['id'] ?>">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                  </form>

                  <!-- Bootstrap Modal for Editing Association Information -->
                  <div class="modal fade" id="editAssociationModal_<?= $association['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editAssociationModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="editAssociationModalLabel">Modifica Associazione</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Chiudi">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                          <form method="post" action="<?= base_url(); ?>/admin/associations/update"
                              data-form-type="blocs-form" novalidate="" enctype="multipart/form-data">
                              <input type="hidden" name="user_id" value="<?= $association['user_id'] ?>">
                              <input type="hidden" name="association_id" value="<?= $association['id'] ?>">

                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="name" class="form-label">Nome Associazione</label>
                                        <input type="text" class="form-control" required name="name" id="name" value="<?= $association['name'] ?>">
                                      </div>

                                      <div class="form-group">
                                        <label for="legal_address" class="form-label">Sede Legale</label>
                                        <input type="text" class="form-control" required name="legal_address" id="legal_address" value="<?= $association['legal_address'] ?>">
                                      </div>

                                      <div class="form-group">
                                        <label for="password">Passworrd</label>
                                        <input
                                          class="form-control mb-lg-3 pt-lg-0"
                                          type="password"
                                          name="password"
                                          minlength="4"
                                          data-validation-minlength-message="La password deve essere almeno di '4' caratteri">
                                      </div>
                                    </div>

                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="inputEmail4">Email</label>
                                        <input type="email" id="email" name="email" placeholder="Inserisci email" value="<?= $association['email']; ?>"
                                          data-error-validation-msg="Email non valida" class="form-control mb-lg-3 pt-lg-0" required>
                                      </div>

                                      <div class="form-group">
                                        <label for="tax_code" class="form-label">Codice Fiscale</label>
                                        <input type="text" class="form-control" required name="tax_code" id="tax_code" value="<?= $association['tax_code'] ?>">
                                      </div>

                                      <div class="form-group">
                                        <label for="phone_number">Conferma password</label>
                                        <input
                                          class="form-control mb-lg-3 pt-lg-0"
                                          type="password"
                                          name="confirm_password"
                                          data-validation-passwordagain-message='Password non corrisponde'>
                                      </div>

                                    </div><!-- end col -->
                                  </div><!-- end row -->

                                  <div class="form-group">
                                    <label for="link" class="form-label">Link</label>
                                    <input type="text" class="form-control" required name="link" id="link" value="<?= $association['link'] ?>">
                                  </div>

                                  <div class="form-group">
                                    <label for="description" class="form-label">Descrizione</label>
                                    <textarea class="form-control" name="description" id="description" rows="3"><?= $association['description'] ?></textarea>
                                  </div>

                                  <div class="form-group">
                                    <label for="image" class="form-label">Immagine</label>
                                    <div class="input_container">
                                      <label for="choose-file" class="custom-file-upload" id="choose-file-label">Seleziona file</label>
                                      <input type="file"  id="choose-file"  name="image" accept=".jpg, .jpeg, .png, .gif" style="display:none;">
                                    </div>
                                    <?php if ($association['image']): ?>
                                      <img
                                        src="<?= base_url('uploads/'.$association['image']) ?>"
                                        alt="<?= $association['name'] ?>"
                                        class="mt-3 center"
                                        style="max-width: 350px;">
                                      <?php endif; ?>
                                  </div>

                                  <div class="text-center">
                                    <button class="btn btn-clean float-lg-none btn-c-4129 btn-rd" type="submit">
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
