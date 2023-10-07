<!doctype html>
<html>
  <head>
    <?= $this->include('Layout/partial/head'); ?>
    <title>Home</title>
  </head>
  <body>
    <?= $this->include('Layout/partial/navbar'); ?>

    <!-- Preloader -->
    <div id="page-loading-blocs-notifaction" class="page-preloader" style="background:#FFFFFF url(<?php echo base_url('public/img/ug_classe_bambini_1.webp'); ?>) no-repeat center center;animation-name: preloader-fade"></div>
    <!-- Preloader END -->

    <!-- Main container -->
    <div class="page-container">

      <!-- bloc-1 -->
      <div class="bloc bloc-fill-screen scroll-fx-out-fade d-bloc" id="bloc-1" style="background-image:url(<?= base_url('public/img/Comunita.jpg') ?>);">
        <div class="container fill-bloc-top-edge">
          <div class="row">
            <div class="col-12 mr-lg-5">
              <?php if ($isLoggedIn): ?>
                <?php if (session()->get('isAdmin')): ?>
                  <div class="text-center text-lg-right">
                    <a href="<?php echo base_url();?>/admin/dashboard"
                      class="btn mr-lg-3 btn-style btn-lg btn-clean float-lg-none btn-c-4129 btn-rd">
                      Home
                    </a>
                  </div>
                <?php endif; ?>
              <?php else: ?>
                  <div class="text-center text-lg-right">
                    <a href="<?php echo base_url();?>/signin"
                      class="btn mr-lg-3 btn-style btn-lg btn-clean float-lg-none btn-c-4129 btn-rd">
                      Accedi
                    </a>
                    <div class="btn-group btn-dropdown dropdown bloc-style float-lg-none">
                      <a href="#" class="btn dropdown-toggle btn-c-4129 btn-iscriviti-style btn-clean btn-lg pr-lg-4 btn-rd" data-toggle="dropdown" aria-expanded="false">Iscriviti</a>
                      <ul class="dropdown-menu" role="menu">
                        <li>
                          <a href="<?php echo base_url();?>/signup-association" class="dropdown-item a-block link-style text-lg-left">Associazione</a>
                        </li>
                        <li>
                          <a href="<?php echo base_url();?>/signup" class="dropdown-item a-block link-utente-style text-lg-left">Utente</a>
                        </li>
                      </ul>
                    </div>
                  </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col">
              <h1 class="text-center threeD-t h1-2-style mx-auto d-block pl-lg-5 mt-lg-5 text-lg-center pt-lg-5 tc-7963"
              id='custom-style-title'>
                Mani Generose
              </h1>
              <h3 class="mb-4 h3-style text-lg-center float-lg-none sm-shadow tc-7963 ml-lg-5">
                il portale delle associazioni benefiche di Bari
              </h3>
            </div>
          </div>
        </div>
        <div class="container fill-bloc-bottom-edge">
          <div class="row">
            <div class="col-12">
              <h6 class="mb-4 h6-style mx-auto d-block tc-6332">
                Scorri per visualizzare le associazioni
              </h6>
              <div class="text-center">
                <a href="#" data-scroll-speed="1000" onclick="scrollToTarget('0',this)"><span class="fa fa-angle-down icon-md animated bounce animDelay08"></span></a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- bloc-1 END -->

      <?php $counter = 1; ?>
      <?php foreach ($associations as $association): ?>
        <!-- bloc-2 -->
        <?php if ($counter % 2 === 1): ?>
          <div class="bloc full-width-bloc l-bloc scroll-fx-in-fade" id="bloc-2">
          <!-- <div class="bloc full-width-bloc l-bloc scroll-fx-in-fade" id="bloc-2" style='background-color: #F6F6F6;'> -->
            <div class="container bloc-no-padding">
              <div class="row mb-lg-5 mt-lg-5">
                <div class="col-md-12 col-lg-6 offset-lg-1">
                <picture>
                  <img src="<?php echo base_url('uploads/'.$association['image']); ?>"
                    data-src="<?php echo base_url('uploads/'.$association['image']); ?>"
                    class="img-fluid img-style float-lg-none ml-lg-5 mr-lg-0 img-rd-lg lazyload"
                    alt="<?php echo $association['image']; ?>" width="500" height="450">
                </picture>
                </div>
                <div class="align-self-center offset-md-1 col-md-10 col-sm-10 offset-sm-1 offset-1 col-10 col-lg-4 offset-lg-0">
                  <h1 class="mg-md h1-style">
                    <?php echo $association['name']; ?>
                  </h1>
                <p><?php echo $association['description']; ?> </p>
                <a href="<?= site_url('associations/'.$association['id']) ?>" class="btn btn-lg btn-c-2169">Maggiori informazioni</a>
                </div>
              </div>
            </div>
          </div>
        <?php else: ?>

          <!-- bloc-2 END -->
          <div class="bloc full-width-bloc l-bloc" id="bloc-3">
          <!-- <div class="bloc full-width-bloc l-bloc" id="bloc-3" style='background-color: #F6F6F6;'> -->
            <div class="container bloc-no-padding">
              <div class="row mb-lg-5 mr-lg-5">
                <div class="order-md-0 col-md-12 col-lg-6 order-lg-1 ml-lg-0 offset-lg-0">
                  <picture>
                  <img src="<?php echo base_url('uploads/'.$association['image']); ?>"
                    data-src="<?php echo base_url('uploads/'.$association['image']); ?>"
                    class="img-fluid img-bloc-3-style img-rd-lg float-lg-right mr-lg-5 lazyload"
                    alt="<?php echo $association['image']; ?>" width="491" height="450">
                </div>
                <div class="align-self-center offset-md-1 col-md-10 col-lg-4 col-sm-10 offset-sm-1 col-10 offset-1 offset-lg-2">
                  <h1 class="mg-md h1-ciao-vinny-style">
                    <?php echo $association['name']; ?>
                  </h1>
                  <p><?php echo $association['description']; ?> </p>
                  <a href="<?= site_url('associations/'.$association['id']) ?>" class="btn btn-lg btn-c-2169">Maggiori informazioni</a>
                  <!-- <a href="<?= site_url('/dashboard') ?>" class="btn btn-lg btn-c-857">Maggiori informazioni</a> -->
                </div>
              </div>
            </div>
          </div>
        <?php endif; ?>

        <?php $counter++; ?>
      <?php endforeach; ?>


    <div class="bloc full-width-bloc b-parallax l-bloc" style='background-color:#E6E6A6'>
      <div class="container bloc-lg bloc-sm-lg">
        <div class="row align-items-center ml-lg-0 no-gutters mt-lg-5">
          <div class="col-md-3 col-sm-6 align-self-center offset-lg-3">
            <h1 class="text-sm-left text-center h4-style text-lg-left">
              Su Di Noi
            </h1>
            <h5 class="mb-4 btn-resize-mode h5-style mb-lg-5">
            Così come dovrebbe essere<br>
        Fin dal suo primo giorno nel settore, Associazioni offre ai suoi clienti un'ottima selezione di prodotti a prezzi imbattibili. Il nostro negozio online è diventato sinonimo di qualità e forniamo ai clienti un'ampia varietà di merci, tra cui alcuni prodotti in edizione limitata e articoli stagionali per tutte le tasche. Dai un'occhiata e inizia a comprare oggi stesso
            </h5>
          </div>
          <div class="col-md-3 col-sm-6 mb-3">
          </div>
        </div>
      </div>
    </div>



      <footer  id="footer" style='color: #ffffff;background-color: #FFFFC1;'>
        <?= $this->include('Layout/partial/footer'); ?>
      </footer>

    </div>
    <!-- Main container END -->


    <?= $this->include('Layout/partial/import_js'); ?>


  </body>
</html>

<style>
  #custom-style-title {
    font-family: cursive !important;
    /* text-shadow: #091 1px 0 10px; */
    text-transform:uppercase;
  }
</style>
