<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>
  <!-- bloc-7 -->
  <div class="bloc l-bloc full-width-bloc" id="bloc-7">
    <div class="container bloc-no-padding-lg">
      <div class="row mb-lg-5 mt-lg-5">
        <div class="col-md-12 offset-lg--1 col-lg-6">
          <picture><source type="image/webp" srcset="<?php echo base_url('public/img/lazyload-ph.png'); ?>"
            data-srcset="<?php echo base_url('public/img/city-overlay.webp'); ?>">
            <img src="<?php echo base_url('public/img/lazyload-ph.png'); ?>"
            data-src="<?php echo base_url('public/img/city-overlay.png'); ?>"
            class="img-fluid mx-auto d-block mt-lg-5 pt-lg-5 lazyload" alt="placeholder image" width="515" height="343"></picture>
        </div>
        <div class="align-self-center offset-md-1 col-md-10 col-sm-10 offset-sm-1 offset-1 col-10 col-lg-5 pr-lg-3 offset-lg-0">
        <?php if(isset($validation)):?>
          <div class="alert alert-warning">
              <?= $validation->listErrors() ?>
          </div>
          <?php endif;?>

        <form action="<?php echo base_url(); ?>/SignupController/store" method="post"
          id="form_18619" data-form-type="blocs-form" novalidate=""
          data-success-msg="Your message has been sent." data-fail-msg="Sorry it seems that our mail server is not responding, Sorry for the inconvenience!">
            <h1 class="mb-4 h1-registrati-style align-self-center">
              Modulo di registrazione
            </h1>
            <div class="form-group">
              <label>Nome</label>
              <input type="text" name="first_name" placeholder="Name" required="" value="<?= set_value('first_name') ?>" class="form-control mb-lg-3" >
              <div class="form-group">
                <label>Cognome</label>
                <input type="text" name="last_name" placeholder="Cognome" required="" class="form-control" required="" value="<?= set_value('last_name') ?>">
              </div>
            </div>

            <div class="form-group">
              <label>Numero di telefono</label>
              <input type="text" name="phone_number" placeholder="Numero" required="" value="<?= set_value('phone_number') ?>" class="form-control mb-lg-3" >
              <div class="form-group">
                <label>Data di nascinta</label>
                <input type="date" name="birth_date" placeholder="Data di nascita" required="" class="form-control" required="" value="<?= set_value('birth_date') ?>">
              </div>
            </div>

            <div class="form-group">
              <label>Email</label>
              <input name="email" placeholder="email" class="form-control mb-lg-3 pt-lg-0" type="email" value="<?= set_value('email') ?>" data-error-validation-msg="Not a valid email address" required="">
              <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Password" class="form-control mb-lg-3 pt-lg-0" required="">
                <label>Conferma Password</label>
                <input type="password" name="confirmpassword" placeholder="Confirm Password" class="form-control mb-lg-3 pt-lg-0" required="">
              </div>
            </div>
            <div class="form-check">
              <!-- <input class="form-check-input" type="checkbox" id="optin_49815_18619" data-validation-minchecked-minchecked="1" name="optin_49815"> -->
              <!-- <label class="form-check-label">
                Ricevi aggiornamenti via mail
              </label> -->
            </div> 
            <button class="bloc-button btn btn-d btn-lg btn-block mt-lg-4 mb-lg-5" type="submit">
              Invia
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- bloc-7 END -->
<?= $this->endSection() ?>
