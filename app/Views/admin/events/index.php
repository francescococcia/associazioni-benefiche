<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>
  <link rel="stylesheet" type="text/css" href="<?= base_url('public/css/admin.css') ?>"/>
  <div id="main-content" class="container allContent-section mt-5 py-4">
    <h2>Eventi</h2>
    <?php if ($events) : ?>
      <table>
        <thead>
          <tr>
              <th>ID</th>
              <th>Titolo</th>
              <th>Descrizione</th>
              <th>Luogo</th>
              <th>Categoria</th>
              <th>Azione</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($events as $event) : ?>
            <tr>
              <td><?= $event['id'] ?></td>
              <td><?= $event['title'] ?></td>
              <td><?= $event['description'] ?></td>
              <td><?= $event['location'] ?></td>
              <td><?= $event['category'] ?></td>
              <td>

                <form action="<?= site_url('admin/events/delete/' . $event['id']) ?>" method="post" id="form_<?= $event['id'] ?>">
                  <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#confirmationModal<?= $event['id'] ?>">Rimuovi</button>
                </form>

                <!-- Bootstrap Modal -->
                <div class="modal fade" id="confirmationModal<?= $event['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="confirmationModalLabel">Conferma Eliminazione</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Chiudi">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          Sei sicuro di voler rimuovere l'evento?
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                          <button type="button" class="btn btn-danger" onclick="deleteRow(<?= $event['id'] ?>)" id="confirmDelete<?= $event['id'] ?>">
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
    <?php else : ?>
      <p>Nessun evento presente.</p>
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