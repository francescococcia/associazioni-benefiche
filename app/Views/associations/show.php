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
              <p><strong>Descrizione:</strong> <?= $association['description']; ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?= $this->endSection() ?>
