<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>
  <div class="content mb-5">
    <div class="wrap">
      <div class="page-headline-wrap cc-category-headline">
        <h1>Tutti i prodotti</h1>
        <?php if(session()->get('isPlatformManager')): ?>
          <p class="big-paragraph">Inserisci un nuovo prodotto</p>
          <div class="row">
            <div class="col">
              <a
                class="btn btn-clean btn-c-4129 btn-rd"
                href="<?php echo base_url();?>/store/new">Inserisci Prodotto</a>
            </div>
          </div>
          <?php else: ?>
            <p class="big-paragraph">Visualizza i prodotti inseriti</p>
          <?php endif; ?>
      </div>

    </div>
	</div>

  <div class="container mt-4 mb-4">
    <div class="row justify-content-center">
      <div class="grid-container">
        <?php if ($products) : ?>
          <?php foreach ($products as $product) : ?>
            <div class="grid-item">
              <span class="onsale out-of-stock-button"><span>Out of stock</span></span>
              <a href="<?= site_url('product/detail/'.$product['id']) ?>">
                <?php if ($product['image']) : ?>
                  <img
                    src="<?= base_url('uploads/products/'.$product['image']); ?>"
                    data-src="<?= base_url('uploads/products/'.$product['image']); ?>"
                    class=""
                    alt="<?= $product['image']; ?>"
                  >
                  <?php else : ?>
                    <img
                    src="<?= base_url('public/img/yehorlisnyi210400016.jpg'); ?>"
                    data-src="<?= base_url('public/img/yehorlisnyi210400016.jpg'); ?>"
                    class=""
                    alt="Immagine non caricata"
                  >
                <?php endif; ?>

                <div class="overlay">
                  <div class="row text-center">
                    <div class="col">

                      <h2><?= $product['name']; ?></h2><br>
                      <p><strong>€<?= $product['price']; ?></strong></p>
                    </div>
                  </div>
                </div>
              </a>
            </div>

          <?php endforeach; ?>
        <?php else : ?>
          <p>Nessun prodotto inserito.</p>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <style>

    /* Style for the grid container */
    .grid-container {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      grid-gap: 10px;
    }

    /* Style for each grid item */
    .grid-item {
      position: relative;
      overflow: hidden;
    }

    .grid-item img {
      width: 100%;
      height: 100%;
      display: block;
      transition: transform 0.3s ease;
    }

    /* Overlay style */
    .overlay {
      position: absolute;
      top: 0;
      left: 0;
      background: rgba(0, 0, 0, 0.5);
      color: #fff;
      width: 100%;
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      opacity: 0;
      transition: opacity 0.3s ease;
    }

    /* Show overlay on hover */
    .grid-item:hover .overlay {
      opacity: 1;
    }

    /* Zoom effect on image hover */
    .grid-item:hover img {
      transform: scale(1.1);
    }

    .out-of-stock-button{
      font-family: Raleway, sans-serif;
    font-size: 12px;
    line-height: 18px;
    font-weight: 700;
    font-style: normal;
    text-transform: uppercase;
    }
    .grid-item .out-of-stock-button {
      position: absolute;
      bottom: 0;
      right: 0;
      padding: 10px 20px;
    }
    .grid-item::before {
      content: '';
      background: white;
      position: absolute;
      top: 0;
      left: 0;
      bottom: 0;
      right: 0;
      transform: rotate(-45deg) translateY(75%);
    }

  </style>
<?= $this->endSection() ?>

