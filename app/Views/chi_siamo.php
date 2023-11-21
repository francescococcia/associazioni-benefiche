<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>
  <!-- bloc-4 -->
  <div class="bloc l-bloc" id="bloc-4">
    <div class="container bloc-md">
    <?php foreach ($teams as $team) : ?>
      <div class="row">
        <div class="col text-center">
          <h3 class="section-heading primary-text mb-3 mb-md-4 mt-lg-4">
            Chi siamo
          </h3>
          <?php if (session()->get('isAdmin')): ?>
            <div class="align-self-center col-lg-8 offset-lg-2 text-lg-end text-center mb-3">
              <!-- <a href="<#?php echo base_url();?>/store/new" class="btn btn-d btn-rd box-btn primary-btn float-lg-none fill-mob-btn">Inserisci prodotto</a> -->
              <form action="<?= site_url('admin/team/edit/' . $team['id']) ?>" method="post" id="teamForm_<?= $team['id'] ?>">
                  <button class="btn btn-d btn-rd box-btn primary-btn float-lg-none fill-mob-btn" type="button" data-toggle="modal" data-target="#editTeamModal_<?= $team['id'] ?>">
                      <i class="fa-solid fa-pen-to-square"></i>
                  </button>
              </form>

              <!-- Bootstrap Modal for Editing Team Information -->
              <div class="modal fade" id="editTeamModal_<?= $team['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editTeamModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="editTeamModalLabel">Modifica Chi siamo</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Chiudi">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <form method="POST" action="<?= base_url(); ?>/admin/team/update" data-form-type="blocs-form" novalidate=""  enctype="multipart/form-data">
                              <input type="hidden" name="team_id" value="<?= $team['id'] ?>">
  
                              <div class="form-group">
                                  <label for="description">Descrizione</label>
                                  <textarea
                                    type="text" id="description" name="description"
                                    value="<?= $team['description'] ?>" class="form-control" required
                                    rows="2">
                                  </textarea>
                              </div>
  
                              <div class="form-group">
                                  <label for="description_mission">Missione</label>
                                  <textarea
                                    type="text" id="description_mission" name="description_mission"
                                    value="<?= $team['description_mission'] ?>" class="form-control" required
                                    rows="2">
                                  </textarea>
                              </div>
                              
                              <div class="form-group">
                                <label for="image" class="form-label">Immagine</label>
                                <div class="input_container">
                                  <label for="choose-file" class="custom-file-upload" id="choose-file-label">Seleziona file</label>
                                  <input type="file"  id="choose-file"  name="image" accept=".jpg, .jpeg, .png, .gif" style="display:none;">
                                </div>
                                <?php if ($team['image']): ?>
                                  <img
                                    src="<?= base_url('uploads/'.$team['image']) ?>"
                                    class="mt-3 center"
                                    style="max-width: 350px;"
                                  >
                                <?php endif; ?>
                              </div>
  
                              <!-- Add other fields for team information -->
  
                              <div class="text-center">
                                  <button type="submit" class="btn btn-clean float-lg-none btn-c-4129 btn-rd mt-lg-4">Aggiorna</button>
                              </div>
                          </form>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          <?php endif; ?>
          <picture>
            <source type="image/webp" srcset="../img/lazyload-ph.png" data-srcset="<?php echo base_url('uploads/'.$team['image']); ?>">
            <img src="<?php echo base_url('uploads/'.$team['image']); ?>"
            data-src="../img/photo_2023-11-11%2016.38.48.jpeg"
            class="img-fluid img-rd-lg mx-auto d-block lazyload"
            alt="photo_2023 11-11%2016.38.48.jpeg" width="1050" height="500">
          </picture>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <div class="bento-box pt-lg-4 mt-lg-5 shadow">
            <h1 class="mb-4 box-heading primary-text h1-su-di-noi-style">
              Su di noi
            </h1>
            <p style='font-size:18px' class="mb-4">
              <?= $team['description'] ?>
            </p>
          </div>
          <div class="bento-box pt-lg-4 mt-lg-4 shadow">
            <h1 class="mb-4 box-heading primary-text h1-bloc-4-style">
              La nostra mission<br>
            </h1>
            <p style='font-size:18px' class="mb-4">
              <?= $team['description_mission'] ?>
            </p>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
  <!-- bloc-4 END -->
  <script>
    $(document).ready(function () {
      $('#choose-file').change(function () {
        var i = $(this).prev('label').clone();
        var file = $('#choose-file')[0].files[0].name;
        $(this).prev('label').text(file);
      }); 
    });
  </script>
  <?= $this->endSection() ?>
