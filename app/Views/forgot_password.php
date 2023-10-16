<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>

	<div class="content mb-5">
		<div class="wrap">
			<div class="page-headline-wrap cc-category-headline">
				<h1>Password Dimenticata</h1>
				<p class="big-paragraph">Ti invieremo le istruzioni tramite email</p>
			</div>

			<div class="row">
				<div class="col-12 d-flex justify-content-center align-items-center">
					<div class="col-12 col-md-8 col-lg-6">

              <form action="<?php echo base_url(); ?>/UsersController/sendForgotPassword" method="post" novalidate="" data-form-type="blocs-form">

								<div class="card">
									<div class="card-body">
										<div class="form-group">
												<label>Email</label>
												<input
													type="email"
													id="email"
													name="email"
													placeholder="Inserisci Email"
                          class="form-control mb-lg-3 pt-lg-0"
													required=""
													data-error-validation-msg="Email non valida">
										</div>

										<div class="text-center">
											<button class="btn btn-clean float-lg-none btn-c-4129 btn-rd mt-lg-4"
													type="submit">
													Invia
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
