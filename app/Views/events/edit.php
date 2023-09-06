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

          <form action="<?php echo base_url(); ?>/EventsController/update" method="post">
            <input type="hidden" name="event_id" value="<?= $event['id']; ?>">  
            <div class="card">
              <div class="card-body">
                <div class="form-group">
                  <label for="title" ></label>Title</label>
                  <input class="form-control" type="text" name="title" value="<?= $event['title'] ?>">
                </div>

                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea class="form-control" name="description"><?= $event['description'] ?></textarea>
                </div>

                <div class="form-group">
                  <label for="date">Start Date</label>
                  <input class="form-control" type="date" name="date" value="<?= $event['date'] ?>">
                </div>

                <div class="form-group">
                  <label for="location">Location</label>
                  <input class="form-control" type="text" name="location" value="<?= $event['location'] ?>">
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
