<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>
  <div class="content mb-5">
    <div class="wrap">
      <div class="page-headline-wrap cc-category-headline">
        <h1>Prodotti prenotati</h1>
        <p class="big-paragraph">Visualizza i prodotti prenotati</p>
      </div>

      <div class="col-md-12 col-sm-6">
        <div class="card">
          <div class="card-body">
            <div class="container mt-4 mb-4">
              <div class="row justify-content-center">
                <?php if (!empty($products)) : ?>
                  <?php foreach ($products as $productId => $product) : ?>
                    <?php if ($product['bookedCount'] > 0) : ?>
                      <div class="col-md-12 mb-3">
                        <h5><strong><?php echo $product['name']; ?></strong></h5>
                        <div class="d-flex justify-content-between">
                          <p class="mb-0">Descrizione: <?php echo $product['description']; ?></p>
                          <p class="mb-0">Quantità: <?= $product['bookedCount']; ?></p>
                          <p class="mb-0">Prezzo: <?= $product['price'] ?></p>
                          <a href="<?= site_url('product/detail/'.$product['id']) ?>" class="card-link">Dettagli</a>
                        </div>
                        <hr>
                      </div>
                    <?php endif; ?>
                  <?php endforeach; ?>
                <?php else : ?>
                  <p>Nessun prodotto presente.</p>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?= $this->endSection() ?>
