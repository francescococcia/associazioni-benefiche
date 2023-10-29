<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>
  <div class="content mb-5">
		<div class="wrap">
			<div class="page-headline-wrap cc-category-headline">
				<h1>Informazioni Evento</h1>
				<p class="big-paragraph">Modifica le seguenti informazioni</p>
			</div>

			<div class="row">
				<div class="col-12 d-flex justify-content-center align-items-center">
					<div class="col-12 col-md-8 col-lg-6">

          <form action="<?= base_url(); ?>/events/update" method="post" data-form-type="blocs-form" novalidate="" enctype="multipart/form-data">
            <input type="hidden" name="event_id" value="<?= $event['id']; ?>">
            <div class="card">
              <div class="card-body">
                <div class="form-group">
                  <label for="title" ></label>Titolo</label>
                  <input class="form-control" type="text" name="title" value="<?= $event['title'] ?>" required>
                </div>

                <div class="form-group">
                  <label for="description">Categoria</label>
                  <select class='form-control search input-text' name="category" id="category">
                    <option value="" selected disabled hidden>Select a category</option>
                    <option value="Feste e sagre" <?= ($event['category'] == 'Feste e sagre') ? 'selected' : '' ?>>Feste e sagre</option>
                    <option value="Mercatini" <?= ($event['category'] == 'Mercatini') ? 'selected' : '' ?>>Mercatini</option>
                    <option value="Spettacoli teatrali" <?= ($event['category'] == 'Spettacoli teatrali') ? 'selected' : '' ?>>Spettacoli teatrali</option>
                    <option value="Eventi sportivi" <?= ($event['category'] == 'Eventi sportivi') ? 'selected' : '' ?>>Eventi sportivi</option>
                    <option value="Eventi culinari" <?= ($event['category'] == 'Eventi culinari') ? 'selected' : ''?>>Eventi culinari</option>
                    <option value="Sfilate" <?= ($event['category'] == 'Sfilate') ? 'selected' : ''?>>Sfilate</option>
                    <option value="Talk" <?= ($event['category'] == 'Talk') ? 'selected' : ''?>>Talk</option>
                    <option value="Altro" <?= ($event['category'] == 'Altro') ? 'selected' : ''?>>Altro</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="description">Descrizione</label>
                  <textarea class="form-control" name="description"><?= $event['description'] ?></textarea>
                </div>

                <div class="form-group">
                  <label for="date">Data dal:</label>
                  <input
                    class="form-control"
                    type="datetime-local"
                    name="date"
                    value="<?= $formattedDate ?>"
                    id='txtDate'>
                </div>

                <div class="form-group">
                    <label for="date">Data al:</label>
                    <input
                      class="form-control"
                      type="datetime-local"
                      name="date_to"
                      value="<?= $formattedDateTo ?>"
                      id='txtDateTo'
                    >
                  </div>

                <div class="form-group">
                  <label for="location">Luogo</label>
                  <input class="form-control" type="text" name="location" value="<?= $event['location'] ?>">
                </div>

                <div class="form-group">
                  <label for="link">Link</label>
                  <input class="form-control" type="text" name="link" value="<?= $event['link'] ?>">
                </div>


                <div class="form-group">
                  <label for="image" class="form-label">Immagine</label>
                  <div class="input_container">
                    <label for="choose-file" class="custom-file-upload" id="choose-file-label">Seleziona file</label>
                    <input type="file"  id="choose-file"  name="image" accept=".jpg, .jpeg, .png, .gif" style="display:none;">
                  </div>
                  <?php if ($event['image']): ?>
                    <img
                      src="<?= base_url('uploads/events/'.$event['image']) ?>"
                      alt="<?= $event['title'] ?>"
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
      var dtToday = new Date();
      var year = dtToday.getFullYear();
      var month = (dtToday.getMonth() + 1).toString().padStart(2, '0');
      var day = dtToday.getDate().toString().padStart(2, '0');
      var hours = dtToday.getHours().toString().padStart(2, '0');
      var minutes = dtToday.getMinutes().toString().padStart(2, '0');

      var maxDate = year + '-' + month + '-' + day + 'T' + hours + ':' + minutes;

      $('#txtDate').attr('min', maxDate);
      $('#txtDateTo').attr('min', maxDate);

      $('#choose-file').change(function () {
        var i = $(this).prev('label').clone();
        var file = $('#choose-file')[0].files[0].name;
        $(this).prev('label').text(file);
      });
    });
  </script>
<?= $this->endSection() ?>
