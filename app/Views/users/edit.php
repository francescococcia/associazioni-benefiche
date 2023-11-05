<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>
<div class="content mb-5">
		<div class="wrap">
			<div class="page-headline-wrap cc-category-headline">
				<h1>Informazioni Utente</h1>
				<p class="big-paragraph">Modifica le seguenti informazioni</p>
			</div>

			<div class="row">
				<div class="col-12 d-flex justify-content-center align-items-center">
					<div class="col-12 col-md-8 col-lg-6">

          <form method="POST" action="<?= base_url(); ?>/users/update" data-form-type="blocs-form" novalidate="">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
              <div class="card-body">
                <div class="form-group">
                  <label for="inputEmail4">Email</label>
                  <input type="email" id="email" name="email" placeholder="Inserisci email" value="<?= $userData['email']; ?>"
                    data-error-validation-msg="Email non valida" class="form-control mb-lg-3 pt-lg-0" required>
                </div>

                <div class="form-group">
                  <label for="first_name">Nome</label>
                  <input class="form-control mb-lg-3 pt-lg-0" required placeholder="Inserisci nome" type="text" name="first_name" value="<?= $userData['first_name']; ?>">
                </div>

                <div class="form-group ">
                  <label for="last_name">Cognome</label>
                  <input class="form-control mb-lg-3 pt-lg-0" required placeholder="Inserisci cognome" type="text" name="last_name" value="<?= $userData['last_name']; ?>">
                </div>

                <div class="form-group">
                  <label for="phone_number">Telefono</label>
                  <input class="form-control mb-lg-3 pt-lg-0" required placeholder="Inserisci telefono" type="text" name="phone_number" value="<?= $userData['phone_number']; ?>">
                </div>

                <div class="form-group">
                  <label for="birth_date">Data di nascita</label>
                  <input class="form-control mb-lg-3 pt-lg-0" required type="date" name="birth_date" value="<?= $userData['birth_date']; ?>">
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

                <div class="form-group">
                  <label for="phone_number">Conferma password</label>
                  <input
                    class="form-control mb-lg-3 pt-lg-0"
                    type="password"
                    name="confirm_password"
                    data-validation-passwordagain-message='Password non corrisponde'>
                </div>

                <div class="text-center">
                  <button class="btn btn-clean float-lg-none btn-c-4129 btn-rd mt-lg-4" type="submit">
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
