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
        <form action="<?php echo base_url(); ?>/ProductsController/create" method="post">
          <input type="hidden" name="association_id" value="<?= $association_id ?>">
          <label for="name">Name</label>
          <input type="text" name="name" value="<?= set_value('name') ?>"><br><br>

          <label for="description">Description</label>
          <textarea name="description"><?= set_value('description') ?></textarea><br><br>

          <label for="price">Price</label>
          <input type="text" name="price" value="<?= set_value('price') ?>"><br><br>

          <label for="quantity">Quantity</label>
          <input type="text" name="quantity" value="<?= set_value('quantity') ?>"><br><br>

          <input type="submit" name="submit" value="Save">
        </form>
      </div>
    </div>
  </div>
<?= $this->endSection() ?>
