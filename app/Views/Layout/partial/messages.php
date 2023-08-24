<?php if (session()->getFlashData('success')): ?>
  <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <?= session()->getFlashdata('success') ?>
  </div>
<?php endif; ?>

<?php if (session()->getFlashData('error')): ?>
  <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <?= session()->getFlashdata('error') ?>
  </div>
<?php endif; ?>

<?php if(session()->getFlashdata('msg')): ?>
  <div class="alert alert-warning">
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
      <?= session()->getFlashdata('msg') ?>
  </div>
<?php endif; ?>

<style>

  .closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
  }

  .closebtn:hover {
    color: black;
  }
</style>
