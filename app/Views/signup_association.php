<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>

  <div class="content mb-5">
    <div class="wrap">
      <div class="page-headline-wrap cc-category-headline">
        <h1>Modulo di registrazione</h1>
        <p class="big-paragraph">Inserisci le informazioni della tua associazione</p>
      </div>

      <div class="row">
        <div class="col-12 d-flex justify-content-center align-items-center">
          <div class="col-12 col-md-8 col-lg-6">
          <form action="<?php echo base_url(); ?>/SignupAssociationController/store" method="post" enctype="multipart/form-data"
            data-form-type="blocs-form" novalidate=""
            data-success-msg="Your message has been sent." data-fail-msg="Sorry it seems that our mail server is not responding, Sorry for the inconvenience!">

            <div class="card">
              <div class="card-body">
                <div class="form-group">
                  <label>Nome Associazione</label>
                  <input type="text" name="name" placeholder="Inserisci nome" required="" value="<?= set_value('name') ?>" class="form-control mb-lg-3" >
                </div>

                <div class="form-group">
                  <label>Codice Fiscale</label>
                  <input type="text" name="tax_code" placeholder="Inserisci Codice fiscale" required="" class="form-control" required="" value="<?= set_value('tax_code') ?>">
                </div>

                <div class="form-group">
                  <label>Sede Legale</label>
                  <input
                    name="legal_address"
                    placeholder="Sede Legale"
                    class="form-control mb-lg-3 pt-lg-0"
                    type="text"
                    value="<?= set_value('legal_address') ?>"
                    required="">
                </div>

                <div class="form-group">
                  <label>Email</label>
                  <input
                    name="email"
                    placeholder="Inserisci email"
                    class="form-control mb-lg-3 pt-lg-0"
                    type="email"
                    value="<?= set_value('email') ?>"
                    data-error-validation-msg="Email non valida"
                    required="">
                </div>

                <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="password" placeholder="Password" class="form-control mb-lg-3 pt-lg-0" required="">
                </div>

                <div class="form-group">
                  <label>Conferma Password</label>
                  <input
                    type="password"
                    name="confirmpassword"
                    placeholder="Conferma Password"
                    class="form-control mb-lg-3 pt-lg-0"
                    required
                    data-validation-passwordagain-message='Password non corrisponde'
                  >
                </div>

                <div class="mb-3">
                  <label for="description" class="form-label">Descrizione</label>
                  <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                </div>

                <div class="form-group">
                  <label for="image" class="form-label">Image</label>
                  <div class="input_container">
                    <input type="file" id="image" name="image" accept=".jpg, .jpeg, .png, .gif">
                  </div>
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

<?= $this->endSection() ?>
