<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>

<h2>Search Results</h2>

<?php if (!empty($events)) : ?>
    <ul>
        <?php foreach ($events as $event) : ?>
            <li>
            Titolo: <?php echo $event['title']; ?><br>
            Descrizione: <?php echo $event['description']; ?><br>
            Data: <?php echo $event['date']; ?><br>
            Luogo: <?php echo $event['location']; ?>
          </li>
        <?php endforeach; ?>
    </ul>
<?php else : ?>
    <p>No events found.</p>
<?php endif; ?>

<?= $this->endSection() ?>
