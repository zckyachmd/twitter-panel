<?php if ($this->session->flashdata('alert')) : ?>
	<div class="alert alert-dark" role="alert">
		<?= $this->session->flashdata('alert'); ?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
<?php endif; ?>
