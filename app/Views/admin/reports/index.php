<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>
  <link rel="stylesheet" type="text/css" href="<?= base_url('public/css/admin.css') ?>"/>
  <div id="main-content" class="container allContent-section mt-5 py-4">
    <div>
      <h2>Segnalazioni</h2>
      <table>
      <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Messaggio</th>
            <th>Action</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($reports as $report) : ?>
            <tr>
                <td><?= $report['id'] ?></td>
                <td><?= $report['name'] ?></td>
                <td><?= $report['email'] ?></td>
                <td><?= $report['message'] ?></td>
                <td>
                  <form action="<?= site_url('admin/report/delete/' . $report['id']) ?>" method="post">
                    <button class='btn btn-danger' type="submit" onclick="return confirm('Sei sicuro?')">Rimuovi</button>
                  </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
<?= $this->endSection() ?>
