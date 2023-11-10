<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>
  <div class="content mb-5">
    <div class="wrap">
      <div class="page-headline-wrap cc-category-headline">
        <h1>Tutti gli Eventi</h1>
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
            <p class="big-paragraph">Visualizza tutti gli eventi o filtra per tipologia</p>
          <!-- <#?php endif; ?> -->
      </div>

    </div>
	</div>

  <div class="content mb-5">
    <div class="wrap">

      <div class="row">
        <div class="col-12 d-flex justify-content-center align-items-center">
          <div class="col-12 col-md-8 col-lg-6">

            <form  method="GET" action="<?= base_url(); ?>/events">
              <div class="row">

                <div class="col-md-12">
                  <div class="input-group mb-3">
                    <select class='form-control search input-text' name="category" id="category">
                        <option value='' selected>Seleziona tipologia</option>
                        <option value="Feste e sagre" <?php if ($category == 'Feste e sagre') echo 'selected'; ?>>Feste e sagre</option>
                        <option value="Mercatini" <?php if ($category == 'Mercatini') echo 'selected'; ?>>Mercatini</option>
                        <option value="Spettacoli teatrali" <?php if ($category == 'Spettacoli teatrali') echo 'selected'; ?>>Spettacoli teatrali</option>
                        <option value="Eventi sportivi" <?php if ($category == 'Eventi sportivi') echo 'selected'; ?>>Eventi sportivi</option>
                        <option value="Eventi culinari" <?php if ($category == 'Eventi culinari') echo 'selected'; ?>>Eventi culinari</option>
                        <option value="Sfilate" <?php if ($category == 'Sfilate') echo 'selected'; ?>>Sfilate</option>
                        <option value="Talk" <?php if ($category == 'Talk') echo 'selected'; ?>>Talk</option>
                        <option value="Altro" <?php if ($category == 'Altro') echo 'selected'; ?>>Altro</option>
                    </select>

                    <div class="input-group-append">
                      <button class="btn btn-outline-warning btn-md yellow" type="submit">
                        <i class="fa fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
          </form>
          </div>
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
    <!-- Display Pagination Links -->
    <?php if ($events) : ?>
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
  </style>

<?= $this->endSection() ?>
