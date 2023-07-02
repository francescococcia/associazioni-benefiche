<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>
<div class="container text-center">
  <h1>Lista delle associazioni iscritte</h1>
  <div class="row">
    <div class="col-12 m-5">
      <!-- <h1><#?= print_r($platformManagers) ?>!</h1> -->

      <div class="card-group">
        <?php foreach ($platformManagers as $platformManager): ?>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><?php echo $platformManager['name']; ?></h5>
              <p class="card-text">Indirizzo: <?php echo $platformManager['legal_address']; ?></p>
              <p class="card-text">Codice fiscale: <?php echo $platformManager['tax_code']; ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
