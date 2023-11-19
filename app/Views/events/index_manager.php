<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>
<div class="bloc l-bloc" id="bloc-4">
	<div class="container bloc-md-lg bloc-md">
		<div class="row">
			<div class="text-center text-md-start col-md-12 col-lg-4 align-self-center mb-4 ps-0 pe-0 ps-sm-2 pe-sm-2 ps-lg-3 pe-lg-3">
				<h3 class="section-heading primary-text mb-0">
					Eventi<br>
				</h3>
			</div>
			<div class="col">
				<div>
				</div>
			</div>
			<div class="text-center text-md-start col-md-12 align-self-center ps-0 pe-0 ps-sm-2 pe-sm-2 mb-3 mb-md-4 text-lg-center col-lg-12">
				<div class="bento-box pt-lg-3 pb-lg-3 shadow">
					<div class="row">
						<div class="col-lg-8 align-self-center">
							<p class="tc-2190 box-info mb-3 text-center text-lg-start mb-lg-0 p-bloc-4-style">
								Visualizza o gestisci gli eventi della tua associazione<br>
							</p>
						</div>
						<div class="align-self-center col-lg-3 offset-lg-1 text-lg-end text-center">
							<a href="<?php echo base_url();?>/events/new" class="btn btn-d btn-rd box-btn primary-btn float-lg-none fill-mob-btn">Crea nuovo evento</a>
						</div>
					</div>
				</div>
          <a href="<?php echo base_url('/events-manager?category=Feste e sagre'); ?>" class="a-btn text-lg-left mt-lg-3 token-link <?= ($category == 'Feste e sagre') ? 'active' : ''; ?>">Feste e sagre</a>
          <a href="<?php echo base_url('/events-manager?category=Mercatini'); ?>" class="a-btn text-lg-left token-link <?= ($category == 'Mercatini') ? 'active' : ''; ?>">Mercatini</a>
          <a href="<?php echo base_url('/events-manager?category=Sport'); ?>" class="a-btn text-lg-left token-link <?= ($category == 'Sport') ? 'active' : ''; ?>">Sport</a>
          <a href="<?php echo base_url('/events-manager?category=Cucina'); ?>" class="a-btn text-lg-left token-link <?= ($category == 'Cucina') ? 'active' : ''; ?>">Cucina</a>
          <a href="<?php echo base_url('/events-manager?category=Ambiente'); ?>" class="a-btn text-lg-left token-link <?= ($category == 'Ambiente') ? 'active' : ''; ?>">Ambiente</a>
          <a href="<?php echo base_url('/events-manager?category=Altro'); ?>" class="a-btn text-lg-left token-link <?= ($category == 'Altro') ? 'active' : ''; ?>">Altro</a>
          <a href="<?php echo base_url('/events-manager?category='); ?>" class="a-btn text-lg-left token-link">Annulla</a>
			</div>
		</div>
	</div>
</div>

<div class="container mt-4 mb-4">
    <div class="row justify-content-center">
      <?php if ($events) : ?>
        <?php foreach ($events as $event) : ?>
          <div class="col-auto mb-3">
            <div class="card" style="width: 18rem;">
              <a href="<?= site_url('events/detail/'.$event['id']) ?>">
                <div class="post_image">
                  <?php if ($event['image']) : ?>
                    <img
                      src="<?= base_url('uploads/events/'.$event['image']); ?>"
                      data-src="<?= base_url('uploads/events/'.$event['image']); ?>"
                      class="card-img image"
                      alt="Immagine non caricata"
                    >
                  <?php else : ?>
                      <img
                      src="<?= base_url('public/img/yehorlisnyi210400016.jpg'); ?>"
                      data-src="<?= base_url('public/img/yehorlisnyi210400016.jpg'); ?>"
                      class="card-img image"
                      alt="Immagine non caricata"
                    >
                  <?php endif; ?>
                  <div class="middle">
                    <div class="text"><i class="fa-solid fa-eye"></i></div>
                  </div>

                </div>
              </a>

              <div class="card-body">
                <p class="card-text" style='font-weight: bold;'><?= formatDateItalian($event['date']); ?></p>
                  <a href="<?= site_url('events/detail/'.$event['id']) ?>">
                  <?php if (strlen($event['title']) > 20) : ?>
                    <h5 class="card-title"><strong><?= (substr($event['title'], 0, 20).'...'); ?></strong></h5>
                    <?php else : ?>
                      <h5 class="card-title"><strong><?= $event['title']; ?></strong></h5>
                  <?php endif; ?>
                  </a>
              </div>
            </div>
          </div>
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
      color: #e79999
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
