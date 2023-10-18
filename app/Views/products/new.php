<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>

  <div class="content mb-5">
		<div class="wrap">
			<div class="page-headline-wrap cc-category-headline">
				<h1>Nuovo Prodotto</h1>
				<p class="big-paragraph">Inserisci le seguenti informazioni</p>
			</div>

			<div class="row">
				<div class="col-12 d-flex justify-content-center align-items-center">
					<div class="col-12 col-md-8 col-lg-6">

          <form action="<?php echo base_url(); ?>/ProductsController/create" method="post" data-form-type="blocs-form" novalidate="">
          <input type="hidden" name="association_id" value="<?= $association_id ?>">
            <div class="card">
              <div class="card-body">
                <div class="form-group">
                  <label for="name" ></label>Titolo</label>
                  <input
                    class="form-control"
                    required
                    type="text"
                    name="name"
                    value="<?= set_value('name') ?>"
                  >
                </div>

                <div class="form-group">
                  <label for="description">Descrizione</label>
                  <textarea class="form-control" required name="description"><?= set_value('description') ?></textarea>
                </div>

                <div class="form-group">
                  <label for="price">Prezzo</label>
                  <input class="form-control" required type="number" name="price" min='1' value="<?= set_value('price') ?>">
                </div>

                <div class="form-group">
                  <label for="quantity">Quantità</label>
                  <input class="form-control" required type="number" name="quantity" min='1' value="<?= set_value('quantity') ?>">
                </div>

                <div class="text-center">
                  <button class="btn btn-clean float-lg-none btn-c-4129 btn-rd mt-lg-4" type="submit">
                    Crea
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
