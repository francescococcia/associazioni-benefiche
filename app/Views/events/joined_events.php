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
      <div class="col-md-12 col-sm-6">
        <div class="card">
          <div class="card-body">
            <div class="container mt-4 mb-4">
              <div class="row justify-content-center">
                <?php if ($joinedEvents) : ?>
                  <?php foreach ($joinedEvents as $event): ?>
                    <div class="col-md-12 mb-3">
                        <h5><strong><?php echo $event['title']; ?></strong></h5>
                        <div class="d-flex justify-content-between">
                          <p class="mb-0">Luogo: <?php echo $event['location']; ?></p>
                          <p class="mb-0">Data: <?php echo date('d/m/y', strtotime($event['date'])); ?></p>
                          <a href="<?= site_url('events/detail/' . $event['id']) ?>" class="card-link">Dettagli</a>
                        </div>
                        <hr>
                      </div>
                  <?php endforeach; ?>
                <?php else : ?>
                  <p>Nessun evento trovato.</p>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?= $this->endSection() ?>
