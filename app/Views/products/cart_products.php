<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>

<link rel="stylesheet" type="text/css" href="<?= base_url('public/css/admin.css') ?>"/>
  <div class="content mb-5">
    <div class="wrap">
      <div class="page-headline-wrap cc-category-headline">
        <h1>Prodotti prenotati</h1>
        <p class="big-paragraph">Visualizza i prodotti prenotati</p>
      </div>
    </div>

    <div id="main-content" class="container allContent-section mt-5 py-4">
        <div>
          <?php if (!empty($products)): ?>
            <table>
              <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th>Prodotto</th>
                    <th>Prezzo</th>
                    <th>Quantità</th>
                    <th>Totale</th>
                </tr>
              </thead>
              <tbody>
                  <?php foreach ($products as $productId => $product) : ?>
                  <tr>
                    <td></td>
                    <td>
                    <?php if ($product['image']) : ?>
                        <img
                          src="<?= base_url('uploads/products/'.$product['image']); ?>"
                          data-src="<?= base_url('uploads/products/'.$product['image']); ?>"
                          alt="<?= $product['image']; ?>"
                          width='100'
                          height='100'
                        >
                      <?php else : ?>
                        <img
                        src="<?= base_url('public/img/yehorlisnyi210400016.jpg'); ?>"
                        data-src="<?= base_url('public/img/yehorlisnyi210400016.jpg'); ?>"
                        alt="Immagine non caricata"
                        width='100'
                        height='100'
                        >
                      <?php endif; ?>
                    </td>
                    <td><?= $product['description'] ?></td>
                    <td>€<?= number_format($product['price'], 2, ',', ' '); ?></td>
                    <td><?= $product['bookedCount']; ?></td>
                    <td>€<?= number_format($product['price'] * $product['bookedCount'], 2, ',', ' '); ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          <?php else: ?>
            <div class="row justify-content-center">
            <p>Nessuna transazione presente</p>
            </div>
          <?php endif; ?>
        </div>
      </div>
  </div>

<?= $this->endSection() ?>
