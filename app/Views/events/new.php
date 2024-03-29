<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>

  <div class="content mb-5">
		<div class="wrap">
			<div class="page-headline-wrap cc-category-headline">
				<h1>Nuovo Evento</h1>
				<p class="big-paragraph">Inserisci le seguenti informazioni</p>
			</div>

			<div class="row">
				<div class="col-12 d-flex justify-content-center align-items-center">
					<div class="col-12 col-md-8 col-lg-6">

          <form action="<?php echo base_url(); ?>/EventsController/create" method="post">
          <input type="hidden" name="association_id" value="<?= $association_id ?>">
            <div class="card">
              <div class="card-body">
                <div class="form-group">
                  <label for="title" ></label>Titolo</label>
                  <input class="form-control" type="text" name="title" value="<?= set_value('title') ?>">
                </div>

                <div class="form-group">
                  <label for="description">Categoria</label>
                  <select class='form-control search input-text' name="category" id="category">
                      <option value='' selected disabled hidden>Seleziona tipologia</option>
                      <option value="feste e sagre">Feste e sagre</option>
                      <option value="serate di gala">Serate di gala</option>
                      <option value="spettacoli teatrali">Spettacoli teatrali</option>
                      <option value="eventi sportivi">Eventi sportivi</option>
                      <option value="cene">Cene</option>
                      <option value="sfilate">Sfilate</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="description">Descrizione</label>
                  <textarea class="form-control" name="description"><?= set_value('description') ?></textarea>
                </div>

                <div class="form-group">
                  <label for="date">Data</label>
                  <input class="form-control" type="date" name="date" value="<?= set_value('date') ?>">
                </div>

                <div class="form-group">
                  <label for="location">Luogo</label>
                  <input class="form-control" type="text" name="location" value="<?= set_value('location') ?>">
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
