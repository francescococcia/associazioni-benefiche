<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>
  <div class="content mb-5">
    <div class="wrap">
      <div class="page-headline-wrap cc-category-headline">
        <h1>Eventi</h1>
        <?php if(session()->get('isPlatformManager')): ?>
          <p class="big-paragraph">Visualizza gli eventi inserti</p>
          <div class="row">
            <div class="col">
              <a
                class="btn btn-clean btn-c-4129 btn-rd"
                href="<?php echo base_url();?>/events/new">Aggiungi evento</a>
            </div>
          </div>
          <?php else: ?>
            <p class="big-paragraph">Partecipa ad un evento</p>
          <?php endif; ?>
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
        <p>Nessun evento trovato.</p>
      <?php endif; ?>
    </div>
  </div>

<?= $this->endSection() ?>
