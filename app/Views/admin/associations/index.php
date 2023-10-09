<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>
  <link rel="stylesheet" type="text/css" href="<?= base_url('public/css/admin.css') ?>"/>

  <div id="main-content" class="container allContent-section mt-5 py-4">
    <div>
      <h2>Associazioni</h2>
      <table>
        <thead>
          <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>Email</th>
              <th>Indirizzo</th>
              <th>Codice Fiscale</th>
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
              <td><?= $association['description'] ?></td>
              <td>

                <form action="<?= site_url('admin/associations/delete/' . $association['id']) ?>" method="post" id="form_<?= $association['id'] ?>">
                  <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#confirmationModal<?= $association['id'] ?>">Rimuovi</button>
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
                          Sei sicuro di voler rimuovere l'elemento?
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
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
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
