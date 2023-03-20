<!doctype html>
<html>
  <head>
  <?= $this->include('partial/head'); ?>
      <title>Register</title>
  </head>
  <body>

    <!-- Main container -->
    <div class="page-container">
      <?= $this->include('partial/navbar'); ?>
      <?= $this->renderSection('content') ?>
      <?= $this->include('partial/footer'); ?>
    </div>
    <!-- Main container END -->

    <?= $this->include('partial/import_js'); ?>
  </body>
</html>
