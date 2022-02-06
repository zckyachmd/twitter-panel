<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title><?= $title; ?> - Twitter Panel</title>

	<link rel="shortcut icon" href="<?= base_url('assets/img/twitter-logo.png'); ?>" type="image/x-icon">

	<link rel="stylesheet" href="<?= base_url('assets/libs/bootstrap/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/libs/fontawesome-free/css/all.min.css'); ?>" type="text/css" />
	<link rel="stylesheet" href="<?= base_url('assets/css/login.css') ?>">
</head>

<body class="text-center">
	<div class="form-signin">
		<img class="mb-3" src="<?= base_url('assets/img/twitter-logo.png'); ?>" alt="" width="72" height="72">
		<h1 class="h3 mb-5 font-weight-normal">Twitter Panel</h1>
		<?php $this->load->view('layouts/_alert'); ?>
		<a href="<?= base_url('auth/connect'); ?>" class="btn btn-md btn-dark btn-block">Sign in With Twitter</a>
		<p class="mt-5 mb-3">
			<span class="text-muted">
				Copyright <?= date('Y'); ?> <i class="far fa-copyright"></i> <a href="https://www.zacky.id" class="text-decoration-none">Zacky Achmad</a>
			</span>
		</p>
	</div>

	<script src="<?= base_url('assets/libs/jquery/jquery.min.js'); ?>"></script>
	<script src="<?= base_url('assets/libs/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
</body>

</html>
