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

          <form action="<?= base_url(); ?>/product/update" method="post">
            <input type="hidden" name="product_id" value="<?= $product['id']; ?>">  
            <div class="card">
              <div class="card-body">
                <div class="form-group">
                  <label for="name" ></label>Titolo</label>
                  <input class="form-control" type="text" name="name" value="<?= $product['name'] ?>">
                </div>

                <div class="form-group">
                  <label for="description"></label>Descrizione</label>
                  <input class="form-control" type="text" name="description" value="<?= $product['description'] ?>">
                </div>

                <div class="form-group">
                  <label for="price">Prezzo</label>
                  <input class="form-control" type="number" name="price" value="<?= $product['price'] ?>">
                </div>

                <div class="form-group">
                  <label for="quantity">Quantità</label>
                  <input type="number" class="form-control" name="quantity" value="<?= $product['quantity'] ?>">
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
<?= $this->endSection() ?>
