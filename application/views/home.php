<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Twitter Panel</title>

	<link rel="shortcut icon" href="<?= base_url('assets/img/twitter-logo.png'); ?>" type="image/x-icon">

	<link rel="stylesheet" href="<?= base_url('assets/libs/bootstrap/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/libs/fontawesome-free/css/all.min.css'); ?>" type="text/css" />
	<link rel="stylesheet" href="<?= base_url('assets/css/home.css') ?>">
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container">
			<a class="navbar-brand" href="<?= base_url('/'); ?>">
				<i class="fab fa-twitter"></i> Twitter Panel
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item active">
						<a class="nav-link" href="<?= base_url('/'); ?>"><i class="fas fa-home"></i> Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('auth/logout'); ?>"><i class="fas fa-sign-out-alt"></i> Logout</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container my-auto">
		<?php if ($this->session->flashdata('result')) : ?>
			<div class="alert alert-dark" role="alert">
				<?= $this->session->flashdata('result'); ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		<?php endif; ?>
		<div class="row justify-content-center mb-4">
			<div class="col-md-5 mx-4">
				<div class="card">
					<div class="card-header">
						<i class="fa fa-users" aria-hidden="true"></i> Follow
					</div>
					<div class="card-body">
						<?= form_open(base_url('home/follow'), "method='post'"); ?>
						<div class="form-group">
							<label for="username">Username</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="username">@</span>
								</div>
								<?= form_input(['class' => 'form-control', 'type' => 'text', 'name' => 'username', 'id' => 'username', 'placeholder' => 'zckyachmd', 'required' => true]); ?>
							</div>
						</div>
						<div class="form-group">
							<label for="total">Total</label>
							<?= form_input(['class' => 'form-control', 'type' => 'number', 'name' => 'total', 'id' => 'total', 'placeholder' => '100', 'required' => true]); ?>
						</div>
						<div class="form-group">
							<label for="follow">Action</label>
							<?php
							$options = [
								''        => 'Choose an action',
								'add'     => 'Added Follower',
								'reduce'  => 'Reduce Follower'
							];

							echo form_dropdown('follow', $options, '', ['class' => 'form-control', 'required' => true]);
							?>
						</div>
						<?= form_submit('submit', 'Submit', ['class' => 'btn btn-dark']); ?>
						<?= form_close(); ?>
					</div>
				</div>
			</div>
			<div class="col-md-5 mx-4">
				<div class="card bg-dark text-light">
					<div class="card-header">
						<i class="fa fa-bullhorn" aria-hidden="true"></i> Report
					</div>
					<div class="card-body">
						<?= form_open(base_url('home/report'), "method='post'"); ?>
						<div class="form-group">
							<label for="username">Username</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="username">@</span>
								</div>
								<?= form_input(['class' => 'form-control', 'type' => 'text', 'name' => 'username', 'id' => 'username', 'placeholder' => 'zckyachmd', 'required' => true]); ?>
							</div>
						</div>
						<div class="form-group">
							<label for="total">Total</label>
							<?= form_input(['class' => 'form-control', 'type' => 'number', 'name' => 'total', 'id' => 'total', 'placeholder' => '100', 'required' => true]); ?>
						</div>
						<div class="form-group">
							<label for="report">Action</label>
							<?php
							$options = [
								''        => 'Choose an action',
								'add'     => 'Added Report',
								// 'reduce'  => 'Reduce Report'
							];

							echo form_dropdown('report', $options, '', ['class' => 'form-control', 'required' => true]);
							?>
						</div>
						<?= form_submit('submit', 'Submit', ['class' => 'btn btn-light']); ?>
						<?= form_close(); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-5 mx-4 mb-5">
				<div class="card bg-dark text-light">
					<div class="card-header">
						<i class="fa fa-retweet" aria-hidden="true"></i> Retweet
					</div>
					<div class="card-body">
						<?= form_open(base_url('home/retweet'), "method='post'"); ?>
						<div class="form-group">
							<label for="id">ID Tweet</label>
							<div class="input-group">
								<?= form_input(['class' => 'form-control', 'type' => 'text', 'name' => 'id', 'id' => 'id', 'placeholder' => '1351107657210462208', 'required' => true]); ?>
							</div>
						</div>
						<div class="form-group">
							<label for="total">Total</label>
							<?= form_input(['class' => 'form-control', 'type' => 'number', 'name' => 'total', 'id' => 'total', 'placeholder' => '100', 'required' => true]); ?>
						</div>
						<div class="form-group">
							<label for="retweet">Action</label>
							<?php
							$options = [
								''        => 'Choose an action',
								'add'     => 'Added Retweet',
								'reduce'  => 'Reduce Retweet'
							];

							echo form_dropdown('retweet', $options, '', ['class' => 'form-control', 'required' => true]);
							?>
						</div>
						<?= form_submit('submit', 'Submit', ['class' => 'btn btn-light']); ?>
						<?= form_close(); ?>
					</div>
				</div>
			</div>
			<div class="col-md-5 mx-4 mb-5">
				<div class="card">
					<div class="card-header">
						<i class="fa fa-heart" aria-hidden="true"></i> Favorite
					</div>
					<div class="card-body">
						<?= form_open(base_url('home/favorite'), "method='post'"); ?>
						<div class="form-group">
							<label for="id">ID Tweet</label>
							<div class="input-group">
								<?= form_input(['class' => 'form-control', 'type' => 'text', 'name' => 'id', 'id' => 'id', 'placeholder' => '1351107657210462208', 'required' => true]); ?>
							</div>
						</div>
						<div class="form-group">
							<label for="total">Total</label>
							<?= form_input(['class' => 'form-control', 'type' => 'number', 'name' => 'total', 'id' => 'total', 'placeholder' => '100', 'required' => true]); ?>
						</div>
						<div class="form-group">
							<label for="favorite">Action</label>
							<?php
							$options = [
								''        => 'Choose an action',
								'add'     => 'Added Favorite',
								'reduce'  => 'Reduce Favorite'
							];

							echo form_dropdown('favorite', $options, '', ['class' => 'form-control', 'required' => true]);
							?>
						</div>
						<?= form_submit('submit', 'Submit', ['class' => 'btn btn-dark']); ?>
						<?= form_close(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<footer class="footer fixed-bottom bg-dark">
		<div class="container text-center">
			<span class="text-white">Copyright 2020 <i class="far fa-copyright"></i> Made with <i class="fas fa-heart"></i> by <a href=" https://www.zacky.id" target="_blank" class="text-decoration-none text-white">Zacky Achmad</a></span>
		</div>
	</footer>

	<script src="<?= base_url('assets/libs/jquery/jquery.min.js'); ?>"></script>
	<script src="<?= base_url('assets/libs/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
</body>

</html>
