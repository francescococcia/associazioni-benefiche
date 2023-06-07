<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>

<h2>Search Results</h2>

<?php if (!empty($events)) : ?>
    <ul>
        <?php foreach ($events as $event) : ?>
            <li><?= $event['description']; ?></li>
        <?php endforeach; ?>
    </ul>
<?php else : ?>
    <p>No events found.</p>
<?php endif; ?>

<?= $this->endSection() ?>
