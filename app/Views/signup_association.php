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

        <form action="<?php echo base_url(); ?>/SignupAssociationController/store" method="post" enctype="multipart/form-data"
          id="form_18619" data-form-type="blocs-form" novalidate=""
          data-success-msg="Your message has been sent." data-fail-msg="Sorry it seems that our mail server is not responding, Sorry for the inconvenience!">

            <h1 class="mb-4 h1-registrati-style align-self-center">
              Modulo di registrazionee
            </h1>
            <div class="form-group">
              <label>Nome Associazione</label>
              <input type="text" name="name" placeholder="Name" required="" value="<?= set_value('name') ?>" class="form-control mb-lg-3" >
            </div>

            <div class="form-group">
              <label>Codice Fiscale</label>
              <input type="text" name="tax_code" placeholder="Codice fiscale" required="" class="form-control" required="" value="<?= set_value('tax_code') ?>">
            </div>

            <div class="form-group">
              <label>Sede Legale</label>
              <input
                name="legal_address"
                placeholder="Sede Legale"
                class="form-control mb-lg-3 pt-lg-0"
                type="text"
                value="<?= set_value('legal_address') ?>"
                required="">
            </div>

            <div class="form-group">
              <label>Email</label>
              <input name="email" placeholder="email" class="form-control mb-lg-3 pt-lg-0" type="email" value="<?= set_value('email') ?>" data-error-validation-msg="Not a valid email address" required="">
            </div>

            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" placeholder="Password" class="form-control mb-lg-3 pt-lg-0" required="">
            </div>

            <div class="form-group">
              <label>Conferma Password</label>
              <input type="password" name="confirmpassword" placeholder="Confirm Password" class="form-control mb-lg-3 pt-lg-0" required="">
            </div>
            
            <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="image" class="form-label">Image</label>
            <input class="form-control" type="file" name="image" id="image">
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
