<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>

  <link rel="stylesheet" type="text/css" href="<#?= base_url('public/css/admin.css') ?>"/>

  <div class="content mb-5">
    <div class="wrap">
      <div class="page-headline-wrap cc-category-headline">
        <h1>Cassa</h1>
        <p class="big-paragraph">Visualizza il ricavato delle associazioni</p>
      </div>

      <div id="main-content" class="container allContent-section mt-5 py-4">
        <div>
          <?php if (!empty($selectedProducts)): ?>
            <table class="table table-striped table-bordered">
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
                    <td>€<?= number_format($product['total_price'], 2, ',', ' '); ?></td>
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
	</div>
<?= $this->endSection() ?>
