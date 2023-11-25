<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>
<div class="bloc l-bloc" id="bloc-2">
    <div class="container bloc-md-lg bloc-md">
      <div class="row">
        <div class="text-md-start col-lg-12 col-md-12 text-start ps-0 pe-0 ps-md-2 pe-md-2 ps-lg-3 pe-lg-3">
          <h3 class="section-heading primary-text mb-3 mb-md-4">
            Reimposta password
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
              Inserisci la nuova password<br>
            </p>
          </div>
        </div>
        <div class="d-flex ps-0 pe-0 col-12 col-md-6 ps-md-2 pe-md-2 ps-lg-3 pe-lg-3">
          <div class="bento-box bgc-5341 shadow">
						<form action="<?= base_url('recoverPassword'); ?>" method="post">
            <!-- <form action="<?php echo base_url(); ?>/UsersController/sendForgotPassword" method="post" novalidate="" data-form-type="blocs-form"> -->
            <!-- <form data-clean-url-used="true" id="form_13311" data-form-type="blocs-form" novalidate="" data-success-msg="Your message has been sent." data-fail-msg="Sorry it seems that our mail server is not responding, Sorry for the inconvenience!"> -->
              <div class="form-group mb-3">
                <label class="form-label tc-2190 label-3-style">
                  Password
                </label>
								<input class="form-control mb-lg-3 pt-lg-0" type="password" name="password">
              </div>
							<div class="form-group">
								<label class="form-label tc-2190 label-3-style">
                  Conferma Password
								</label>
                  <input class="form-control mb-lg-3 pt-lg-0" type="password" name="confirm_password">
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
	<div class="content mb-5">
		<div class="wrap">
			<div class="page-headline-wrap cc-category-headline">
				<h1>Modifica Password</h1>
				<p class="big-paragraph">Inserisci una nuova password</p>
			</div>

			<div class="row">
				<div class="col-12 d-flex justify-content-center align-items-center">
					<div class="col-12 col-md-8 col-lg-6">
              <form action="<?= base_url('recoverPassword'); ?>" method="post">
              <input type="hidden" name="token" value="<?= $user['reset_token']; ?>" />

								<div class="card">
									<div class="card-body">
                  <div class="form-group">
                  <label for="password">Password</label>
                  <input class="form-control mb-lg-3 pt-lg-0" type="password" name="password">
                </div>

                <div class="form-group">
                  <label for="phone_number">Conferma password</label>
                  <input class="form-control mb-lg-3 pt-lg-0" type="password" name="confirm_password">
                </div>

										<div class="text-center">
											<button class="btn btn-clean float-lg-none btn-c-4129 btn-rd mt-lg-4"
													type="submit">
													Modifica
											</button>
										</div>
                    <hr>
										<div class="text-center">
                      <a href="<?= base_url() ?>/signin" class="">Login</a>
										</div>
									</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<?= $this->endSection() ?>
