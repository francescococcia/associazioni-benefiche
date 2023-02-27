<!doctype html>
<html>
<head>
<?= $this->include('partial/head'); ?>
    <title>Register</title>


    
<!-- Analytics -->
 
<!-- Analytics END -->
    
</head>
<body>



<!-- Main container -->
<div class="page-container">
    
  <?= $this->include('partial/navbar'); ?>

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

        <form action="<?php echo base_url(); ?>/SignupController/store_association" method="post"
          id="form_18619" data-form-type="blocs-form" novalidate=""
          data-success-msg="Your message has been sent." data-fail-msg="Sorry it seems that our mail server is not responding, Sorry for the inconvenience!">
            <input type="hidden" name="is_responsible" value="true" />
            <h1 class="mb-4 h1-registrati-style align-self-center">
              Modulo di registrazionee
            </h1>
            <div class="form-group">
              <label>Nome Associazione</label>
              <input type="text" name="first_name" placeholder="Name" required="" value="<?= set_value('first_name') ?>" class="form-control mb-lg-3" >
              <div class="form-group">
                <label>Codice Fiscale</label>
                <input type="text" name="tax_code" placeholder="Codice fiscale" required="" class="form-control" required="" value="<?= set_value('tax_code') ?>">
              </div>
            </div>

            <div class="form-group">
              <label>Sede Legale</label>
              <input name="head_office" placeholder="Sede Legale" class="form-control mb-lg-3 pt-lg-0" type="text" value="<?= set_value('head_office') ?>" required="">
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


  <?= $this->include('partial/footer'); ?>

</div>
<!-- Main container END -->
    


<?= $this->include('partial/import_js'); ?>


</body>
</html>

