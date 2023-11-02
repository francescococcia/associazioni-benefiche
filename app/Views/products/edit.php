<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>
  <div class="content mb-5">
		<div class="wrap">
			<div class="page-headline-wrap cc-category-headline">
				<h1>Informazioni Prodotto</h1>
				<p class="big-paragraph">Modifica le seguenti informazioni</p>
			</div>

			<div class="row">
				<div class="col-12 d-flex justify-content-center align-items-center">
					<div class="col-12 col-md-8 col-lg-6">

          <form action="<?= base_url(); ?>/product/update" method="post"
            data-form-type="blocs-form" novalidate=""
            enctype="multipart/form-data">
            <input type="hidden" name="product_id" value="<?= $product['id']; ?>">
            <div class="card">
              <div class="card-body">
                <div class="form-group">
                  <label for="name" ></label>Titolo</label>
                  <input class="form-control" type="text" name="name" value="<?= $product['name'] ?>" required>
                </div>

                <div class="form-group">
                  <label for="description"></label>Descrizione</label>
                  <input class="form-control" required type="text" name="description" value="<?= $product['description'] ?>">
                </div>

                <div class="form-group">
                  <label for="price">Prezzo</label>
                  <input
                    class="form-control"
                    required
                    type="number"
                    min='1'
                    name="price"
                    value="<?= number_format($product['price'], 2, ',', ' '); ?>">
                </div>

                <div class="form-group">
                  <label for="quantity">Quantità</label>
                  <input type="number" class="form-control" required min='1' name="quantity" value="<?= $product['quantity'] ?>">
                </div>

                <div class="form-group">
                  <label for="image" class="form-label">Immagine</label>
                  <div class="input_container">
                    <label for="choose-file" class="custom-file-upload" id="choose-file-label">Seleziona file</label>
                    <input type="file"  id="choose-file"  name="image" accept=".jpg, .jpeg, .png, .gif" style="display:none;">
                  </div>
                  <?php if ($product['image']): ?>
                    <img
                      src="<?= base_url('uploads/products/'.$product['image']) ?>"
                      alt="<?= $product['name'] ?>"
                      class="mt-3 ml-5"
                      style="max-width: 300px;"
                    >
                  <?php endif; ?>
                </div>

                <div class="text-center">
                  <button class="btn btn-clean float-lg-none btn-c-4129 btn-rd mt-lg-4" type="submit">
                    Aggiorna
                  </button>
                </div>
              </div>
            </div>
          </form>
					</div>
				</div>
			</div>
		</div>
	</div>

  <script>
    $(document).ready(function () {

      $('#choose-file').change(function () {
        var i = $(this).prev('label').clone();
        var file = $('#choose-file')[0].files[0].name;
        $(this).prev('label').text(file);
      });
    });
  </script>
<?= $this->endSection() ?>
