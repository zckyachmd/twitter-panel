<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="container">
		<a class="navbar-brand" href="<?= base_url('/'); ?>">
			<i class="fab fa-twitter mr-1"></i> Twitter Panel
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('/'); ?>"><i class="fas fa-home"></i> Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fas fa-cogs"></i> Tools
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="<?= base_url('tools/follow'); ?>"><i class="fa fa-users" aria-hidden="true"></i> Follow</a>
						<a class="dropdown-item" href="<?= base_url('tools/report'); ?>"><i class="fa fa-bullhorn" aria-hidden="true"></i> Report</a>
						<a class="dropdown-item" href="<?= base_url('tools/retweet'); ?>"><i class="fa fa-retweet" aria-hidden="true"></i> Retweet</a>
						<a class="dropdown-item" href="<?= base_url('tools/favorite'); ?>"><i class="fa fa-heart" aria-hidden="true"></i> Favorite</a>
						<a class="dropdown-item" href="<?= base_url('tools/reply'); ?>"><i class="fa fa-reply" aria-hidden="true"></i> Reply</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="https://saweria.co/zckyachmd" target="_blank"><i class="fas fa-hand-holding-usd"></i> Donate</a>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('about'); ?>"><i class="fas fa-info-circle"></i> About</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('logout'); ?>"><i class="fas fa-sign-out-alt"></i> Logout</a>
				</li>
			</ul>
		</div>
	</div>
</nav>
