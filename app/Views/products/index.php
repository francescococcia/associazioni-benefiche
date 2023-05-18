<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>
<div class="container text-center">
  <div class="row">
    <div class="col">
      <a href="<?php echo base_url();?>/products/new">Aggiungi prodotto</a>
      <a href="<#?php echo base_url('store/create'); ?>">Add New Product</a>
    </div>
  </div>
  <!-- <h1><#?= $session ?>!</h1> -->
  <div class="row">
    <div class="col">
      <ul>
        <?php foreach ($products as $product): ?>
          <li>
            Nome: <?php echo $product['name']; ?><br>
            Descrizione: <?php echo $product['description']; ?><br>
            Prezzo: <?php echo $product['price']; ?>
          </li>
          <!-- <form method="post" action="<#?php echo base_url(); ?>/ParticipantsController/create<#?= $product['id']; ?>"> -->
          <form method="post" action="<?php echo base_url(); ?>/ProductsController/create">
            <input type="hidden" name="product_id" value="<?= $product['id']; ?>">
            <button type="submit">Partecipa</button>
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

