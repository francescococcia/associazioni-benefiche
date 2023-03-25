<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>
<div class="container text-center">
  <div class="row">
    <div class="col">
      <!-- <h1><#?= print_r($platformManagers) ?>!</h1> -->
      <h1>Welcome to your dashboard, <?= $userData['first_name'] ?>!</h1>
      <p>Your email address is <?= $userData['email'] ?></p>
      <ul>
      <?php foreach ($platformManagers as $platformManager): ?>
          <li>
            Nome associazione: <?php echo $platformManager['name']; ?><br>
            Indirizzo: <?php echo $platformManager['legal_address']; ?><br>
            Codice fiscale: <?php echo $platformManager['tax_code']; ?>
          </li>
      <?php endforeach; ?>
      </ul>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
