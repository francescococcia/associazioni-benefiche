<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>

<div class="container">
    <h1>Create Association</h1>
    
    <?php if(session()->has('success')): ?>
        <div class="alert alert-success" role="alert">
            <?= session()->get('success') ?>
        </div>
    <?php endif; ?>
    
    <?php if(session()->has('error')): ?>
        <div class="alert alert-danger" role="alert">
            <?= session()->get('error') ?>
        </div>
    <?php endif; ?>

    <form method="post" action="<?= site_url('/associations/store') ?>" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input class="form-control" type="file" name="image" id="image">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?= $this->endSection() ?>
