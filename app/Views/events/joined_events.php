<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>
  <div class="content mb-5">
    <div class="wrap">
      <div class="page-headline-wrap cc-category-headline">
        <h1>Eventi a cui partecipi</h1>
        <p class="big-paragraph">Informazioni riguardo l'evento</p>
        <?php if (!empty($participantModel) && !session()->get('isPlatformManager')): ?>
          <div class="row">
            <div class="col">
              <div class="text-center">
                <!-- Add data-toggle and data-target attributes for Bootstrap Modal -->
                <a href="#" data-toggle="modal" data-target="#feedbackModal"
                  class="btn btn-md btn-clean btn-c-4129 btn-rd">
                    Invia un feedback
                </a>

              </div>
            </div>
          </div>
        <?php endif; ?>
      </div>

    </div>
  </div>

  <div class="container offset-lg-3 mt-4 mb-4">
    <div class="row justify-content-center">
      <?php if ($joinedEvents) : ?>
        <?php foreach ($joinedEvents as $event): ?>
          <div class="col-auto mb-3">
            <div class="card" style="width: 18rem;">
              <div class="card-body">
                  <h5 class="card-title"><?php echo $event['title']; ?></h5>
                  <p class="card-text">Descrizione: <?php echo $event['description']; ?></p>
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
