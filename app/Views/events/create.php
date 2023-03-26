<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>
<div class="container text-center">
  <div class="row">
    <div class="col">
      <button>Aggiungi evento</button>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <ul>
        <?php foreach ($events as $event): ?>
          <li>
            Titolo: <?php echo $event['title']; ?><br>
            Descrizione: <?php echo $event['description']; ?><br>
            Data: <?php echo $event['date']; ?>
            Luogo: <?php echo $event['location']; ?>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
