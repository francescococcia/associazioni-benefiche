<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>
  <div class="content mb-5">
    <div class="wrap">
      <div class="page-headline-wrap cc-category-headline">
        <h1>Eventi</h1>
        <?php if(session()->get('isPlatformManager')): ?>
          <p class="big-paragraph">Visualizza gli eventi inseriti</p>
          <div class="row">
            <div class="col">
              <a
                class="btn btn-clean btn-c-4129 btn-rd"
                href="<?php echo base_url();?>/events/new">Inserisci evento</a>
            </div>
          </div>
          <?php else: ?>
            <p class="big-paragraph">Visualizza tutti gli eventi o filtra per tipologia</p>
          <?php endif; ?>
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
                        <option value="feste e sagre" <?php if ($category == 'feste e sagre') echo 'selected'; ?>>Feste e sagre</option>
                        <option value="serate di gala" <?php if ($category == 'serate di gala') echo 'selected'; ?>>Serate di gala</option>
                        <option value="spettacoli teatrali" <?php if ($category == 'spettacoli teatrali') echo 'selected'; ?>>Spettacoli teatrali</option>
                        <option value="eventi sportivi" <?php if ($category == 'eventi sportivi') echo 'selected'; ?>>Eventi sportivi</option>
                        <option value="cene" <?php if ($category == 'cene') echo 'selected'; ?>>Cene</option>
                        <option value="sfilate" <?php if ($category == 'sfilate') echo 'selected'; ?>>Sfilate</option>
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
              <div class="card-body">
                  <h5 class="card-title"><strong><?php echo $event['title']; ?></strong></h5>
                  <p class="card-text">Luogo: <?php echo $event['location']; ?></p>
                  <p class="card-text">Data: <?php echo date('d/m/y', strtotime($event['date'])); ?></p>
                  <a href="<?= site_url('events/detail/'.$event['id']) ?>" class="card-link">Dettagli</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else : ?>
        <p>Nessun evento inserito.</p>
      <?php endif; ?>
    </div>
  </div>

<?= $this->endSection() ?>
