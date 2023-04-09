<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>
<div class="container text-center">
  <div class="row">
    <div class="col">
      <a href="<?php echo base_url();?>/events/new">Aggiungi evento</a>
    </div>
  </div>
  <!-- <h1><#?= $session ?>!</h1> -->
  <div class="row">
    <div class="col">
      <ul>
        <?php foreach ($events as $event): ?>
          <li>
            Titolo: <?php echo $event['title']; ?><br>
            Descrizione: <?php echo $event['description']; ?><br>
            Data: <?php echo $event['date']; ?><br>
            Luogo: <?php echo $event['location']; ?>
          </li>
          <hr>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
