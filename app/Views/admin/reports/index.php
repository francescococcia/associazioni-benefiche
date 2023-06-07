<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>
<h1>Event List</h1>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Location</th>
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
                  <form action="<#?= site_url('admin/events/delete/' . $event['id']) ?>" method="post">
                    <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                  </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection() ?>
