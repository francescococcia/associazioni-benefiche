<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>
<div class="container text-center">
  <div class="row">
    <div class="col">
      <form action="<?php echo base_url(); ?>/events/new" method="post">
        <label for="title">Title</label>
        <input type="text" name="title" value="<?= set_value('title') ?>"><br><br>

        <label for="description">Description</label>
        <textarea name="description"><?= set_value('description') ?></textarea><br><br>

        <label for="start_date">Start Date</label>
        <input type="text" name="start_date" value="<?= set_value('start_date') ?>"><br><br>

        <label for="end_date">End Date</label>
        <input type="text" name="end_date" value="<?= set_value('end_date') ?>"><br><br>

        <input type="submit" name="submit" value="Save">
      </form>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
