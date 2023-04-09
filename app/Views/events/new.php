<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>
  <div class="container text-center">
    <div class="row">
      <div class="col">
        <?php if (session()->has('message')) : ?>
          <div class="alert alert-success">
            <?= session('message') ?>
          </div>
        <?php endif ?>
        <form action="<?php echo base_url(); ?>/EventsController/create" method="post">
          <input type="hidden" name="association_id" value="<?= $association_id ?>">
          <label for="title">Title</label>
          <input type="text" name="title" value="<?= set_value('title') ?>"><br><br>

          <label for="description">Description</label>
          <textarea name="description"><?= set_value('description') ?></textarea><br><br>

          <label for="date">Start Date</label>
          <input type="date" name="date" value="<?= set_value('date') ?>"><br><br>

          <label for="location">Location</label>
          <input type="text" name="location" value="<?= set_value('location') ?>"><br><br>

          <input type="submit" name="submit" value="Save">
        </form>
      </div>
    </div>
  </div>
<?= $this->endSection() ?>
