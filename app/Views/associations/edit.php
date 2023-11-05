<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>
  <div class="content mb-5">
		<div class="wrap">
			<div class="page-headline-wrap cc-category-headline">
				<h1>Informazioni Associazione</h1>
				<p class="big-paragraph">Modifica le seguenti informazioni</p>
			</div>

			<div class="row">
				<div class="col-12 align-items-center">

          <form method="post" action="<?= base_url(); ?>/associations/update"
            data-form-type="blocs-form" novalidate="" enctype="multipart/form-data">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="name" class="form-label">Nome Associazione</label>
                      <input type="text" class="form-control" required name="name" id="name" value="<?= $association['name'] ?>">
                    </div>

                    <div class="form-group">
                      <label for="legal_address" class="form-label">Sede Legale</label>
                      <input type="text" class="form-control" required name="legal_address" id="legal_address" value="<?= $association['legal_address'] ?>">
                    </div>

                    <div class="form-group">
                      <label for="password">Passworrd</label>
                      <input
                        class="form-control mb-lg-3 pt-lg-0"
                        type="password"
                        name="password"
                        minlength="4"
                        data-validation-minlength-message="La password deve essere almeno di '4' caratteri">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="inputEmail4">Email</label>
                      <input type="email" id="email" name="email" placeholder="Inserisci email" value="<?= $user['email']; ?>"
                        data-error-validation-msg="Email non valida" class="form-control mb-lg-3 pt-lg-0" required>
                    </div>

                    <div class="form-group">
                      <label for="tax_code" class="form-label">Codice Fiscale</label>
                      <input type="text" class="form-control" required name="tax_code" id="tax_code" value="<?= $association['tax_code'] ?>">
                    </div>

                    <div class="form-group">
                      <label for="phone_number">Conferma password</label>
                      <input
                        class="form-control mb-lg-3 pt-lg-0"
                        type="password"
                        name="confirm_password"
                        data-validation-passwordagain-message='Password non corrisponde'>
                    </div>

                  </div><!-- end col -->
                </div><!-- end row -->

                <div class="form-group">
                  <label for="link" class="form-label">Link</label>
                  <input type="text" class="form-control" required name="link" id="link" value="<?= $association['link'] ?>">
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
                      class="mt-3 center"
                      style="max-width: 350px;">
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
