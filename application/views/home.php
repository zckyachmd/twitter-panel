<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title><?= $title; ?> - Twitter Panel</title>

	<link rel="shortcut icon" href="<?= base_url('assets/img/twitter-logo.png'); ?>" type="image/x-icon">

	<link rel="stylesheet" href="<?= base_url('assets/libs/bootstrap/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/libs/fontawesome-free/css/all.min.css'); ?>" type="text/css" />
	<link rel="stylesheet" href="<?= base_url('assets/css/home.css') ?>">
</head>

<body>
	<?php $this->load->view('layouts/_navbar'); ?>
	<div class="container my-auto">
		<?php $this->load->view('layouts/_alert'); ?>
		<div class="row justify-content-center">
			<div class="col-md-11 mb-5">
				<div class="card bg-dark text-light">
					<div class="card-header">
						<i class="fa fa-users" aria-hidden="true"></i> Users <span class="badge badge-light"><?= count($users); ?></span>
					</div>
					<div class="card-body text-center">
						<?php for ($i = 0; $i < count($users); $i++) : ?>
							<a href="http://twitter.com/<?= $users[$i]['username']; ?>" target="_blank">
								<img src="<?= $users[$i]['avatar']; ?>" class="rounded-circle" width="75px" title="Twitter: @<?= $users[$i]['username']; ?>">
							</a>
						<?php endfor; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	<footer class="footer fixed-bottom bg-dark">
		<div class="container text-center">
			<span class="text-white">
				Copyright <?= date('Y'); ?> <i class="far fa-copyright"></i> <a href=" https://www.zacky.id" target="_blank" class="text-decoration-none text-white">Zacky Achmad</a>
			</span>
		</div>
	</footer>

	<script src="<?= base_url('assets/libs/jquery/jquery.min.js'); ?>"></script>
	<script src="<?= base_url('assets/libs/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
</body>

</html>
