<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>

  <?= $this->include('admin/sidebar'); ?>
  <div id="main-content" class="container allContent-section mt-5 py-4">
    <div class="row">
      <div class="col-sm-3 offset-2">
        <div class="card">
          <i class="fa fa-users  mb-2" style="font-size: 70px;"></i>
          <a href="<?php echo base_url();?>/admin/users">
            <h4 style="color:white;">Utenti</h4>
          </a>
          <h5 style="color:white;"><?= $countUsers ?></h5>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="card">
          <i class="fa fa-th-large mb-2" style="font-size: 70px;"></i>
          <a href="<?php echo base_url();?>/admin/associations">
            <h4 style="color:white;">Associazioni</h4>
          </a>
          <h5 style="color:white;"><?= $countAssociations ?></h5>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="card">
          <i class="fa fa-th mb-2" style="font-size: 70px;"></i>
          <a href="<?php echo base_url();?>/admin/events">
            <h4 style="color:white;">Eventi</h4>
          </a>
          <h5 style="color:white;"><?= $countEvents ?></h5>
        </div>
      </div>

      <div class="col-sm-3 offset-2">
        <div class="card">
          <i class="fa fa-list mb-2" style="font-size: 70px;"></i>
          <a href="<?php echo base_url();?>/admin/reports">
            <h4 style="color:white;">Segnalazioni</h4>
          </a>
          <h5 style="color:white;"><?= $countReports ?></h5>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="card">
          <i class="fas fa-boxes mb-2" style="font-size: 70px;"></i>
          <a href="<?php echo base_url();?>/admin/products">
            <h4 style="color:white;">Prodotti</h4>
          </a>
          <h5 style="color:white;"><?= $countProducts ?></h5>
        </div>
      </div>
    </div>
  </div>

<?= $this->endSection() ?>
