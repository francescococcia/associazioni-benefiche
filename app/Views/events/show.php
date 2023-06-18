<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>
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
