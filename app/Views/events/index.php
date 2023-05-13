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
          <!-- <form method="post" action="<#?php echo base_url(); ?>/ParticipantsController/create<#?= $event['id']; ?>"> -->
          <form method="post" action="<?php echo base_url(); ?>/ParticipantsController/create">
            <input type="hidden" name="event_id" value="<?= $event['id']; ?>">
            <button type="submit">Partecipa</button>
          </form>
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
