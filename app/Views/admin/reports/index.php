<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>
  <link rel="stylesheet" type="text/css" href="<?= base_url('public/css/admin.css') ?>"/>
  <div id="main-content" class="container allContent-section mt-5 py-4">
    <div>
      <h2>Segnalazioni</h2>
      <table>
      <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Messaggio</th>
            <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($reports as $report) : ?>
          <tr>
              <td><?= $report['id'] ?></td>
              <td><?= $report['name'] ?></td>
              <td><?= $report['email'] ?></td>
              <td><?= $report['message'] ?></td>
              <td>

                <form action="<?= site_url('admin/report/delete/' . $report['id']) ?>" method="post" id="form_<?= $report['id'] ?>">
                    <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#confirmationModal<?= $report['id'] ?>">Rimuovi</button>
                  </form>

                  <!-- Bootstrap Modal -->
                  <div class="modal fade" id="confirmationModal<?= $report['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
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
                            <button type="button" class="btn btn-danger" onclick="deleteRow(<?= $report['id'] ?>)" id="confirmDelete<?= $report['id'] ?>">
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
