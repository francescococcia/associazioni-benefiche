<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>

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
