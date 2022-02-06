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
						<i class="fas fa-info-circle"></i> About
					</div>
					<div class="card-body">
						<p class="text-justify">Twitter Panel | Merupakan aplikasi yang dibuat untuk memudahkan pengguna dalam mengotomasi akun Twitter, secara sederhana merupakan aplikasi Social Media Marketing. Dibuat dengan menggunakan PHP, Codeigniter, Bootstrap, dan Fontawesome.</p>
						</p>
						<p class="text-justify">Proyek ini dibangun oleh Bagaskara Achmad Zaky (7708180096) | Prodi Teknologi Rekayasa Multimedia Fakultas Ilmu Terapan - Telkom University secara <b>Open Source</b> yang dapat dikembangkan secara bersama melalui <a href="http://github.com/zckyachmd/twitter-panel" class="text-decoration-none" target="_blank">github.com/zckyachmd/twitter-panel</a>.
						<h5 class="text-center">
							<a href="https://saweria.co/zckyachmd" class="badge badge-warning text-" target="_blank"><i class="fas fa-hand-holding-usd"></i> Donate</a>
						</h5>
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
