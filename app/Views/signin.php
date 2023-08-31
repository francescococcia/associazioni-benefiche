<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>

	<div class="content mb-5">
		<div class="wrap">
			<div class="page-headline-wrap cc-category-headline">
				<h1>Login</h1>
				<p class="big-paragraph">Inserisci le credenziali di accesso</p>
			</div>

			<div class="row">
				<div class="col-12 d-flex justify-content-center align-items-center">
					<div class="col-12 col-md-8 col-lg-6">

						<form action="<?php echo base_url(); ?>/SigninController/loginAuth" method="post"
								data-form-type="blocs-form" novalidate=""
								data-success-msg="Your message has been sent."
								data-fail-msg="Sorry it seems that our mail server is not responding, Sorry for the inconvenience!">

								<div class="card">
									<div class="card-body">
										<div class="form-group">
												<label>
														Email
												</label>
												<input type="email" id="email" name="email" placeholder="Email"
														value="<?= set_value('email') ?>"
														data-error-validation-msg="Not a valid email address"
														class="form-control mb-lg-3 pt-lg-0" required="">
										</div>
										<div class="form-group">
												<label>
														Password
												</label>
												<input type="password" name="password" required="" placeholder="Password"
														class="form-control">
										</div>

										<div class="text-center">
											<button class="btn btn-clean float-lg-none btn-c-4129 btn-rd mt-lg-4"
													type="submit">
													Accedi
											</button>
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
