<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>
<div class="container text-center">
  <?php if(session()->get('isPlatformManager')): ?>
  <div class="row">
    <div class="col">
      <a href="<?php echo base_url();?>/events/new">Aggiungi evento</a>
    </div>
  </div>
  <?php endif; ?>
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

          <?php if ($event['userParticipated']): ?>
              <a href="<?= site_url('events/detail/'.$event['id']) ?>" class="btn btn-primary">View Details</a>
          <?php else: ?>
            <form method="post" action="<?= site_url('participants/create') ?>">
              <input type="hidden" name="event_id" value="<?= $event['id'] ?>">
              <button type="submit" class="btn btn-primary">Partecipa</button>
            </form>
          <?php endif; ?>
          <hr>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</div>
<?php if(session()->has('success')): ?>
  <div class="alert alert-success" role="alert">
      <?= session()->get('success') ?>
  </div>
<?php endif; ?>
<?= $this->endSection() ?>
