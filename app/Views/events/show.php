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
      </div>
    </div>
  </div>
<?= $this->endSection() ?>
