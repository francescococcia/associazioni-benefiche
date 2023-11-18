<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>
  <!-- bloc-4 -->
  <div class="bloc l-bloc" id="bloc-4">
    <div class="container bloc-md">
      <div class="row">
        <div class="col">
          <h3 class="section-heading primary-text mb-3 mb-md-4 mt-lg-4">
            Chi siamo
          </h3><picture>
            <source type="image/webp" srcset="../img/lazyload-ph.png" data-srcset="<?php echo base_url('public/img/photo_2023-11-11 16.38.48.webp'); ?>">
            <img src="<?php echo base_url('public/img/photo_2023-11-11 16.38.48.jpeg'); ?>"
            data-src="../img/photo_2023-11-11%2016.38.48.jpeg"
            class="img-fluid img-rd-lg mx-auto d-block lazyload"
            alt="photo_2023 11-11%2016.38.48.jpeg" width="1050" height="500"></picture>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div>
            <div>
              <div class="bento-box container-div-bloc-4-style pt-lg-4 mt-lg-5">
                <h1 class="mb-4 box-heading primary-text h1-su-di-noi-style">
                  Su di noi
                </h1>
                <h5 class="mb-4 h3-bloc-4-style">
                  Così come dovrebbe essere<br>Fin dal suo primo giorno nel settore, Associazioni offre ai suoi clienti un'ottima selezione di prodotti a prezzi imbattibili. Il nostro negozio online è diventato sinonimo di qualità e forniamo ai clienti un'ampia varietà di merci, tra cui alcuni prodotti in edizione limitata e articoli stagionali per tutte le tasche. Dai un'occhiata e inizia a comprare oggi stesso<br>
                </h5>
              </div>
              <div class="bento-box pt-lg-4 mt-lg-4 ">
                <h1 class="mb-4 box-heading primary-text h1-bloc-4-style">
                  La nostra mission<br>
                </h1>
                <h5 class="mb-4 h3-bloc-4-style">
                  Ciao
                </h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- bloc-4 END -->
<?= $this->endSection() ?>