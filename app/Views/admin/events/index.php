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
              <td><?= $event['location'] ?></td>
              <td class='titleTd'><?= $event['category'] ?></td>
              <td class='row'>
                <div class="col-3">

                  <form action="<?= site_url('admin/events/delete/' . $event['id']) ?>" method="post" id="form_<?= $event['id'] ?>">
                    <button class="btn btn-sm btn-danger" type="button" data-toggle="modal" data-target="#confirmationModal<?= $event['id'] ?>">
                      <i class="fa-solid fa-trash"></i>
                    </button>
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
                </div>

                <div class="col-3">
                  <!-- Your button to trigger the modal -->
                  <form action="<?= site_url('admin/events/edit/' . $event['id']) ?>" method="post" id="eventForm_<?= $event['id'] ?>">
                    <button class="btn btn-sm btn-warning text-white mx-2" type="button" data-toggle="modal" data-target="#editEventModal_<?= $event['id'] ?>">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                  </form>

                  <!-- Bootstrap Modal for Editing Event Information -->
                  <div class="modal fade" id="editEventModal_<?= $event['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editEventModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="editEventModalLabel">Modifica Evento</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Chiudi">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                            <form action="<?= base_url(); ?>/admin/events/update"
                              method="post" data-form-type="blocs-form" novalidate="" enctype="multipart/form-data">
                              <input type="hidden" name="event_id" value="<?= $event['id']; ?>">

                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="title" >Titolo</label>
                                        <input class="form-control" type="text" name="title" value="<?= $event['title'] ?>" required>
                                      </div>

                                      <div class="form-group">
                                        <label for="date">Data inizio</label>
                                        <input
                                          class="form-control"
                                          type="datetime-local"
                                          name="date"
                                          value="<?= $event['date']  ?>"
                                          id='txtDate'>
                                      </div>

                                      <div class="form-group">
                                        <label for="location">Luogo</label>
                                        <input class="form-control" type="text" name="location" value="<?= $event['location'] ?>">
                                      </div>
                                    </div><!-- end col -->

                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="description">Categoria</label>
                                        <select class='form-control search input-text' name="category" id="category" required>
                                          <option value="">Seleziona categoria</option>
                                          <option value="Feste e sagre" <?= ($event['category'] == 'Feste e sagre') ? 'selected' : '' ?>>Feste e sagre</option>
                                          <option value="Mercatini" <?= ($event['category'] == 'Mercatini') ? 'selected' : '' ?>>Mercatini</option>
                                          <option value="Spettacoli teatrali" <?= ($event['category'] == 'Spettacoli teatrali') ? 'selected' : '' ?>>Spettacoli teatrali</option>
                                          <option value="Eventi sportivi" <?= ($event['category'] == 'Eventi sportivi') ? 'selected' : '' ?>>Eventi sportivi</option>
                                          <option value="Eventi culinari" <?= ($event['category'] == 'Eventi culinari') ? 'selected' : ''?>>Eventi culinari</option>
                                          <option value="Sfilate" <?= ($event['category'] == 'Sfilate') ? 'selected' : ''?>>Sfilate</option>
                                          <option value="Talk" <?= ($event['category'] == 'Talk') ? 'selected' : ''?>>Talk</option>
                                          <option value="Altro" <?= ($event['category'] == 'Altro') ? 'selected' : ''?>>Altro</option>
                                        </select>
                                      </div>

                                      <div class="form-group">
                                        <label for="date">Data fine</label>
                                        <input
                                          class="form-control"
                                          type="datetime-local"
                                          name="date_to"
                                          value="<?= $event['date_to']  ?>"
                                          id='txtDateTo'
                                          data-validation-min-message="Seleziona una data futura alla data d'inizio"
                                        >
                                      </div>

                                      <div class="form-group">
                                        <label for="link">Link</label>
                                        <input class="form-control" type="text" name="link" value="<?= $event['link'] ?>">
                                      </div>
                                    </div><!-- end col -->
                                  </div><!-- emd row -->


                                  <div class="form-group">
                                    <label for="description">Descrizione</label>
                                    <textarea class="form-control" name="description" rows="8" cols="40"><?= $event['description'] ?></textarea>
                                  </div>


                                  <div class="form-group">
                                    <label for="image" class="form-label">Immagine</label>
                                    <div class="input_container">
                                      <label for="choose-file" class="custom-file-upload" id="choose-file-label">Seleziona file</label>
                                      <input type="file"  id="choose-file"  name="image" accept=".jpg, .jpeg, .png, .gif" style="display:none;">
                                    </div>
                                    <?php if ($event['image']): ?>
                                      <img
                                        src="<?= base_url('uploads/events/'.$event['image']) ?>"
                                        alt="<?= $event['title'] ?>"
                                        class="mt-3 center"
                                        style="max-width: 350px;"
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
      <p>Nessun evento presente.</p>
    <?php endif; ?>
  </div>

  <style>
    .titleTd::first-letter {text-transform: uppercase}
  </style>

  <script>
    function deleteRow(id) {
      // Construct the form ID based on the user ID
      var formId = 'form_' + id;

      // Submit the form with the constructed ID
      document.getElementById(formId).submit();
    }

  </script>
<?= $this->endSection() ?>