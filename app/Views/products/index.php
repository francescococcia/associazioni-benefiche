<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>
  <div class="content mb-5">
    <div class="wrap">
      <div class="page-headline-wrap cc-category-headline">
        <h1>Tutti i prodotti</h1>
        <?php if(session()->get('isPlatformManager')): ?>
          <p class="big-paragraph">Visualizza i prodotti inserti</p>
          <div class="row">
            <div class="col">
              <a
                class="btn btn-clean btn-c-4129 btn-rd"
                href="<?php echo base_url();?>/store/new">Inserisci Prodotto</a>
            </div>
          </div>
          <?php else: ?>
            <p class="big-paragraph">Acquista un prodotto</p>
          <?php endif; ?>
      </div>

    </div>
	</div>

  <div class="container mt-4 mb-4">
    <div class="row justify-content-center">
      <?php if ($products) : ?>
        <?php foreach ($products as $product) : ?>
          <div class="col-auto mb-3">
            <div class="card" style="width: 18rem;">
              <div class="card-body">
                  <h5 class="card-title"><strong><?php echo $product['name']; ?></strong></h5>
                  <p class="card-text">Descrizione: <?php echo $product['description']; ?></p>
                  <p class="card-text">Prezzo: <?php echo $product['price']; ?></p>
                  <a href="<?= site_url('product/detail/'.$product['id']) ?>" class="card-link">Dettagli</a>
                </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else : ?>
        <p>Nessun prodotto inserito.</p>
      <?php endif; ?>
    </div>
  </div>
<?= $this->endSection() ?>

