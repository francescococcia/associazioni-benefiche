<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>

  <div class="bloc l-bloc" id="bloc-2">
    <div class="container bloc-md-lg bloc-md">
      <div class="row">
        <div class="text-md-start col-lg-12 col-md-12 text-start ps-0 pe-0 ps-md-2 pe-md-2 ps-lg-3 pe-lg-3">
          <h3 class="section-heading primary-text mb-3 mb-md-4">
            Password dimenticata
          </h3>
        </div>
        <div class="d-flex mb-3 ps-0 pe-0 col-12 col-md-6 ps-md-2 pe-md-2 mb-md-0 ps-lg-3 pe-lg-3">
          <div class="bento-box primary-gradient container-div-0-bloc-2-style">
            <picture>
                <source type="image/webp" srcset="<?= base_url('public/img/logobw.webp'); ?>">
                <img src="<?= base_url('public/img/logobw.png'); ?>" alt="logo"
                  class="img-fluid mx-auto d-block avatar mb-4 mt-4 img-32-style lazyload" width="300" height="250">
              </picture>
            <h3 class="box-heading tc-3849 mb-0 h3-serve-aiuto--style">
              Serve aiuto?
            </h3>
            <p class="box-info tc-3849 p-14-style">
              Inserisci la mail e riceverai le istruzioni per reimpostare la tua password<br>
            </p>
          </div>
        </div>
        <div class="d-flex ps-0 pe-0 col-12 col-md-6 ps-md-2 pe-md-2 ps-lg-3 pe-lg-3">
          <div class="bento-box bgc-5341 shadow">
            <form action="<?php echo base_url(); ?>/UsersController/sendForgotPassword" method="post" novalidate="" data-form-type="blocs-form">
            <!-- <form data-clean-url-used="true" id="form_13311" data-form-type="blocs-form" novalidate="" data-success-msg="Your message has been sent." data-fail-msg="Sorry it seems that our mail server is not responding, Sorry for the inconvenience!"> -->
              <div class="form-group mb-3">
                <label class="form-label tc-2190 label-3-style">
                  Email
                </label>
                <input
                  type="email"
                  id="email"
                  name="email"
                  placeholder="Inserisci Email"
                  class="form-control mb-lg-3 pt-lg-0"
                  required=""
                  data-error-validation-msg="Email non valida">
                <!-- <input id="email_13311" class="form-control" type="email" data-error-validation-msg="Not a valid email address" required=""> -->
              </div>
              <h6 class="mb-4">
                <a href="<?= base_url() ?>/signin">Torna al login</a><br>
              </h6> 
              <button class="bloc-button btn btn-d btn-rd mt-3 primary-btn box-btn fill-mob-btn" type="submit">
                Invia
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
<?= $this->endSection() ?>
