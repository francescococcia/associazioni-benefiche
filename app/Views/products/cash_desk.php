<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>
    <h1>Cash Desk</h1>

    <?php if (!empty($selectedProducts)): ?>
        <table>
            <thead>
                <tr>
                    <th>Association ID</th>
                    <th>Total Price</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($selectedProducts as $product): ?>
                    <tr>
                        <td><?= $product['association_name'] ?></td>
                        <td><?= $product['total_price'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No products found.</p>
    <?php endif; ?>

<?= $this->endSection() ?>
