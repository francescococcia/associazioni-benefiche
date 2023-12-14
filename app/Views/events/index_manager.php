<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>
  <link rel="stylesheet" type="text/css" href="<?= base_url('public/css/card.css') ?>"/>

  <div class="content mb-5">
    <div class="wrap">
      <div class="page-headline-wrap cc-category-headline">
        <h1 class="section-heading primary-text">Eventi</h1>

            <p class="big-paragraph">Visualizza o gestisci gli eventi della tua associazione</p>
          <!-- <#?php endif; ?> -->
          <div class="align-self-center col-lg-8 offset-lg-2 text-lg-end text-center">
              <a href="<?php echo base_url();?>/events/new" class="btn btn-d btn-rd box-btn primary-btn float-lg-none fill-mob-btn">Crea nuovo evento</a>
            </div>
      </div>
    </div>
    <div class="text-center text-md-start col-md-12 align-self-center ps-0 pe-0 ps-sm-2 pe-sm-2 mb-3 mb-md-4 text-lg-center col-lg-12">

      <a href="<?php echo base_url('/events-manager?category=Feste e sagre'); ?>" class="a-btn text-lg-left mt-lg-3 token-link <?= ($category == 'Feste e sagre') ? 'active' : ''; ?>">Feste e sagre</a>
      <a href="<?php echo base_url('/events-manager?category=Mercatini'); ?>" class="a-btn text-lg-left token-link <?= ($category == 'Mercatini') ? 'active' : ''; ?>">Mercatini</a>
      <a href="<?php echo base_url('/events-manager?category=Sport'); ?>" class="a-btn text-lg-left token-link <?= ($category == 'Sport') ? 'active' : ''; ?>">Sport</a>
      <a href="<?php echo base_url('/events-manager?category=Cucina'); ?>" class="a-btn text-lg-left token-link <?= ($category == 'Cucina') ? 'active' : ''; ?>">Cucina</a>
      <a href="<?php echo base_url('/events-manager?category=Ambiente'); ?>" class="a-btn text-lg-left token-link <?= ($category == 'Ambiente') ? 'active' : ''; ?>">Ambiente</a>
      <a href="<?php echo base_url('/events-manager?category=Cultura'); ?>" class="a-btn text-lg-left token-link <?= ($category == 'Cultura') ? 'active' : ''; ?>">Cultura</a>
      <a href="<?php echo base_url('/events-manager?category=Altro'); ?>" class="a-btn text-lg-left token-link <?= ($category == 'Altro') ? 'active' : ''; ?>">Altro</a>
      <a href="<?php echo base_url('/events-manager?category='); ?>"><i class="fa-solid fa-arrow-left"></i></a>
    </div>
  </div>

  <div class="container mt-4 mb-4">
    <div class="row justify-content-center mb-4">
      <?php if ($events) : ?>
        <?php foreach ($events as $event) : ?>
          <a style="text-decoration:none; color:black !important;" href="<?= site_url('event/detail/'.$event['id']) ?>">
            <div class="wrapper shadow mr-3 mb-3">
              <div class="container p-0">
              <div class="top"
                style="
                background: url('<?= !empty($event['image']) && file_exists('uploads/events/'.$event['image']) ? base_url('uploads/events/'.$event['image']) : base_url('public/img/yehorlisnyi210400016.jpg'); ?>') no-repeat center center;
                -webkit-background-size: 100%;
                -moz-background-size: 100%;
                -o-background-size: 100%;"
                >
                <!-- background-size: 100%;" -->
                </div>
                <div class="bottom">
                  <div class="left">
                    <div class="details pl-3 pt-2">
                      <p class="card-text" style='font-weight: bold;font-size:15px;'><?= formatDateItalian($event['date']); ?></p>
                      <?php if (strlen($event['title']) > 20) : ?>
                        <h5 class="card-title">
                          <strong><?= (substr($event['title'], 0, 20).'...'); ?></strong>
                        </h5>
                      <?php else : ?>
                        <h5 class="card-title">
                          <strong><?= $event['title']; ?></strong>
                        </h5>
                      <?php endif; ?>
                      <!-- <p><#?= $event['category'] ?></p> -->
                    </div>
                    <!-- <div class="buy"><i class="fa-solid fa-shopping-cart"></i></div> -->
                  </div>
                </div>
              </div>
            </div>
          </a>
          <?php endforeach; ?>
        <?php else : ?>
          <p>Nessun evento inserito.</p>
        <?php endif; ?>
    </div>
    <?php if ($pager) : ?>
      <?= $pager->links() ?>
    <?php endif; ?>
  </div>

  <style>
    a, a:focus, a:active {
    text-decoration: none;
    color: inherit;
    }
    a:hover {
      color: rgba(255,38,0,1.00)
    }
    .card-img {
        width: 100%; /* Adjust the width to fit the card */
        height: 250px; /* Define a fixed height for uniformity */
        object-fit: cover; /* Crop the image to cover the container */
    }
    /* event */

    .post_image {
      position: relative;
      background-color: #e79999;
    }

    .image {
      opacity: 1;
      display: block;
      width: 100%;
      transition: .5s ease;
      backface-visibility: hidden;
    }

    .middle {
      transition: .5s ease;
      opacity: 0;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
      text-align: center;
    }

    .post_image:hover .image {
      opacity: 0.3;
    }

    .post_image:hover .middle {
      opacity: 1;
    }

    .text {
      color: white;
      font-size: 25px;
      padding: 16px 32px;
    }
    /* endevent */
    .token-link:hover,
    .token-link.active {
        background-color: #ff8300;
        font-weight: bold;
    }

  </style>

<?= $this->endSection() ?>
