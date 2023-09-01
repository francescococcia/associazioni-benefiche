<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>

  <div class="content mb-5">
    <div class="wrap">
      <div class="page-headline-wrap cc-category-headline">
        <h1>Ricerca Evento</h1>
        <p class="big-paragraph">Seleziona per tipo di evento benefico</p>
      </div>

      <div class="row">
        <div class="col-12 d-flex justify-content-center align-items-center">
          <div class="col-12 col-md-8 col-lg-6">

          <form  method="GET" action="<?= base_url(); ?>/events/results">
              <div class="row">

                <div class="col-md-12">
                  <div class="input-group mb-3">
                    <select class='form-control search input-text' name="description" id="description">
                        <option value='' selected disabled hidden>Seleziona tipologia</option>
                        <option value="feste e sagre">Feste e sagre</option>
                        <option value="serate di gal">serate di gal</option>
                        <option value="spettacoli teatrali"> spettacoli teatrali</option>
                        <option value="eventi sportivi">Eventi sportivi</option>
                        <option value="cene">Cene</option>
                        <option value="sfilate">Sfilate</option>
                    </select>

                    <div class="input-group-append">
                        <button class="btn btn-outline-warning btn-md yellow" type="submit">
                          <i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
          </form>
          </div>
        </div>
      </div>
    </div>
	</div>

  <div class="container offset-lg-2 mt-4 mb-4">
    <div class="row justify-content-center">
      <?php if ($events) : ?>
        <?php foreach ($events as $event) : ?>
          <div class="col-auto mb-3">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $event['title']; ?></h5>
                    <p class="card-text">Descrizione: <?php echo $event['description']; ?></p>
                    <p class="card-text">Data: <?php echo  date('d/m/y', strtotime($event['date'])); ?></p>
                    <p class="card-text">Luogo: <?php echo $event['location']; ?></p>
                </div>
            </div>
          </div>
        <?php endforeach; ?>
        <?php elseif ($events == '' ) : ?>
          <p></p>
        <?php else : ?>
        <p>Nessun evento trovato.</p>
      <?php endif; ?>
    </div>
  </div>

  <style>
    .search {
      border: 1px solid #f8c146;
    }

    .yellow:hover{
        color:#fff;
    }

    .card-columns {
      @include media-breakpoint-only(lg) {
        column-count: 4;
      }
      @include media-breakpoint-only(xl) {
        column-count: 5;
      }
    }

  </style>
<?= $this->endSection() ?>
