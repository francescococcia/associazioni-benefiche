<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>
  <div class="content mb-5">
    <div class="wrap">
      <div class="page-headline-wrap cc-category-headline">
        <h1>Dettagli evento</h1>
        <p class="big-paragraph">Informazioni riguardo l'evento</p>
      </div>

      <div class="row">
        <div class="col-12 m-5">
          <div class="card">
            <div class="card-body">
              <p><strong>Title:</strong> <?= $event['title']; ?></p>
              <p><strong>Descrizione:</strong> <?= $event['description']; ?></p>
              <p><strong>Date:</strong> <?= $event['date']; ?></p>
              <p><strong>Location:</strong> <?= $event['location']; ?></p>
              <?php if ($event['userParticipated'] || session()->get('isPlatformManager')): ?>
              <a href="<?= site_url('events/detail/'.$event['id']) ?>" class="btn btn-primary">View Details</a>
            <?php else: ?>
              <form method="post" action="<?= site_url('participants/create') ?>">
                <input type="hidden" name="event_id" value="<?= $event['id'] ?>">
                <button type="submit" class="btn btn-primary">Partecipa</button>
              </form>
            <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container text-center">
    <div class="row">
      <div class="col">
        <h1>Event Details</h1>
        <div>
          <h2><?= $event['title'] ?></h2>
          <p><?= $event['description'] ?></p>
          <p>Date: <?= $event['date'] ?></p>
          <p>Location: <?= $event['location'] ?></p>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="text-center">
          <a href="<?php echo base_url();?>/feedbacks/create?participant_id=<?php echo $participantId->id; ?>" class="btn btn-lg btn-c-6332 btn-clean">
            Invia un feedback
          </a>
          </div>
        </div>
      </div>
    </div>
  </div>
<?= $this->endSection() ?>
