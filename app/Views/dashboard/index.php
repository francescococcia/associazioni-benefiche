<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>

  <div class="content mb-5">
    <div class="wrap">
      <div class="page-headline-wrap cc-category-headline">
        <h1>Dettagli</h1>
        <p class="big-paragraph">Informazioni riguardo l'associazione</p>
      </div>

      <div class="row">
        <div class="col-12 m-5">
          <div class="card">
            <div class="card-body">
              <p><strong>Nome:</strong> <?= $association['name']; ?></p>
              <p><strong>Indirizzo:</strong> <?= $association['legal_address']; ?></p>
              <p><strong>Codice Fiscale:</strong> <?= $association['tax_code']; ?></p>
            </div>
          </div>
          <!-- <h1><#?= print_r($platformManagers) ?>!</h1> -->
          <a href="<?= site_url('associations/create') ?>">Create Association</a>
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
  </div>
<?= $this->endSection() ?>
