<!doctype html>
<html>
  <head>
  <?= $this->include('Layout/partial/head'); ?>
      <title>Register</title>
  </head>
  <body>

    <!-- Main container -->
    <div class="page-container">
      <?= $this->include('Layout/partial/navbar'); ?>
      <?= $this->include('Layout/partial/messages'); ?>
      <?= $this->renderSection('content') ?>
      <?= $this->include('Layout/partial/footer'); ?>
    </div>
    <!-- Main container END -->

    <?= $this->include('Layout/partial/import_js'); ?>
  </body>
</html>
