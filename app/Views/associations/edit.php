<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>
  <div class="content mb-5">
		<div class="wrap">
			<div class="page-headline-wrap cc-category-headline">
				<h1>Informazioni Associazione</h1>
				<p class="big-paragraph">Modifica le seguenti informazioni</p>
			</div>

			<div class="row">
				<div class="col-12 d-flex justify-content-center align-items-center">
					<div class="col-12 col-md-8 col-lg-6">

            <form method="post" action="<?= base_url(); ?>/associations/update" enctype="multipart/form-data">
              <div class="card">
                <div class="card-body">

                  <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="<?= $association['name'] ?>">
                  </div>
                  <div class="mb-3">
                      <label for="legal_address" class="form-label">Legal Address</label>
                      <input type="text" class="form-control" name="legal_address" id="legal_address" value="<?= $association['legal_address'] ?>">
                  </div>
                  <div class="mb-3">
                      <label for="tax_code" class="form-label">Tax Code</label>
                      <input type="text" class="form-control" name="tax_code" id="tax_code" value="<?= $association['tax_code'] ?>">
                  </div>
                  <div class="mb-3">
                      <label for="description" class="form-label">Description</label>
                      <textarea class="form-control" name="description" id="description" rows="3"><?= $association['description'] ?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="image" class="form-label">Image</label>
                    <div class="input_container">
                      <input type="file" id="image" name="image" accept=".jpg, .jpeg, .png, .gif">
                    </div>
                    <img src="<?= base_url('uploads/'.$association['image']) ?>" alt="<?= $association['name'] ?>" class="mt-3 ml-5" style="max-width: 300px;">
                  </div>
                  <div class="text-center">
                    <button class="btn btn-clean float-lg-none btn-c-4129 btn-rd" type="submit">
                      Aggiorna
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
