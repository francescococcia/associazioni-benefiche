<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>
<div class="container text-center">
  <h1>Modifica informazioni profilo</h1>
  <form>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Address 2</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="inputState" class="form-control">
        <option selected>Choose...</option>
        <option>...</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" id="inputZip">
    </div>
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Sign in</button>
</form>
  <div class="row">
    <div class="col-12 m-5">
      <!-- <h1><#?= print_r($platformManagers) ?>!</h1> -->
      <div class="align-self-center offset-md-1 col-md-10 col-sm-10 offset-sm-1 offset-1 col-10 col-lg-5 pr-lg-3 offset-lg-3">

        <form method="POST" action="<?= base_url(); ?>/users/update"
          data-form-type="blocs-form" novalidate="" data-success-msg="Your message has been sent."
          data-fail-msg="Sorry it seems that our mail server is not responding, Sorry for the inconvenience!">
          <div class="form-group">
            <label>
              Email
            </label>
            <input type="email" id="email" name="email" placeholder="Email" value="<?= $userData['email']; ?>"
            data-error-validation-msg="Not a valid email address" class="form-control mb-lg-3 pt-lg-0"  required="">
          </div>

          <div class="form-group">
            <label>Nome</label>
            <input class="form-control" type="text" name="first_name" value="<?= $userData['first_name']; ?>" required>
          </div>
          <button class="bloc-button btn btn-d mt-lg-4 btn-invia-style btn-lg float-lg-none" type="submit">
            Accedi
          </button>
        </form>
      </div>
      
    </div>
  </div>
</div>


<form method="POST" action="<?= base_url(); ?>/users/update">
    <label>Email:</label>
    <input type="email" name="email" value="<?= $userData['email']; ?>" required>

    <label>First Name:</label>
    <input type="text" name="first_name" value="<?= $userData['first_name']; ?>" required>

    <label>Last Name:</label>
    <input type="text" name="last_name" value="<?= $userData['last_name']; ?>" required>

    <label>Phone Number:</label>
    <input type="text" name="phone_number" value="<?= $userData['phone_number']; ?>" required>

    <label>Birth Date:</label>
    <input type="date" name="birth_date" value="<?= $userData['birth_date']; ?>" required>

    <label>Password:</label>
    <input type="password" name="password">

    <label>Confirm Password:</label>
    <input type="password" name="confirm_password">

    <button type="submit">Update</button>
</form>

<?= $this->endSection() ?>
