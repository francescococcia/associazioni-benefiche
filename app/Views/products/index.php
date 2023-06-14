<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>
<div class="container text-center">
  <div class="row">
    <div class="col">
      <a href="<?php echo base_url();?>/store/new">Aggiungi prodotto</a>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <ul>
        <?php foreach ($products as $product): ?>
          <li>
            Nome: <?php echo $product['name']; ?><br>
            Descrizione: <?php echo $product['description']; ?><br>
            Prezzo: <?php echo $product['price']; ?><br>
            Quantity: <?php echo $product['quantity']; ?>
          </li>
          <a href="<?= site_url('product/detail/'.$product['id']) ?>" class="btn btn-primary">View Details</a>
          <form method="post" action="<?php echo base_url(); ?>/ProductsController/create">
            <input type="hidden" name="product_id" value="<?= $product['id']; ?>">
            <button type="submit">Aggiungi al carrello</button>
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

