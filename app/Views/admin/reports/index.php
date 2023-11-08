<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>
  <?= $this->include('admin/sidebar'); ?>
  <div id="main-content" class="container allContent-section mt-5 py-4">
    <h2>Segnalazioni</h2>
    <?php if ($reports) : ?>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>Email</th>
          <th>Messaggio</th>
          <th>Data</th>
          <th>Azioni</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($reports as $report) : ?>
          <tr>
            <td><?= $report['id'] ?></td>
            <td><?= $report['name'] ?></td>
            <td><?= $report['email'] ?></td>
            <td><?= $report['message'] ?></td>
            <td><?php echo date('d/m/y', strtotime($report['created_at'])); ?></td>
            <td class="row">
              <div class="col-3">

                <form action="<?= site_url('admin/report/delete/' . $report['id']) ?>" method="post" id="form_<?= $report['id'] ?>">
                  <button class="btn btn-sm btn-danger mx-3" type="button" data-toggle="modal" data-target="#confirmationModal<?= $report['id'] ?>">
                    <i class="fa-solid fa-trash"></i>
                  </button>
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
                          Sei sicuro di voler rimuovere la segnalazione?
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
              </div>

              <?php if (!$report['is_read']) : ?>
                <div class="col-3">
                  <form action="<?= site_url('admin/report/readReport/' . $report['id']) ?>" method="post"
                    id="form_report<?= $report['id'] ?>">
                    <button class="btn btn-sm btn-primary mx-3" type="button" data-toggle="modal" data-target="#readModal<?= $report['id'] ?>">
                      <i class="fa-solid fa-eye"></i>
                    </button>
                  </form>

                  <!-- Bootstrap Modal -->
                  <div class="modal fade" id="readModal<?= $report['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="readModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="readModalLabel">Contrassegna come letto</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Chiudi">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Cliccando su contrassegna, invierai una mail all'utente per informarlo della presa visione della segnalazione
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                            <button type="button" class="btn btn-primary" onclick="readReport(<?= $report['id'] ?>)" id="confirmRead<?= $report['id'] ?>">
                                Contassegna
                            </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endif; ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <?php else : ?>
      <p>Nessuna segnalazione presente.</p>
    <?php endif; ?>
  </div>
  <script>
    function deleteRow(id) {
      // Construct the form ID based on the user ID
      var formId = 'form_' + id;

      // Submit the form with the constructed ID
      document.getElementById(formId).submit();
    }

    function readReport(id) {
      // Construct the form ID based on the user ID
      var formId = 'form_report' + id;

      // Submit the form with the constructed ID
      document.getElementById(formId).submit();
    }

  </script>
<?= $this->endSection() ?>
