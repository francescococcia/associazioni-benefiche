<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>

  <div class="bloc l-bloc" id="bloc-2">
    <div class="container bloc-md-lg bloc-md">
      <div class="row">
        <div class="text-md-start col-lg-12 col-md-12 text-start ps-0 pe-0 ps-md-2 pe-md-2 ps-lg-3 pe-lg-3">
          <h3 class="section-heading primary-text mb-3 mb-md-4">
            Registrazione associazione
          </h3>
        </div>
        <div class="col">
          <div>
          <form action="<?php echo base_url(); ?>/SignupAssociationController/store" method="post" enctype="multipart/form-data"
            data-form-type="blocs-form" novalidate=""
            data-success-msg="Your message has been sent." data-fail-msg="Sorry it seems that our mail server is not responding, Sorry for the inconvenience!">
            <div class="bento-box primary-gradient container-div-style pt-lg-4">
              <div class="row">
                <div class="text-lg-start col-lg-2">
                  <picture>
                    <source type="image/webp" srcset="<?= base_url('public/img/logobw.webp'); ?>">
                    <img src="<?= base_url('public/img/logobw.png'); ?>" alt="logo"
                      class="img-fluid mx-auto d-block img-logo-style lazyload" width="142" height="120">
                  </picture>
                </div>
                <div class="col offset-lg-0">
                  <h4 class="box-heading tc-3849 mb-0 h4-bloc-2-style">
                    Modulo di registrazione
                  </h4>
                  <h6 class="box-info tc-3849 mt-lg-2 h6-5-style">
                    Inserisci i tuoi dati per registrarti nel portale, aggiungere i tuoi eventi ed i prodotti da proporre al tuo pubblico<br>
                  </h6>
                </div>
              </div>
            </div>
            <div class="bento-box mt-lg-4">
              <div class="row">
                <div class="col">
                  <div class="form-group mb-3">
                    <label class="form-label tc-2190 label-11-style">
                      Nome associazione
                    </label>
                    <input type="text" name="name" placeholder="Inserisci nome" required="" value="<?= set_value('name') ?>" class="form-control mb-lg-3" >
                    <!-- <input id="email_6652_25074" class="form-control" required=""> -->
                  </div>

                  <div class="form-group mb-3">
                    <label class="form-label tc-2190 label-11-style">
                      Sede Legale
                    </label>
                    <input
                        name="legal_address"
                        placeholder="Sede Legale"
                        class="form-control mb-lg-3 pt-lg-0"
                        type="text"
                        value="<?= set_value('legal_address') ?>"
                        required="">
                    <!-- <input id="email_6652_25074" class="form-control" required=""> -->
                  </div>

                  <div class="form-group mb-3">
                    <label class="form-label tc-2190 label-11-style">
                    Password
                    </label>
                    <input type="password" name="password" placeholder="Password" class="form-control mb-lg-3 pt-lg-0" required="">
                    <!-- <input id="email_6652_25074" class="form-control" required=""> -->
                  </div>

                  <div class="form-group mb-3">
                    <label class="form-label tc-2190 label-11-style">
                    Codice fiscale
                    </label>
                    <input type="text" name="tax_code" placeholder="Inserisci Codice fiscale" required="" class="form-control" required="" value="<?= set_value('tax_code') ?>">
                    <!-- <input id="email_6652_25074" class="form-control" required=""> -->
                  </div>

                  <div class="form-group mb-3">
                    <label class="form-label tc-2190 label-11-style">
                      Descrizione
                    </label>
                    <textarea class="form-control" name="description" id="description" rows="2"></textarea>
                    <!-- <input id="email_6652_25074" class="form-control" required=""> -->
                  </div>
                </div>

                <div class="col">
                  <div class="form-group mb-3">
                    <label class="form-label tc-7963 label-16-style">
                      Email
                    </label>
                    <input
                        name="email"
                        placeholder="Inserisci email"
                        class="form-control mb-lg-3 pt-lg-0"
                        type="email"
                        value="<?= set_value('email') ?>"
                        data-error-validation-msg="Email non valida"
                        required="">
                    <!-- <input class="form-control"> -->
                  </div>

                  <div class="form-group mb-3">
                    <label class="form-label tc-2190 label-17-style">
                      Sede operativa
                    </label>
                    <input
                      type="text"
                      name="office"
                      placeholder="Inserisci Sede operativa"
                      class="form-control"
                      required=""
                      value="<?= set_value('office') ?>">
                    <!-- <input id="email_6652_25074" class="form-control" required="" type="email" data-error-validation-msg="Not a valid email address"> -->
                  </div>

                  <div class="form-group mb-3">
                    <label class="form-label tc-2190 label-18-style">
                      Conferma Password
                    </label>
                    <input
                        type="password"
                        name="confirmpassword"
                        placeholder="Conferma Password"
                        class="form-control mb-lg-3 pt-lg-0"
                        required
                        data-validation-passwordagain-message='Password non corrisponde'
                      >
                    <!-- <input id="email_6652_25074" class="form-control" type="password" required=""> -->
                  </div>

                  <div class="form-group mb-3">
                    <label class="form-label tc-2190 label-19-style">
                      Link
                    </label>
                    <input
                      name="link"
                      placeholder="Inserisci il link"
                      class="form-control mb-lg-3 pt-lg-0"
                      type="text"
                      value="<?= set_value('legal_address') ?>"
                    >
                  </div>
                  
                  <div class="form-group">
                  <label for="image" class="form-label tc-2190 label-19-style">Immagine</label>
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
                </div><!-- end col -->
              </div>
            </div>
            <div>
              <div class="text-center">
                <button class="bloc-button btn btn-d btn-rd mt-3 primary-btn box-btn fill-mob-btn" type="submit">
                  Invia
                </button>
              </div>
            </div>
          </form>
          </div>
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
