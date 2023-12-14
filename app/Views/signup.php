<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>

  <div class="bloc l-bloc" id="bloc-2">
    <div class="container bloc-md-lg bloc-md">
      <div class="row">
        <div class="text-md-start col-lg-12 col-md-12 text-start ps-0 pe-0 ps-md-2 pe-md-2 ps-lg-3 pe-lg-3">
          <h3 class="section-heading primary-text mb-3 mb-md-4">
            Registrazione utente
          </h3>
        </div>
        <div class="col">
          <div>
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
                  <h4 class="box-heading tc-3849 mb-0 h4-style">
                    Modulo di registrazione
                  </h4>
                  <h6 class="box-info tc-3849 mt-lg-2 h6-bloc-2-style">
                    Inserisci i tuoi dati per registrarti nel portale, restare aggiornato sugli eventi e prenotare i tuoi prodotti<br>
                  </h6>
                </div>
              </div>
            </div>
            <form action="<?php echo base_url(); ?>/UsersController/create" method="post"
              id="form_18619" data-form-type="blocs-form" novalidate=""
              data-success-msg="Your message has been sent." data-fail-msg="Sorry it seems that our mail server is not responding, Sorry for the inconvenience!">
              <div class="bento-box mt-lg-4 shadow">
                <div class="row">
                  <div class="col">
                    <div class="form-group mb-3">
                      <label class="form-label tc-2190 label-nome-style">
                        Nome
                      </label>
                      <input type="text" name="first_name" placeholder="Inserisci il nome" required value="<?= set_value('first_name') ?>" class="form-control mb-lg-3">
                    </div>

                    <div class="form-group mb-3">
                      <label class="form-label tc-2190 label-nome-style">
                        Cognome
                      </label>
                      <input type="text" name="last_name" placeholder="Inserisci il cognome" required="" class="form-control" value="<?= set_value('last_name') ?>">
                    </div>

                    <div class="form-group mb-3">
                      <label class="form-label tc-2190 label-9-style">
                        Password
                      </label>
                      <input type="password" name="password" placeholder="Password" class="form-control mb-lg-3 pt-lg-0"
                        required
                        minlength="4"
                        data-validation-minlength-message="La password deve essere almeno di '4' caratteri">
                      <!-- <input id="email_6652_25074" class="form-control" type="password" required=""> -->
                    </div>

                    <div class="form-group mb-3">
                      <label class="form-label tc-2190 label-nome-style">
                      Data di nascita
                      </label>
                      <input type="date" name="birth_date" placeholder="Data di nascita" required="" class="form-control" value="<?= set_value('birth_date') ?>" id='txtDate'>
                    </div>
                  </div><!-- end col -->

                  <div class="col">
                    <div class="form-group mb-3">
                      <label class="form-label tc-2190 label-8-style">
                        E-mail
                      </label>
                      <input name="email" placeholder="email" class="form-control mb-lg-3 pt-lg-0" type="email" value="<?= set_value('email') ?>"
                      data-error-validation-msg="Email non valida" required="">
                      <!-- <input id="email_6652_25074" class="form-control" required="" type="email" data-error-validation-msg="Not a valid email address"> -->
                    </div>

                    <div class="form-group mb-3">
                      <label class="form-label tc-2190 label-nome-style">
                      Numero di telefono
                      </label>
                      <input
                        type="text"
                        name="phone_number"
                        placeholder="Inserisci il numero di telefono"
                        required
                        value="<?= set_value('phone_number') ?>"
                        class="form-control mb-lg-3"
                        pattern="[0-9]+"
                      >
                    </div>

                    <div class="form-group mb-3">
                      <label class="form-label tc-2190 label-10-style">
                        Ripeti password
                      </label>
                      <input
                        type="password"
                        name="confirmpassword"
                        placeholder="Inserisci la Password"
                        class="form-control mb-lg-3 pt-lg-0"
                        required
                        data-validation-passwordagain-message='Password non corrisponde'
                      >
                      <!-- <input id="email_6652_25074" class="form-control" type="password" required=""> -->
                    </div>
                  </div>
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
      var dtToday = new Date();

      var month = dtToday.getMonth() + 1;
      var day = dtToday.getDate();
      var year = dtToday.getFullYear();
      if(month < 10)
          month = '0' + month.toString();
      if(day < 10)
          day = '0' + day.toString();

      var maxDate = year + '-' + month + '-' + day;

      // or instead:
      // var maxDate = dtToday.toISOString().substr(0, 10);

      $('#txtDate').attr('max', maxDate);
    });
  </script>

<?= $this->endSection() ?>
