<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>
      <h1><?= $isLoggedIn ?>!</h1>
    <?php
      foreach ($session as $key => $value) {
          echo $key . ': ' . $value . '<br>';
      }
    ?>

<?= $this->endSection() ?>