<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title><?= $title; ?> - Twitter Panel</title>

	<link rel="shortcut icon" href="<?= base_url('assets/img/twitter-logo.png'); ?>" type="image/x-icon">

	<link rel="stylesheet" href="<?= base_url('assets/libs/bootstrap/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/libs/fontawesome-free/css/all.min.css'); ?>" type="text/css" />
	<link rel="stylesheet" href="<?= base_url('assets/libs/datatables/datatables.min.css'); ?>" type="text/css" />
	<link rel="stylesheet" href="<?= base_url('assets/css/home.css') ?>">
</head>

<body>
	<?php $this->load->view('layouts/_navbar'); ?>
	<div class="container my-auto">
		<div class="row justify-content-center mb-4">
			<div class="col-md-8">
				<?php $this->load->view('layouts/_alert'); ?>
				<div class="card bg-dark text-light">
					<div class="card-header">
						<i class="fa fa-bullhorn" aria-hidden="true"></i> Report
					</div>
					<div class="card-body">
						<?= form_open(current_url()); ?>
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
						<?= form_submit('submit', 'Run', ['class' => 'btn btn-light mt-2']); ?>
						<?= form_close(); ?>
					</div>
				</div>
			</div>
		</div>
		<?php $result = $this->session->flashdata('result'); ?>
		<?php if ($result) : ?>
			<div class="row justify-content-center mb-4">
				<div class="col-md-8 mb-5">
					<div class="card bg-light text-dark">
						<div class="card-header">
							<i class="fas fa-server"></i> Result
						</div>
						<div class="card-body">
							<table id="table_id" class="display">
								<thead>
									<tr>
										<th class="text-center" width="10%">No</th>
										<th>Username</th>
										<th class="text-center" width="25%">Status</th>
									</tr>
								</thead>
								<tbody>
									<?php for ($i = 0; $i < count($result); $i++) : ?>
										<tr>
											<td class="text-center" width="10%"><?= $i + 1; ?></td>
											<td>
												<a href="//twitter.com/<?= $result[$i]['username']; ?>" class="text-decoration-none" target="_blank">@<?= $result[$i]['username']; ?></a>
											</td>
											<td class="text-center" width="25%">
												<?= $result[$i]['status'] == 1 ? "<span class='badge badge-success'>Success</span>" : "<span class='badge badge-danger'>Failed</span>"; ?>
											</td>
										</tr>
									<?php endfor; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>
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
	<script src="<?= base_url('assets/libs/datatables/datatables.min.js') ?>" type="text/javascript"></script>
	<script>
		$(document).ready(function() {
			$('#table_id').DataTable();
		});
	</script>
</body>

</html>
