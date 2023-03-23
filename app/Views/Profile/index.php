<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>
<div class="container text-center">
  <div class="row">
    <div class="col">
      <h1>Test</h1>
      <h1><?= print_r($platformManagers) ?>!</h1>
      <h1>Welcome to your dashboard, <?= $userData['first_name'] ?>!</h1>
      <p>Your email address is <?= $userData['email'] ?></p>
      <ol>
        <ul>ciao</ul>
      </ol>
    </div>
  </div>
</div>

  <a href="<?= site_url('logout') ?>">Logout</a>
<?= $this->endSection() ?>