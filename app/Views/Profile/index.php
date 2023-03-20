<h1>Test</h1>

<h1>Welcome to your dashboard, <?= $userData['first_name'] ?>!</h1>
<p>Your email address is <?= $userData['email'] ?></p>

<a href="<?= site_url('logout') ?>">Logout</a>