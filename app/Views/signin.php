<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>

	<!-- bloc-7 -->
	<div class="bloc l-bloc full-width-bloc" id="bloc-7">
		<div class="container bloc-no-padding-lg">
			<div class="row mb-lg-5 mt-lg-5">
				<div class="col-md-12 offset-lg--1 col-lg-6">
					<picture>
						<source type="image/webp" srcset="<?php echo base_url('public/img/lazyload-ph.png'); ?>" data-srcset="<?php echo base_url('public/img/city-overlay.webp'); ?>">
						<img src="<?php echo base_url('public/img/lazyload-ph.png'); ?>" data-src="<?php echo base_url('public/img/city-overlay.png'); ?>" class="img-fluid mx-auto d-block lazyload" alt="placeholder image" width="515" height="343">
					</picture>
				</div>
				<div class="align-self-center offset-md-1 col-md-10 col-sm-10 offset-sm-1 offset-1 col-10 col-lg-5 pr-lg-3 offset-lg-0">
          <?php if(session()->getFlashdata('msg')):?>
            <div class="alert alert-warning">
                <?= session()->getFlashdata('msg') ?>
            </div>
          <?php endif;?>

					<form action="<?php echo base_url(); ?>/SigninController/loginAuth" method="post"
						data-form-type="blocs-form" novalidate="" data-success-msg="Your message has been sent."
						data-fail-msg="Sorry it seems that our mail server is not responding, Sorry for the inconvenience!">
						<h1 class="mb-4 h1-registrati-style align-self-center">
							Login
						</h1>
						<div class="form-group">
							<label>
								Email
							</label>
							<input type="email" id="email" name="email" placeholder="Email" value="<?= set_value('email') ?>"
							data-error-validation-msg="Not a valid email address" class="form-control mb-lg-3 pt-lg-0"  required="">
							<div class="form-group">
								<label>
									Password
								</label>
								<input type="password" name="password" required="" placeholder="Password" class="form-control" >
								<!-- <input class="form-control" type="password" required="" id="input_2372"> -->
							</div>
						</div> 
						<button class="bloc-button btn btn-d mt-lg-4 btn-invia-style btn-lg float-lg-none" type="submit">
							Accedi
						</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- bloc-7 END -->

<?= $this->endSection() ?>
