<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>
  <link rel="stylesheet" type="text/css" href="<?= base_url('public/css/admin.css') ?>"/>

  <div id="main-content" class="container allContent-section mt-5 py-4">
    <div>
      <h2>Associazioni</h2>
      <table>
      <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Indirizzo</th>
            <th>Codice Fiscale</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($associations as $association): ?>
            <tr>
                <td><?= $association['id'] ?></td>
                <td><?= $association['name'] ?></td>
                <td><?= $association['email'] ?></td>
                <td><?= $association['legal_address'] ?></td>
                <td><?= $association['tax_code'] ?></td>
                <td><?= $association['description'] ?></td>
                <td>
                  <form action="<?= site_url('admin/users/delete/' . $association['user_id']) ?>" method="post">
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