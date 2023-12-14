<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>
  <link rel="stylesheet" type="text/css" href="<?= base_url('public/css/card.css') ?>"/>

  <div class="content mb-5">
    <div class="wrap">
      <div class="page-headline-wrap cc-category-headline">
        <h1 class="section-heading primary-text">Prodotti</h1>
        <!-- <#?php if(session()->get('isPlatformManager')): ?>
          <p class="big-paragraph">Visualizza gli eventi inseriti</p>
          <div class="row">
            <div class="col">
              <a
                class="btn btn-clean btn-c-4129 btn-rd"
                href="<#?php echo base_url();?>/events/new">Inserisci evento</a>
            </div>
          </div>
          <#?php else: ?> -->
            <p class="big-paragraph">Visualizza o gestisci i prodotti della tua associazione</p>
          <!-- <#?php endif; ?> -->
          <div class="align-self-center col-lg-8 offset-lg-2 text-lg-end text-center">
            <a href="<?php echo base_url();?>/store/new" class="btn btn-d btn-rd box-btn primary-btn float-lg-none fill-mob-btn">Inserisci prodotto</a>
          </div>
      </div>
    </div>
  </div>

  <div class="container mt-4 mb-4">
    <div class="row justify-content-center mb-4">
      <?php if ($products) : ?>
        <?php foreach ($products as $product) : ?>
          <a style="text-decoration:none; color:black !important;" href="<?= site_url('product/detail/'.$product['id']) ?>">
            <div class="wrapper shadow mr-3 mb-3">
              <div class="container p-0">
              <div class="top"
                style="
                background: url('<?= !empty($product['image']) && file_exists('uploads/products/'.$product['image']) ? base_url('uploads/products/'.$product['image']) : base_url('public/img/yehorlisnyi210400016.jpg'); ?>') no-repeat center center;
                -webkit-background-size: 100%;
                -moz-background-size: 100%;
                -o-background-size: 100%;"
                >
                <!-- background-size: 100%;" -->
                </div>
                <div class="bottom">
                  <div class="left">
                    <div class="details pl-3 pt-2">
                      <?php if (strlen($product['name']) > 20) : ?>
                        <h5 class="card-title"><strong><?= (substr($product['name'], 0, 20).'...'); ?></strong></h5>
                      <?php else : ?>
                        <h5 class="card-title"><strong><?= $product['name']; ?></strong></h5>
                      <?php endif; ?>
                      <p>€<?= number_format($product['price'], 2, ',', ' '); ?></p>
                    </div>
                    <!-- <div class="buy"><i class="fa-solid fa-shopping-cart"></i></div> -->
                  </div>
                  <!-- <div class="right">
                    <div class="done"><i class="material-icons">done</i></div>
                    <div class="details">
                      <h1>Chair</h1>
                      <p>Added to your cart</p>
                    </div>
                    <div class="remove"><i class="material-icons">clear</i></div>
                  </div> -->
                </div>
              </div>
              <?php if ($product['quantityAvailable'] < 1) : ?>
                <div class="inside">
                  <div class="icon"><i class="fa-solid fa-ban"></i></div>
                </div>
              <?php endif; ?>
            </div>
          </a>
          <?php endforeach; ?>
        <?php else : ?>
          <p>Nessun prodotto inserito.</p>
        <?php endif; ?>
    </div>
    <?php if ($pager) : ?>
      <?= $pager->links() ?>
    <?php endif; ?>
  </div>

<?= $this->endSection() ?>
