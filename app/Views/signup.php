<?= $this->extend('Layout/default') ?>required
<?= $this->section('content') ?>

  <div class="content mb-5">
		<div class="wrap">
			<div class="page-headline-wrap cc-category-headline">
				<h1>Modulo di registrazione</h1>
				<p class="big-paragraph">Inserisci le seguenti informazioni</p>
			</div>

			<div class="row">
				<div class="col-12 d-flex justify-content-center align-items-center">
					<div class="col-12 col-md-8 col-lg-6">

            <form action="<?php echo base_url(); ?>/SignupController/store" method="post"
              id="form_18619" data-form-type="blocs-form" novalidate=""
              data-success-msg="Your message has been sent." data-fail-msg="Sorry it seems that our mail server is not responding, Sorry for the inconvenience!">
              <div class="card">
                <div class="card-body">
                  <div class="form-group">
                    <label>Nome</label>
                    <input type="text" name="first_name" placeholder="Inserisci il nome" required value="<?= set_value('first_name') ?>" class="form-control mb-lg-3">
                  </div>

                  <div class="form-group">
                    <label>Cognome</label>
                    <input type="text" name="last_name" placeholder="Inserisci il cognome" required="" class="form-control" value="<?= set_value('last_name') ?>">
                  </div>

                  <div class="form-group">
                    <label>Numero di telefono</label>
                    <input
                      type="text"
                      name="phone_number"
                      placeholder="Inserisci il numero di telefono"
                      required
                      value="<?= set_value('phone_number') ?>"
                      class="form-control mb-lg-3"
                      pattern="[0-9]+"
                    >
                  </div>

                  <div class="form-group">
                    <label>Data di nascinta</label>
                    <input type="date" name="birth_date" placeholder="Data di nascita" required="" class="form-control" value="<?= set_value('birth_date') ?>" id='txtDate'>
                  </div>

                  <div class="form-group">
                    <label>Email</label>
                    <input name="email" placeholder="email" class="form-control mb-lg-3 pt-lg-0" type="email" value="<?= set_value('email') ?>"
                      data-error-validation-msg="Email non valida" required="">
                  </div>

                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Password" class="form-control mb-lg-3 pt-lg-0"
                        required minlength="4"
                        data-validation-minlength-message="La password deve essere almeno di '4' caratteri">
                  </div>

                  <div class="form-group">
                      <label>Conferma Password</label>
                      <input
                        type="password"
                        name="confirmpassword"
                        placeholder="Inserisci la Password"
                        class="form-control mb-lg-3 pt-lg-0"
                        required
                        data-validation-passwordagain-message='Password non corrisponde'
                      >
                  </div>

                  <div class="form-check">
                    <!-- <input class="form-check-input" type="checkbox" id="optin_49815_18619" data-validation-minchecked-minchecked="1" name="optin_49815"> -->
                    <!-- <label class="form-check-label">
                      Ricevi aggiornamenti via mail
                    </label> -->
                  </div>
                  <div class="text-center">
                    <button class="btn btn-clean float-lg-none btn-c-4129 btn-rd mt-lg-4" type="submit">
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

<script>
  $(document).ready(function () {
    var dtToday = new Date();

    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();

    var maxDate = year + '-' + month + '-' + day;

    // or instead:
    // var maxDate = dtToday.toISOString().substr(0, 10);

    $('#txtDate').attr('max', maxDate);
  });
</script>

<?= $this->endSection() ?>
