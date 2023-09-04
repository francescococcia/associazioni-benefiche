<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>
  <div class="container text-center">
    <div class="row">
      <div class="col">

        <form action="<?php echo base_url(); ?>/EventsController/update" method="post">
          <label for="title">Title</label>
          <input type="text" name="title" value="<?= $event['title'] ?>"><br><br>

          <label for="description">Description</label>
          <textarea name="description"><?= $event['description'] ?></textarea><br><br>

          <label for="date">Start Date</label>
          <input type="date" name="date" value="<?= $event['date'] ?>"><br><br>

          <label for="location">Location</label>
          <input type="text" name="location" value="<?= $event['location'] ?>"><br><br>

          <input type="submit" name="submit" value="Save">
        </form>
      </div>
    </div>
  </div>
<?= $this->endSection() ?>
