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

            <form action="<?php echo base_url(); ?>/events/create" method="post" data-form-type="blocs-form" novalidate="" enctype="multipart/form-data">
              <input type="hidden" name="association_id" value="<?= $association_id ?>">
              <div class="card">
                <div class="card-body">
                  <div class="form-group">
                    <label for="title" ></label>Titolo</label>
                    <input
                      class="form-control"
                      required
                      type="text"
                      name="title"
                      value="<?= set_value('title') ?>"
                    >
                  </div>

                  <div class="form-group">
                    <label for="description">Categoria</label>

                    <select class='form-control search input-text' name="category" id="category" required >
                      <option value=''>Seleziona tipologia</option>
                      <option value="Feste e sagre">Feste e sagre</option>
                      <option value="Mercatini">Mercatini</option>
                      <option value="Spettacoli teatrali">Spettacoli teatrali</option>
                      <option value="Eventi sportivi">Eventi sportivi</option>
                      <option value="Eventi culinari">Eventi culinari</option>
                      <option value="Sfilate">Sfilate</option>
                      <option value="Talk">Talk</option>
                      <option value="Altro">Altro</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="description">Descrizione</label>
                    <textarea class="form-control" required name="description"><?= set_value('description') ?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="date_to">Data dal:</label>
                    <input
                      class="form-control"
                      required
                      type="datetime-local"
                      name="date"
                      value="<?= set_value('date') ?>"
                      id='txtDate'
                    >
                  </div>

                  <div class="form-group">
                    <label for="date">Data al:</label>
                    <input
                      class="form-control"

                      type="datetime-local"
                      name="date_to"
                      value="<?= set_value('date_to') ?>"
                      id='txtDateTo'
                    >
                  </div>

                  <div class="form-group">
                    <label for="location">Luogo</label>
                    <input class="form-control" required type="text" name="location" value="<?= set_value('location') ?>">
                  </div>

                  <div class="form-group">
                    <label for="link">Link</label>
                    <input class="form-control" type="text" name="link" value="<?= set_value('link') ?>">
                  </div>

                  <div class="form-group">
                    <label for="image" class="form-label">Immagine</label>
                    <div class="input_container">
                      <label for="choose-file" class="custom-file-upload" id="choose-file-label">Seleziona file</label>
                      <input
                        type="file"
                        id="choose-file"
                        name="image"
                        accept=".jpg, .jpeg, .png, .gif"
                        style="visibility:hidden;width:0"
                      >
                    </div>
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

  <script>
    $(document).ready(function () {

      $(function () { $("input,select,textarea").not("[type=submit]").jqBootstrapValidation(); } );

      $(function(){
        var dtToday = new Date();
        var year = dtToday.getFullYear();
        var month = (dtToday.getMonth() + 1).toString().padStart(2, '0');
        var day = dtToday.getDate().toString().padStart(2, '0');
        var hours = dtToday.getHours().toString().padStart(2, '0');
        var minutes = dtToday.getMinutes().toString().padStart(2, '0');

        var maxDate = year + '-' + month + '-' + day + 'T' + hours + ':' + minutes;

        $('#txtDate').attr('min', maxDate);
        $('#txtDateTo').attr('min', maxDate);

      });

      $('#choose-file').change(function () {
        var i = $(this).prev('label').clone();
        var file = $('#choose-file')[0].files[0].name;
        $(this).prev('label').text(file);
      });
    })
  </script>
<?= $this->endSection() ?>
