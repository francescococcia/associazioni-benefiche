<!-- bloc-6 -->
<div class="bloc l-bloc" style='background-color: #FFFFC1'>
<!-- #ffffc1; -->
	<div class="container bloc-sm">
		<div class="row">
			<div class="col">
				<nav class="navbar navbar-light row navbar-expand-md" role="navigation">
					<a class="navbar-brand strokeme" href="<?php echo base_url();?>/">MANI GENEROSE</a>
					<button id="nav-toggle" type="button" class="ml-auto ui-navbar-toggler navbar-toggler border-0 p-0" data-toggle="collapse" data-target=".navbar-38523" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"><svg height="32" viewBox="0 0 32 32" width="32"><path class="svg-menu-icon" d="m2 9h28m-28 7h28m-28 7h28"></path></svg></span>
					</button>
					<div class="collapse navbar-collapse navbar-38523">
						<ul class="site-navigation nav navbar-nav ml-auto">

              <li class="nav-item">
                <div class="dropdown-divider">
                </div>
              </li>

              <?php if (!session()->get('isAdmin')): ?>
                <li class="nav-item <?php echo (service('request')->uri->getSegment(1) === 'events') ? 'active' : ''; ?>">
                  <a href="<?php echo base_url();?>/events" class="nav-link strokeme">Eventi</a>
                </li>
              <?php endif; ?>

							<!-- <#?php if (!session()->get('isLoggedIn')): ?>
								<li class="nav-item <#?php echo (service('request')->uri->getSegment(1) === 'events' &&
									service('request')->uri->getSegment(2) === 'search' || service('request')->uri->getSegment(1) === 'results') ? 'active' : ''; ?>">
									<a href="<#?php echo base_url();?>/events/search" class="nav-link strokeme">Cerca Eventi</a>
								</li>
							<#?php endif; ?> -->


              <?php if (!session()->get('isAdmin')): ?>
                <li class="nav-item <?php echo (service('request')->uri->getSegment(1) === 'store') ? 'active' : ''; ?>">
                  <a href="<?php echo base_url();?>/store" class="nav-link strokeme">Prodotti</a>
                </li>
              <?php endif; ?>

              <?php if (session()->get('isLoggedIn') ): ?>
                <li class="nav-item <?php echo (service('request')->uri->getSegment(1) === 'cash-desk') ? 'active' : ''; ?>">
                  <a href="<?php echo base_url();?>/cash-desk" class="nav-link strokeme">Cassa</a>
                </li>
              <?php endif; ?>

							<?php if (session()->get('isLoggedIn')): ?>
                <li class="nav-item dropdown">
                  <a class="nav-link strokeme dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php if (session()->get('isPlatformManager')): ?>
                      <i class="fas fa-user"></i> <?= session()->get('nameAssociation')?>
                    <?php else: ?>
                      <i class="fas fa-user"></i> <?= session()->get('first_name')?>
                    <?php endif; ?>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php if (session()->get('isPlatformManager')): ?>
                      <!-- <a class="dropdown-item" href="<#?php echo base_url();?>/profile-manager">Profilo</a> -->
                      <a class="dropdown-item" href="<?= site_url('/profile-manager') ?>">Profilo</a>
                    <?php else: ?>
                      <a class="dropdown-item" href="<?php echo base_url();?>/profile">Profilo</a> 
                    <?php endif; ?>

                    <?php if (!session()->get('isPlatformManager') && !session()->get('isAdmin')): ?>
                      <a class="dropdown-item" href="<?php echo base_url();?>/joined-events">I miei eventi</a>
                      <a class="dropdown-item" href="<?php echo base_url();?>/cash">I miei prodotti</a>
                    <?php endif; ?>

                    <?php if (session()->get('isAdmin')): ?>
                      <a class="dropdown-item" href="<?php echo base_url();?>/admin/users">Utenti</a>
                      <a class="dropdown-item" href="<?php echo base_url();?>/admin/associations">Associazioni</a>
                      <a class="dropdown-item" href="<?php echo base_url();?>/admin/events">Eventi</a>
                      <a class="dropdown-item" href="<?php echo base_url();?>/admin/reports">Segnalazioni</a>
                    <?php endif; ?>
                    <a class="dropdown-item" href="<?php echo base_url('/logout'); ?>">Logout</a>
                  </div>
                </li>
							<?php endif; ?>

            </ul>
					</div>
				</nav>
			</div>
		</div>
	</div>
</div>

<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light" style='background-color: #FFFFC1!important;'>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="#">Features</a>
      <a class="nav-item nav-link" href="#">Pricing</a>
      <a class="nav-item nav-link disabled" href="#">Disabled</a>
    </div>
  </div>
</nav> -->
<!-- bloc-6 END -->
