<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
  
  <link rel="shortcut icon" type="image/png" href="<?php echo base_url('public/favicon.png'); ?>">  
	<link href='https://fonts.googleapis.com/css?family=Lobster&display=swap&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="<?= base_url('public/css/all.min.css') ?>"/>
  <link rel="stylesheet" type="text/css" href="<?= base_url('public/css/animate.min.css') ?>"/>
  <link rel="stylesheet" type="text/css" href="<?= base_url('public/css/bootstrap.min.css') ?>"/>
  <link rel="stylesheet" type="text/css" href="<?= base_url('public/css/style.css') ?>"/>
	<link href='https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Poppins:100,500,700,40&display=swap&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
  <title>Home</title>    
<!-- Analytics -->
 
<!-- Analytics END -->
    
</head>
<body>

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
				<div class="text-center text-lg-right">
					<a href="login.html" class="btn mr-lg-3 btn-style btn-lg btn-clean float-lg-none btn-c-4129 btn-rd">Accedi</a>
					<div class="btn-group btn-dropdown dropdown bloc-style float-lg-none">
						<a href="#" class="btn dropdown-toggle btn-c-4129 btn-iscriviti-style btn-clean btn-lg pr-lg-4 btn-rd" data-toggle="dropdown" aria-expanded="false">Iscriviti</a>
						<ul class="dropdown-menu" role="menu">
							<li>
								<a href="register-associazione.html" class="dropdown-item a-block link-style text-lg-left">Associazione</a>
							</li>
							<li>
								<a href="register.html" class="dropdown-item a-block link-utente-style text-lg-left">Utente</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col">
				<h1 class="text-center h1-2-style threeD-t mx-auto d-block pl-lg-5 mt-lg-5 text-lg-center pt-lg-5 tc-7963">
					Associazioni Benefiche Bari
				</h1>
				<h3 class="mb-4 h3-style text-lg-center float-lg-none sm-shadow tc-7963 ml-lg-5">
					Benvenuto nel portale delle associazioni di Bari
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

<!-- bloc-2 -->
<div class="bloc full-width-bloc l-bloc scroll-fx-in-fade" id="bloc-2">
	<div class="container bloc-no-padding">
		<div class="row mb-lg-5 mt-lg-5">
			<div class="col-md-12 col-lg-6 offset-lg-1">
      <picture>
        <source type="image/webp" srcset="<?php echo base_url('public/img/lazyload-ph.png'); ?>" data-srcset="<?php echo base_url('public/img/ug_classe_bambini_1.webp'); ?>">
        <img src="<?php echo base_url('public/img/lazyload-ph.png'); ?>" data-src="<?php echo base_url('public/img/ug_classe_bambini_1.jpg'); ?>" class="img-fluid img-style float-lg-none ml-lg-5 mr-lg-0 img-rd-lg lazyload"
        alt="ug_classe_bambini_1" width="500" height="450">
      </picture>
			</div>
			<div class="align-self-center offset-md-1 col-md-10 col-sm-10 offset-sm-1 offset-1 col-10 col-lg-4 offset-lg-0">
				<h1 class="mg-md h1-style">
					Famiglia d'Africa
				</h1>
				<p>
					Famiglia d'Africa aiuta i bambini bisognosi dalla primissima infanzia fino all'età adulta. Li supporta sopperendo alla mancanza di risorse parentali o familiari. Non gode al momento di sponsorizzazioni pubbliche, ma si basa totalmente su aiuti e fondi privati. Il cuore della missione è l'Uganda, in modo particolare Kampala.<br>
				</p><a href="famiglia_africa.html" class="btn btn-lg btn-c-2169">Maggiori informazioni</a>
			</div>
		</div>
	</div>
</div>
<!-- bloc-2 END -->

<!-- bloc-3 -->
<div class="bloc full-width-bloc l-bloc" id="bloc-3">
	<div class="container bloc-no-padding">
		<div class="row mb-lg-5 mr-lg-5">
			<div class="order-md-0 col-md-12 col-lg-6 order-lg-1 ml-lg-0 offset-lg-0">
				<picture>
          <source type="image/webp" srcset="<?php echo base_url('public/img/lazyload-ph.png'); ?>" data-srcset="<?php echo base_url('public/img/CIAOVINNY-slide-2022.webp'); ?>">
          <img src="<?php echo base_url('public/img/lazyload-ph.png'); ?>" data-src="<?php echo base_url('public/img/CIAOVINNY-slide-2022.jpg'); ?>"
            class="img-fluid img-bloc-3-style img-rd-lg float-lg-right mr-lg-5 lazyload" alt="CIAOVINNY slide-2022" width="491" height="450"></picture>
			</div>
			<div class="align-self-center offset-md-1 col-md-10 col-lg-4 col-sm-10 offset-sm-1 col-10 offset-1 offset-lg-2">
				<h1 class="mg-md h1-ciao-vinny-style">
					Ciao Vinny
				</h1>
				<p>
					La Fondazione Ciao Vinny è impegnata dal 2002 nella sensibilizzazione sul tema della sicurezza stradale in tutta la regione, con particolare riferimento per alcune attività alla Provincia di Bari, dove ha sede.<br>La Fondazione è nata in memoria di Vincenzo Moretti, che perse la vita in un incidente stradale.<br>
				</p><a href="ciao_vinny.html" class="btn btn-lg btn-c-857">Maggiori informazioni</a>
			</div>
		</div>
	</div>
</div>
<!-- bloc-3 END -->

<!-- bloc-4 -->
<div class="bloc full-width-bloc bgc-6332 l-bloc" id="bloc-4">
	<div class="container bloc-no-padding">
		<div class="row mb-lg-5">
			<div class="col-md-12 col-lg-6 offset-lg-1">
				<picture>
          <source type="image/webp" srcset="<?php echo base_url('public/img/lazyload-ph.png'); ?>"
            data-srcset="<?php echo base_url('public/img/image-AMBULATORI.webp'); ?>">
            <img src="<?php echo base_url('public/img/lazyload-ph.png'); ?>" data-src="<?php echo base_url('public/img/image-AMBULATORI.jpg'); ?>" 
              class="img-fluid img-image-ambulato-style img-rd-lg float-lg-none ml-lg-5 lazyload" alt="image AMBULATORI" width="515" height="450"></picture>
			</div>
			<div class="align-self-center offset-md-1 col-md-10 col-sm-10 offset-sm-1 offset-1 col-10 col-lg-4 offset-lg-0">
				<h1 class="mg-md h1-lilt-style">
					LILT
				</h1>
				<p>
					LILT di Bari nasce con il compito di informare e divulgare la cultura della prevenzione, per far aumentare la consapevolezza che è la vera arma vincente per sconfiggere il cancro. Scopo principale è la sensibilizzazione alla prevenzione della malattia oncologica attraverso corretti stili di vita (prevenzione primaria) e diagnosi precoce (prevenzione secondaria).
				</p><a href="lilt.html" class="btn btn-lg btn-c-7512">Maggiori informazioni</a>
			</div>
		</div>
	</div>
</div>
<!-- bloc-4 END -->

<!-- bloc-5 -->
<div class="bloc full-width-bloc l-bloc" id="bloc-5">
	<div class="container bloc-no-padding">
		<div class="row mb-lg-5 mr-lg-5">
			<div class="order-md-0 col-md-12 col-lg-6 order-lg-1 offset-lg--1">
				<img src="<?php echo base_url('public/img/lazyload-ph.png'); ?>"
          data-src="<?php echo base_url('public/img/dcm_logo-retake.svg'); ?>"
          class="img-fluid img-dcm-logo-reta-style img-rd-lg float-lg-right mr-lg-5 lazyload" alt="dcm_logo retake" width="491" height="450">
			</div>
			<div class="align-self-center offset-md-1 col-md-10 col-lg-4 col-sm-10 offset-sm-1 col-10 offset-1 offset-lg-2">
				<h1 class="mg-md h1-retake-style">
					Retake
				</h1>
				<p>
					Retake Bari è impegnata nella lotta contro il degrado, nella valorizzazione dei beni pubblici e nella diffusione del senso civico sul territorio. È un movimento spontaneo di cittadini, no-profit e apartitico, che promuove la qualità, la vivibilità e la cura della città, mediante&nbsp;un insieme di eventi di mobilitazione civica, progetti educativi e partenariati pubblico-privati.<br>
				</p><a href="retake.html" class="btn btn-lg btn-c-2552">Maggiori informazioni</a>
			</div>
		</div>
	</div>
</div>
<!-- bloc-5 END -->

<!-- bloc-6 -->
<div class="bloc full-width-bloc l-bloc" id="bloc-6">
	<div class="container bloc-no-padding">
		<div class="row mb-lg-5">
			<div class="col-md-12 col-lg-6 offset-lg-1">
				<picture><source type="image/webp" srcset="<?php echo base_url('public/img/lazyload-ph.png'); ?>"
          data-srcset="<?php echo base_url('public/img/boy-1300136_1280-min.webp'); ?>">
          <img src="<?php echo base_url('public/img/lazyload-ph.png'); ?>" data-src="<?php echo base_url('public/img/boy-1300136_1280-min.png'); ?>"
            class="img-fluid img-bloc-6-style img-rd-lg float-lg-none ml-lg-5 lazyload" alt="boy 1300136_1280-min" width="500" height="450"></picture>
			</div>
			<div class="align-self-center offset-md-1 col-md-10 col-sm-10 offset-sm-1 offset-1 col-10 col-lg-4 offset-lg-0">
				<h1 class="mg-md h1-seconda-mamma-style">
					Seconda mamma
				</h1>
				<p>
					Seconda Mamma è nata per rispondere ai bisogni sempre più pressanti del territorio barese che vede molte famiglie con minori che versano in una condizione di disagio economico e/o sociale.<br>Opera tramite&nbsp;supporto psico-sociologico alle famiglie, bambini e persone in difficoltà; incontri socio-culturali; organizzazione di eventi benefici e tanto altro.
				</p><a href="seconda_mamma.html" class="btn btn-lg btn-c-5474">Maggiori informazioni</a>
			</div>
		</div>
	</div>
</div>
<!-- bloc-6 END -->

<!-- ScrollToTop Button -->
<a class="bloc-button btn btn-d scrollToTop" onclick="scrollToTarget('1',this)"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 32 32"><path class="scroll-to-top-btn-icon" d="M30,22.656l-14-13-14,13"/></svg></a>
<!-- ScrollToTop Button END-->


<!-- bloc-7 -->
<div class="bloc full-width-bloc b-parallax l-bloc" id="bloc-7">
	<div class="container bloc-lg bloc-sm-lg">
		<div class="row align-items-center ml-lg-0 no-gutters mt-lg-5">
			<div class="col-md-3 col-sm-6 align-self-center offset-lg-3">
				<h1 class="text-sm-left text-center h4-style text-lg-left">
					Contatti
				</h1>
				<h5 class="mb-4 btn-resize-mode h5-style mb-lg-5">
					e-mail:<br>telefono:
				</h5>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="text-center">
					<a href="index.html" class="btn btn-lg btn-c-6332 btn-clean">Inviaci una segnalazione</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- bloc-7 END -->

</div>
<!-- Main container END -->
    


<!-- Additional JS -->
<script src="<?= base_url('public/js/jquery.min.js') ?>"></script>
<script src="<?= base_url('public/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('public/js/blocs.min.js') ?>"></script>
<script src="<?= base_url('public/js/lazysizes.min.js') ?>"></script>
<script src="<?= base_url('public/js/scrollFX.js') ?>"></script>
<!-- Additional JS END -->


</body>
</html>
