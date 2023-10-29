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

            <form method="post" action="<?= base_url(); ?>/associations/update"
              data-form-type="blocs-form" novalidate="" enctype="multipart/form-data">
              <div class="card">
                <div class="card-body">
                  <div class="form-group">
                    <label for="name" class="form-label">Nome Associazione</label>
                    <input type="text" class="form-control" required name="name" id="name" value="<?= $association['name'] ?>">
                  </div>

                  <div class="form-group">
                      <label for="legal_address" class="form-label">Sede Legale</label>
                      <input type="text" class="form-control" required name="legal_address" id="legal_address" value="<?= $association['legal_address'] ?>">
                  </div>

                  <div class="form-group">
                      <label for="link" class="form-label">Link</label>
                      <input type="text" class="form-control" required name="link" id="link" value="<?= $association['link'] ?>">
                  </div>

                  <div class="form-group">
                      <label for="tax_code" class="form-label">Codice Fiscale</label>
                      <input type="text" class="form-control" required name="tax_code" id="tax_code" value="<?= $association['tax_code'] ?>">
                  </div>

                  <div class="form-group">
                      <label for="description" class="form-label">Descrizione</label>
                      <textarea class="form-control" name="description" id="description" rows="3"><?= $association['description'] ?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="image" class="form-label">Immagine</label>
                    <div class="input_container">
                      <label for="choose-file" class="custom-file-upload" id="choose-file-label">Seleziona file</label>
                      <input type="file"  id="choose-file"  name="image" accept=".jpg, .jpeg, .png, .gif" style="display:none;">
                    </div>
                    <?php if ($association['image']): ?>
                      <img
                        src="<?= base_url('uploads/'.$association['image']) ?>"
                        alt="<?= $association['name'] ?>"
                        class="mt-3 ml-5"
                        style="max-width: 300px;">
                      <?php endif; ?>
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

  <script>
    $(document).ready(function () {
      $('#choose-file').change(function () {
        var i = $(this).prev('label').clone();
        var file = $('#choose-file')[0].files[0].name;
        $(this).prev('label').text(file);
      }); 
    });
  </script>
<?= $this->endSection() ?>
