<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

  <title>Login - Twitter Panel</title>

  <link rel="shortcut icon" href="<?= base_url('assets/img/twitter-logo.png'); ?>" type="image/x-icon">

  <link rel="stylesheet" href="<?= base_url('assets/libs/bootstrap/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/libs/fontawesome-free/css/all.min.css'); ?>" type="text/css" />
  <link rel="stylesheet" href="<?= base_url('assets/css/login.css') ?>">
</head>

<body class="text-center">
  <div class="form-signin">
    <img class="mb-3" src="assets/img/twitter-logo.png" alt="" width="72" height="72">
    <h1 class="h3 mb-5 font-weight-normal">Twitter Panel</h1>
    <?php if ($this->session->flashdata('error')) : ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= $this->session->flashdata('error'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php endif; ?>
    <a href="<?= base_url('auth/connect'); ?>" class="btn btn-md btn-dark btn-block">Sign in</a>
    <p class="mt-5 mb-3 text-muted"><i class="far fa-copyright"></i> 2020</p>
  </div>

  <script src="<?= base_url('assets/libs/jquery/jquery.min.js'); ?>"></script>
  <script src="<?= base_url('assets/libs/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
</body>

</html>