<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>

  <div class="bloc l-bloc" id="bloc-2">
    <div class="container bloc-md-lg bloc-md">
      <div class="row">
        <div class="text-md-start col-lg-12 col-md-12 text-start ps-0 pe-0 ps-md-2 pe-md-2 ps-lg-3 pe-lg-3">
          <h3 class="section-heading primary-text mb-3 mb-md-4">
            Accedi
          </h3>
        </div>
        <div class="d-flex mb-3 ps-0 pe-0 col-12 col-md-6 ps-md-2 pe-md-2 mb-md-0 ps-lg-3 pe-lg-3">
          <div class="bento-box primary-gradient container-div-bloc-2-style">
            <picture>
                <source type="image/webp" srcset="<?= base_url('public/img/logobw.webp'); ?>">
                <img src="<?= base_url('public/img/logobw.png'); ?>" alt="logo"
                  class="img-fluid avatar mb-4 mt-4 img-21-style mx-auto d-block lazyload" width="300" height="250">
              </picture>
            <h3 class="box-heading tc-3849 mb-0 h3-bloc-2-style">
              Benvenuti nel portale
            </h3>
            <p class="box-info tc-3849 p-bloc-2-style">
              Accedi per visualizzare gli eventi ed i prodotti delle associazioni<br>
            </p>
          </div>
        </div>
        <div class="d-flex ps-0 pe-0 col-12 col-md-6 ps-md-2 pe-md-2 ps-lg-3 pe-lg-3">
          <div class="bento-box bgc-5341 shadow">
            <form action="<?php echo base_url(); ?>/SigninController/loginAuth" method="post"
								data-form-type="blocs-form" novalidate=""
								data-success-msg="Your message has been sent."
								data-fail-msg="Sorry it seems that our mail server is not responding, Sorry for the inconvenience!">
            <!-- <form data-clean-url-used="true" id="form_39814" data-form-type="blocs-form" novalidate="" data-success-msg="Your message has been sent." data-fail-msg="Sorry it seems that our mail server is not responding, Sorry for the inconvenience!"> -->
              <div class="form-group mb-3">
                <label class="form-label tc-2190 label-email-style">
                  Email
                </label>
                <input
                  type="email"
                  id="email"
                  name="email"
                  placeholder="Inserisci Email"
                  value="<?= set_value('email') ?>"
                  data-error-validation-msg="Email non valida"
                  class="form-control mb-lg-3 pt-lg-0" required="">
                <!-- <input id="email_13311_39814" class="form-control" type="email" data-error-validation-msg="Not a valid email address" required=""> -->
              </div>
              <div class="form-group mb-3">
                <label class="form-label tc-2190 label-password-style">
                  Password
                </label>
                <input type="password" name="password" required="" placeholder="Password"
                          class="form-control">
                <!-- <input id="email_13311_39814" class="form-control" type="password" required=""> -->
                <h6 class="mb-4 mt-lg-3">
                  <a href="<?= base_url() ?>/forgot-password">Password dimenticata?</a><br>
                </h6>
              </div> 
              <button class="bloc-button btn btn-d btn-rd mt-3 primary-btn box-btn fill-mob-btn" type="submit">
                Accedi
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
<?= $this->endSection() ?>
