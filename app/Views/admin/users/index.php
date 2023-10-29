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

                  <form action="<?= site_url('admin/user/update/' . $user['id']) ?>" method="post" id="form_<?= $user['id'] ?>">
                    <button class="btn btn-sm btn-info" type="button" data-toggle="modal" data-target="#confirmationModal<?= $user['id'] ?>">Modifica</button>
                  </form>

                </div>
                <div class="col-4">
                  <form action="<?= site_url('admin/users/delete/' . $user['id']) ?>" method="post" id="userForm_<?= $user['id'] ?>">
                    <button class="btn btn-sm btn-danger" type="button" id="openModalButton">Rimuovi</button>
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