<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>

  <div class="content mb-5">
    <div class="wrap">
      <div class="page-headline-wrap cc-category-headline">
        <h1>Dettagli</h1>
        <p class="big-paragraph">Informazioni riguardo l'associazione</p>
      </div>
    </div>

    <div class="row d-flex align-items-stretch">
      <div class="col-md-3 col-sm-6 offset-lg-3">
        <div class="card">
          <div class="card-body">
            <div class="text-center mb-4">
              <h3><strong><?= $association['name']; ?></strong></h3>
            </div>
            <picture>
              <img src="<?php echo base_url('uploads/'.$association['image']); ?>"
                data-src="<?php echo base_url('uploads/'.$association['image']); ?>"
                class="img-fluid img-rd-lg lazyload mb-5 center"
                alt="<?php echo $association['image']; ?>" width="350" height="350">
            </picture>
            <p><strong>Sede Legale:</strong> <?= $association['legal_address']; ?></p>
            <p><strong>Codice Fiscale:</strong> <?= $association['tax_code']; ?></p>
            <p><strong>Descrizione:</strong> <?= $association['description']; ?></p>
            <?php if ($association['link']) : ?>
              <p><strong>Link:</strong> <a href='<?= $association['link']; ?>'><?= $association['link']; ?></a></p>
              <?php else : ?>
                <p><strong>Link:</strong> Link non presente</p>
            <?php endif; ?>
          </div>
        </div>
      </div>

      <div class="col-md-5 col-sm-6">
        <div class="card">
          <div class="card-body">
            <h4>Eventi</h4>
            <hr>
            <div class="container mt-4 mb-4">
              <div class="row justify-content-center">
                <?php if ($events) : ?>
                  <?php foreach ($events as $event) : ?>
                    <div class="col-md-12 mb-3">
                      <h5><strong><?php echo $event['title']; ?></strong></h5>
                      <div class="d-flex justify-content-between">
                        <p class="mb-0">Luogo: <?php echo $event['location']; ?></p>
                        <p class="mb-0">Data: <?php echo date('d/m/y', strtotime($event['date'])); ?></p>
                        <a href="<?= site_url('events/detail/' . $event['id']) ?>" class="card-link">Dettagli</a>
                      </div>
                    </div>
                  <?php endforeach; ?>
                <?php else : ?>
                  <p>Nessun evento inserito.</p>
                <?php endif; ?>
              </div>
            </div>

            <h4>Prodotti</h4>
            <hr>
            <div class="container mt-4 mb-4">
              <div class="row justify-content-center">
                <?php if ($products) : ?>
                  <?php foreach ($products as $product) : ?>
                    <div class="col-12 mb-3">
                      <h5><strong><?php echo $product['name']; ?></strong></h5>
                      <div class="d-flex justify-content-between">
                        <p class="mb-0">Descrizione: <?php echo $product['description']; ?></p>
                        <p class="mb-0">Prezzo: <?php echo $product['price']; ?></p>
                        <a href="<?= site_url('product/detail/'.$product['id']) ?>" class="card-link">Dettagli</a>
                      </div>
                    </div>
                  <?php endforeach; ?>
                <?php else : ?>
                  <p>Nessun prodotto inserito.</p>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <style>
    .center {
      display: block;
      margin-left: auto;
      margin-right: auto;
      width: 60%;
    }
  </style>
<?= $this->endSection() ?>
