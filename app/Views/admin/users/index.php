<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>

<h1>Users</h1>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= $user['first_name'] ?></td>
                <td><?= $user['email'] ?></td>
                <td>
                  <form action="<?= site_url('admin/users/delete/' . $user['id']) ?>" method="post">
                      <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                  </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection() ?>