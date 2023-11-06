<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>
  <link rel="stylesheet" type="text/css" href="<?= base_url('public/css/admin.css') ?>"/>
  <div id="main-content" class="container allContent-section mt-5 py-4">  
    <h2>Utenti</h2>
    <?php if ($users) : ?>
      <table>
        <thead>
          <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Cognome</th>
              <th>Numero Telefonico</th>
              <th>Data di Nascita</th>
              <th>Email</th>
              <th>Azioni</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($users as $user): ?>
            <tr>
              <td><?= $user['id'] ?></td>
              <td><?= $user['first_name'] ?></td>
              <td><?= $user['last_name'] ?></td>
              <td><?= $user['phone_number'] ?></td>
              <td><?= $user['birth_date'] ?></td>
              <td><?= $user['email'] ?></td>
              <td class='row'>
                <div class="col-4">
                  <form action="<?= site_url('admin/users/delete/' . $user['id']) ?>" method="post" id="userForm_<?= $user['id'] ?>">
                    <button class="btn btn-sm btn-danger" type="button" id="openModalButton">
                      <i class="fa-solid fa-trash"></i>
                    </button>
                  </form>

                  <!-- Bootstrap Modal -->
                  <div class="modal fade" id="confirmationModal<?= $user['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmationModalLabel">Conferma Eliminazione</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Chiudi">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Sei sicuro di voler rimuovere l'utente?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                            <button type="button" class="btn btn-danger" onclick="deleteUser(<?= $user['id'] ?>)" id="confirmDelete<?= $user['id'] ?>">
                                Rimuovi
                            </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-4">

                  <!-- Your button to trigger the modal -->
                  <form action="<?= site_url('admin/user/edit/' . $user['id']) ?>" method="post" id="userForm_<?= $user['id'] ?>">
                      <button class="btn btn-sm btn-warning text-white" type="button" data-toggle="modal" data-target="#editUserModal_<?= $user['id'] ?>">
                          <i class="fa-solid fa-pen-to-square"></i>
                      </button>
                  </form>

                  <!-- Bootstrap Modal for Editing User Information -->
                  <div class="modal fade" id="editUserModal_<?= $user['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="editUserModalLabel">Modifica Utente</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Chiudi">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                              <form method="POST" action="<?= base_url(); ?>/admin/users/update" data-form-type="blocs-form" novalidate="">
                                  <input type="hidden" name="user_id" value="<?= $user['id'] ?>">

                                  <div class="form-group">
                                      <label for="email">Email</label>
                                      <input type="email" id="email" name="email" placeholder="Inserisci email" value="<?= $user['email'] ?>" class="form-control" required>
                                  </div>

                                  <div class="form-group">
                                      <label for="first_name">Nome</label>
                                      <input type="text" id="first_name" name="first_name" placeholder="Inserisci nome" value="<?= $user['first_name'] ?>" class="form-control" required>
                                  </div>

                                  <div class="form-group">
                                      <label for="last_name">Cognome</label>
                                      <input type="text" id="last_name" name="last_name" placeholder="Inserisci cognome" value="<?= $user['last_name'] ?>" class="form-control" required>
                                  </div>

                                  <!-- Add other fields for user information -->

                                  <div class="form-group">
                                      <label for="password">Nuova Password (opzionale)</label>
                                      <input type="password" id="password" name="password" class="form-control">
                                  </div>

                                  <div class="form-group">
                                      <label for="confirm_password">Conferma Password (opzionale)</label>
                                      <input type="password" id="confirm_password" name="confirm_password" class="form-control">
                                  </div>

                                  <div class="text-center">
                                      <button type="submit" class="btn btn-clean float-lg-none btn-c-4129 btn-rd mt-lg-4">Aggiorna</button>
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
      <p>Nessun utente presente.</p>
    <?php endif; ?>
  </div>

  <script>
    function deleteUser(userId) {
      // Construct the form ID based on the user ID
      var formId = 'userForm_' + userId;

      // Submit the form with the constructed ID
      document.getElementById(formId).submit();
    }

    $(document).on('click', '#openModalButton', function () {
      // Open the Bootstrap modal
      $('#confirmationModal<?= $user['id'] ?>').modal('show');
    });

  </script>
<?= $this->endSection() ?>