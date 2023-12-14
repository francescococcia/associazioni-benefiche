<!-- bloc-1 -->
<div class="bloc sticky-nav bgc-Yellow l-bloc">
	<div class="container bloc-no-padding">
		<div class="row">
			<div class="col ps-lg-3 pe-lg-3 ps-0 pe-0 ps-sm-2 pe-sm-2">
				<nav class="navbar navbar-light row navbar-expand-md" role="navigation">
					<div class="container-fluid">
						<a class="navbar-brand brand ltc-2190 link-bloc-1-style" href="<?php echo base_url();?>/">
              <picture>
                <source type="image/webp" srcset="<?= base_url('public/img/logo.webp'); ?>">
                <img src="<?= base_url('public/img/log.png'); ?>" alt="logo" class="me-2" width="60" height="50">
              </picture>MANI GENEROSE</a>
						<button id="nav-toggle" type="button" class="ui-navbar-toggler navbar-toggler border-0 p-0 ms-auto" aria-expanded="false" aria-label="Toggle navigation" data-bs-toggle="collapse" data-bs-target=".navbar-18508">
							<span class="navbar-toggler-icon"><svg height="32" viewBox="0 0 32 32" width="32"><path class="svg-menu-icon" d="m2 9h28m-28 7h28m-28 7h28"></path></svg></span>
						</button>
						<div class="collapse navbar-collapse navbar-18508 justify-content-end">
								<ul class="site-navigation nav navbar-nav ms-auto">
                  <?php if (!session()->get('isAdmin')): ?>
                    <li class="nav-item <?php echo (service('request')->uri->getSegment(1) === 'events') ? 'active' : ''; ?>">
                      <a href="<?php echo base_url();?>/events" class="nav-link strokeme">Eventi</a>
                    </li>
                  <?php endif; ?>

									<?php if (!session()->get('isAdmin')): ?>
                    <li class="nav-item <?php echo (service('request')->uri->getSegment(1) === 'store') ? 'active' : ''; ?>">
                      <a href="<?php echo base_url();?>/store" class="nav-link strokeme">Prodotti</a>
                    </li>
                  <?php endif; ?>
									<li class="nav-item <?php echo (service('request')->uri->getSegment(1) === 'chi-siamo') ? 'active' : ''; ?>">
										<a href="<?php echo base_url();?>/chi-siamo" class="nav-link strokeme">Chi siamo</a>
										<!-- <a href="./chi-siamo/" class="nav-link a-btn ltc-7963">Chi siamo</a> -->
									</li>

                  <?php if (session()->get('isLoggedIn')): ?>
                    <li class="nav-item <?php echo (service('request')->uri->getSegment(1) === 'cash-desk') ? 'active' : ''; ?>">
                      <a href="<?php echo base_url();?>/cash-desk" class="nav-link strokeme">Cassa</a>
                    </li>
                  <?php endif; ?>

                  <?php if (session()->get('isLoggedIn')): ?>

                    <div class="navbar-content-area">

                      <!-- Updated nav-item dropdown structure -->
                      <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          <?php if (session()->get('isPlatformManager')): ?>
                          <i class="fas fa-user"></i> <?= session()->get('nameAssociation')?>
                        <?php else: ?>
                          <i class="fas fa-user"></i> <?= session()->get('first_name')?>
                        <?php endif; ?>
                        </a>
                        <ul class="dropdown-menu justify-content-end" aria-labelledby="navbarDropdown">
                          <li>
                            <?php if (session()->get('isPlatformManager')): ?>
                              <!-- <a class="dropdown-item" href="<#?= site_url('/profile-manager') ?>">Profilo</a> -->
                              <a class="dropdown-item" href="<?= site_url('associations/'.session()->get('id')) ?>">Profilo</a>
                            <?php else: ?>
                              <a class="dropdown-item" href="<?php echo base_url();?>/profile">Modifica Profilo</a> 
                            <?php endif; ?>
                          </li>
                          <li>
                              <?php if (!session()->get('isPlatformManager') && !session()->get('isAdmin')): ?>
                              <a class="dropdown-item" href="<?php echo base_url();?>/joined-events">I miei eventi</a>
                              <a class="dropdown-item" href="<?php echo base_url();?>/cash">I miei prodotti</a>
                            <?php endif; ?>
                          </li>
                          <li>
                              <?php if (session()->get('isPlatformManager') ): ?>
                              <a class="dropdown-item" href="<?php echo base_url();?>/events-manager">I nostri eventi</a>
                              <a class="dropdown-item" href="<?php echo base_url();?>/store-manager">I nostri prodotti</a>
                            <?php endif; ?>
                          </li>
                          <li>


                            <?php if (session()->get('isAdmin')): ?>
                              <a class="dropdown-item" href="<?php echo base_url();?>/admin/users">Privati</a>
                              <a class="dropdown-item" href="<?php echo base_url();?>/admin/associations">Associazioni</a>
                              <a class="dropdown-item" href="<?php echo base_url();?>/admin/events">Eventi</a>
                              <a class="dropdown-item" href="<?php echo base_url();?>/admin/products">Prodotti</a>
                              <a class="dropdown-item" href="<?php echo base_url();?>/admin/reports">Segnalazioni</a>
                            <?php endif; ?>
                          </li>
                          <li>
                              <a class="dropdown-item" href="<?php echo base_url('/logout'); ?>">Esci</a>
                          </li>
                        </ul>
                      </li>
                    </div>

                  <?php endif; ?>
								</ul>
							</div>

              <?php if (session()->get('isLoggedIn')): ?>
                <?php if (session()->get('isAdmin')): ?>

                  <div class="navbar-content-area col text-lg-start">
                    <div class="text-lg-end">
                      <a href="<?php echo base_url();?>/admin/dashboard" class="btn mr-lg-3 btn-style btn-md btn-clean btn-c-4129 btn-rd primary-btn fill-mob-btn">
                        Dashboard
                      </a>
                    </div>
                  </div>
                <?php endif; ?>
              <?php else: ?>

                  <div class="navbar-content-area col text-lg-start">
                    <div class="row text-lg-end">
                      <div class="col-xs-3 mr-lg-3 mr-3">
                        <a href="<?php echo base_url();?>/signin"
                          class="btn btn-md btn-clean btn-c-4129 btn-rd box-btn primary-btn fill-mob-btn">
                          Accedi
                        </a>
                      </div>
                      <div class="col-xs-3 btn-group btn-dropdown dropdown bloc-style float-lg-none">
                        <a href="#" class="btn dropdown-toggle btn-c-4129 btn-iscriviti-style btn-clean btn-md pr-lg-4 btn-rd box-btn primary-btn fill-mob-btn" aria-expanded="false" data-bs-toggle="dropdown">Iscriviti</a>
                        <ul class="dropdown-menu justify-content-end" role="menu">
                          <li>
                            <a href="<?php echo base_url();?>/signup-association" class="dropdown-item a-block link-style text-lg-start">
                              Associazione
                            </a>
                          </li>
                          <li>
                            <a href="<?php echo base_url();?>/signup" class="dropdown-item a-block link-utente-style text-lg-start">
                              Privato
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="text-center text-lg-end">
                    <div class="btn-group btn-dropdown dropdown bloc-style float-lg-none">
                      <ul class="dropdown-menu" role="menu">
                        <li>
                          <a href="./" class="dropdown-item a-block link-style text-lg-start">Associazione</a>
                        </li>
                        <li>
                          <a href="./" class="dropdown-item a-block link-utente-style text-lg-start">Utente</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                <?php endif; ?>
					</div>
				</nav>
			</div>
		</div>
	</div>
</div>
<!-- bloc-1 END -->