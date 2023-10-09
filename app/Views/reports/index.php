<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>

	<div class="content mb-5">
		<div class="wrap">
			<div class="page-headline-wrap cc-category-headline">
				<h1>Segnalazione</h1>
				<p class="big-paragraph">Aiutaci a migliorare la piattaforma</p>
			</div>

			<div class="row">
				<div class="col-12 d-flex justify-content-center align-items-center">
					<div class="col-12 col-md-8 col-lg-6">
            <form method="post" action="<?= site_url('reports/store') ?>">
              <div class="card">
                <div class="card-body">
                  <!-- Your form fields for name, email, and message -->
                  <div class="form-group">
                  <label>Nome</label>
                  <input class="form-control mb-lg-3 pt-lg-0" type="text" name="name" placeholder="Your Name">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control mb-lg-3 pt-lg-0" type="email" name="email" placeholder="Your Email">
                  </div>

                  <div class="form-group">
                    <label>Messaggio</label>
                    <textarea class="form-control mb-lg-3 pt-lg-0" name="message" placeholder="Report Message"></textarea>
                  </div>

                  <div class="text-center">
                    <button class="btn btn-clean float-lg-none btn-c-4129 btn-rd mt-lg-4"
                        type="submit">
                        Invia
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
