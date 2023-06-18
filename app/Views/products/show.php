<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>
  <div class="container text-center">
    <div class="row">
      <div class="col">
      <h1>Product Details</h1>
<div>
    <p>Name: <?= $product['name'] ?></p>
    <p>description:<?= $product['description'] ?></p>
    <p>prices: <?= $product['price'] ?></p>
    <p>quantity: <?= $product['quantity'] ?></p>
    <p>quantity avadible: <?= $isQuantityAvailable ?></p>
</div>
      </div>
    </div>
  </div>
  <?php if ($isQuantityAvailable): ?>
  <form method="post" action="<?php echo base_url(); ?>/ProductsController/buy">
    <div>
      <label for="quantity-<?php echo $product['id']; ?>">Quantity:</label>
      <input type="number" name="quantity" min="1" max="<?= $isQuantityAvailable ?>" required>
    </div>
    <input type="hidden" name="product_id[<?php echo $product['id']; ?>]" value="<?php echo $product['id']; ?>">
    <button type="submit">Add to Cart</button>
    <hr>
</form>
<?php endif; ?>
<?= $this->endSection() ?>
