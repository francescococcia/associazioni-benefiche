<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>

  <div class="content mb-5">
    <div class="wrap">
      <div class="page-headline-wrap cc-category-headline">
        <h1>Modulo di registrazione</h1>
        <p class="big-paragraph">Inserisci le informazioni della tua associazione</p>
      </div>

      <div class="row">
        <div class="col-12 align-items-center">
          <form action="<?php echo base_url(); ?>/SignupAssociationController/store" method="post" enctype="multipart/form-data"
            data-form-type="blocs-form" novalidate=""
            data-success-msg="Your message has been sent." data-fail-msg="Sorry it seems that our mail server is not responding, Sorry for the inconvenience!">

            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label">Nome Associazione</label>
                      <input type="text" name="name" placeholder="Inserisci nome" required="" value="<?= set_value('name') ?>" class="form-control mb-lg-3" >
                    </div>

                    <div class="form-group">
                      <label class="form-label">Sede Legale</label>
                      <input
                        name="legal_address"
                        placeholder="Sede Legale"
                        class="form-control mb-lg-3 pt-lg-0"
                        type="text"
                        value="<?= set_value('legal_address') ?>"
                        required="">
                    </div>

                    <div class="form-group">
                      <label class="form-label">Password</label>
                      <input type="password" name="password" placeholder="Password" class="form-control mb-lg-3 pt-lg-0" required="">
                    </div>
                  </div><!-- end col -->

                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label">Email</label>
                      <input
                        name="email"
                        placeholder="Inserisci email"
                        class="form-control mb-lg-3 pt-lg-0"
                        type="email"
                        value="<?= set_value('email') ?>"
                        data-error-validation-msg="Email non valida"
                        required="">
                    </div>

                    <div class="form-group">
                      <label class="form-label">Codice Fiscale</label>
                      <input type="text" name="tax_code" placeholder="Inserisci Codice fiscale" required="" class="form-control" required="" value="<?= set_value('tax_code') ?>">
                    </div>

                    <div class="form-group">
                      <label class="form-label">Conferma Password</label>
                      <input
                        type="password"
                        name="confirmpassword"
                        placeholder="Conferma Password"
                        class="form-control mb-lg-3 pt-lg-0"
                        required
                        data-validation-passwordagain-message='Password non corrisponde'
                      >
                    </div>
                  </div><!-- end col -->
                </div><!-- end row -->


                <div class="form-group">
                  <label class="form-label">Link</label>
                  <input
                    name="link"
                    placeholder="Inserisci il link"
                    class="form-control mb-lg-3 pt-lg-0"
                    type="text"
                    value="<?= set_value('legal_address') ?>"
                  >
                </div>

                <div class="mb-3">
                  <label for="description" class="form-label">Descrizione</label>
                  <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                </div>

                <div class="form-group">
                  <label for="image" class="form-label">Immagine</label>
                  <div class="input_container">
                  <label for="choose-file" class="custom-file-upload" id="choose-file-label">Seleziona file</label>
                    <input
                      type="file"
                      id="choose-file"
                      name="image"
                      accept=".jpg, .jpeg, .png, .gif"
                      style="visibility:hidden;width:0"
                      required>
                  </div>
                </div>

                <div class="text-center">
                  <button class="btn btn-clean float-lg-none btn-c-4129 btn-rd mt-lg-4" type="submit">
                    Invia
                  </button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

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
