<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>

<form method="GET" action="<?= base_url(); ?>/events/results">
    <label for="description">Event Description:</label>
    <input type="text" id="description" name="description" required>

    <button type="submit">Search</button>
</form>

<?= $this->endSection() ?>
