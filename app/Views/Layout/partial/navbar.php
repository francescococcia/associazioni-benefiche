<!-- bloc-6 -->
<div class="bloc l-bloc" id="bloc-6">
	<div class="container bloc-sm">
		<div class="row">
			<div class="col">
				<nav class="navbar navbar-light row navbar-expand-md" role="navigation">
					<a class="navbar-brand" href="<?php echo base_url();?>/">Associazioni Benefiche Bari</a>
					<button id="nav-toggle" type="button" class="ml-auto ui-navbar-toggler navbar-toggler border-0 p-0" data-toggle="collapse" data-target=".navbar-38523" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"><svg height="32" viewBox="0 0 32 32" width="32"><path class="svg-menu-icon" d="m2 9h28m-28 7h28m-28 7h28"></path></svg></span>
					</button>
					<div class="collapse navbar-collapse navbar-38523">
						<ul class="site-navigation nav navbar-nav ml-auto">

							<?php if (session()->get('isLoggedIn')): ?>
								<li class="nav-item <?php echo (service('request')->uri->getSegment(1) === 'dashboard') ? 'active' : ''; ?>">
									<a href="<?php echo base_url();?>/dashboard" class="nav-link">Home</a>
								</li>
								<li class="nav-item">
									<div class="dropdown-divider">
									</div>
								</li>

								<li class="nav-item <?php echo (service('request')->uri->getSegment(1) === 'events') ? 'active' : ''; ?>">
									<a href="<?php echo base_url();?>/events" class="nav-link">Eventi</a>
								</li>
							<?php endif; ?>

							<?php if (!session()->get('isLoggedIn')): ?>
								<li class="nav-item <?php echo (service('request')->uri->getSegment(1) === 'events' &&
									service('request')->uri->getSegment(2) === 'search') ? 'active' : ''; ?>">
									<a href="<?php echo base_url();?>/events/search" class="nav-link">Cerca Eventi</a>
								</li>
							<?php endif; ?>

							<li class="nav-item <?php echo (service('request')->uri->getSegment(1) === 'store') ? 'active' : ''; ?>">
								<a href="<?php echo base_url();?>/store" class="nav-link">Store</a>
							</li>

							<li class="nav-item <?php echo (service('request')->uri->getSegment(1) === '') ? 'active' : ''; ?>">
								<a href="<?php echo base_url();?>/" class="nav-link">Carrello</a>
							</li>
							<li class="nav-item">
								<a href="index.html" class="nav-link">Chi siamo</a>
							</li>
							<li class="nav-item">
								<a href="index.html" class="nav-link">Cassa</a>
							</li>
							<li class="nav-item">
								<a href="index.html" class="nav-link">Contatti</a>
							</li>
							<li class="nav-item">
								<a href="lilt.html" class="a-btn nav-link">lilty</a>
							</li>
							<?php if (session()->get('isLoggedIn')): ?>
								<li class="nav-item">
									<div class="dropdown">
										<button id="dLabel" type="button" class='btn btn-primary mb-2' data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											Dropdown trigger
										</button>
										<div class="dropdown-menu" aria-labelledby="dLabel">
											<a class="dropdown-item" href="<?php echo base_url();?>/profile">Profilo</a>
											<?php if (session()->get('isAdmin')): ?>
												<a class="dropdown-item" href="<?php echo base_url();?>/admin/users">Clienti</a>
												<a class="dropdown-item" href="<?php echo base_url();?>/admin/events">Eventi</a>
												<a class="dropdown-item" href="<?php echo base_url();?>/admin/reports">Segnalazioni</a>
											<?php endif; ?>
											<a class="dropdown-item" href="#">Something else here</a>
											<a class="dropdown-item" href="<?php echo base_url('/logout'); ?>">Logout</a>
										</div>
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
<!-- bloc-6 END -->
