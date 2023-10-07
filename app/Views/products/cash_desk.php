<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>

  <link rel="stylesheet" type="text/css" href="<?= base_url('public/css/admin.css') ?>"/>

  <div class="content mb-5">
    <div class="wrap">
      <div class="page-headline-wrap cc-category-headline">
        <h1>Cassa</h1>
        <p class="big-paragraph">Visualizza il ricavato delle associazioni</p>
      </div>

      <div id="main-content" class="container allContent-section mt-5 py-4">
        <div>
          <?php if (!empty($selectedProducts)): ?>
          <table>
            <thead>
              <tr>
                  <th>Associazione</th>
                  <th>Ricavato</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($selectedProducts as $product): ?>
                  <tr>
                      <td><?= $product['association_name'] ?></td>
                      <td><?= $product['total_price'] ?>€</td>
                  </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <?php else: ?>
            <p>Nessuna transazione presente</p>
        <?php endif; ?>
        </div>
      </div>
    </div>
	</div>
<?= $this->endSection() ?>
