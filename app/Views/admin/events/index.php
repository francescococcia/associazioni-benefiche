<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>
  <link rel="stylesheet" type="text/css" href="<?= base_url('public/css/admin.css') ?>"/>
  <div id="main-content" class="container allContent-section mt-5 py-4">
    <div>
      <h2>Eventi</h2>
      <table>
      <thead>
        <tr>
            <th>ID</th>
            <th>Titolo</th>
            <th>Descrizione</th>
            <th>location</th>
            <th>Categoria</th>
            <th>Azione</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($events as $event) : ?>
            <tr>
                <td><?= $event['id'] ?></td>
                <td><?= $event['title'] ?></td>
                <td><?= $event['description'] ?></td>
                <td><?= $event['location'] ?></td>
                <td><?= $event['category'] ?></td>
                <td>
                  <form action="<?= site_url('admin/events/delete/' . $event['id']) ?>" method="post">
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