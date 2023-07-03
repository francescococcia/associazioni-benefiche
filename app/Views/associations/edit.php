<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>
<div class="container text-center">
  <h1>Modifica informazioni profilo</h1>

  <div class="row">
    <div class="col-12 m-5">
      <form method="POST" action="<?= base_url(); ?>/associations/update">
        <div class="card">
          <div class="card-body">
            <div class="form-group">
              <label for="inputEmail4">Email</label>
              <input type="text" id="email" name="email" placeholder="Email" value="<?= $associationData['name']; ?>"
                data-error-validation-msg="Not a valid email address" class="form-control mb-lg-3 pt-lg-0"  required="">
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="first_name">Nome</label>
                <input class="form-control mb-lg-3 pt-lg-0" type="text" name="first_name" value="<?= $associationData['first_name']; ?>" required>
              </div>
              <div class="form-group col-md-6">
                <label for="last_name">Cognome</label>
                <input class="form-control mb-lg-3 pt-lg-0" type="text" name="last_name" value="<?= $associationData['last_name']; ?>" required>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="phone_number">Telefono</label>
                <input class="form-control mb-lg-3 pt-lg-0" type="text" name="phone_number" value="<?= $associationData['phone_number']; ?>" required>
              </div>
              <div class="form-group col-md-6">
                <label for="birth_date">Data di nascita</label>
                <input class="form-control mb-lg-3 pt-lg-0" type="date" name="birth_date" value="<?= $associationData['birth_date']; ?>" required>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="password">Passworrd</label>
                <input class="form-control mb-lg-3 pt-lg-0" type="password" name="password">
              </div>
              <div class="form-group col-md-6">
                <label for="phone_number">Conferma password</label>
                <input class="form-control mb-lg-3 pt-lg-0" type="password" name="confirm_password">
              </div>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
