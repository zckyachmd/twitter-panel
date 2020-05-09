<?php
require "vendor/autoload.php";

// Memuat Library Api Twitter
use Abraham\TwitterOAuth\TwitterOAuth;

// Connecting to database
$db_host = "localhost";  // Database Server
$db_user = "root";       // Database Username
$db_pass = "";           // Database Password
$db_name = "bot";        // Database Name
$connect_db = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Connecting to Apps Twitter
define("CONSUMER_KEY", "#####################################################"); // Consumer Key Apps Twitter
define("CONSUMER_SECRET", "##################################################"); // Counsumer Secret Apps Twitter

$i = 0;
$reject = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $get_bot = mysqli_query($connect_db, "SELECT * FROM twitter_access_tokens ORDER BY RAND() LIMIT " . $_POST['jumlah'] . "");

  if ($_POST['jumlah'] > mysqli_num_rows($get_bot)) {
    $msg = "Jumlah melebihi batas!";
    $reject = true;
  }

  if ($reject != true) {
    foreach ($get_bot as $key => $bot) {
      $connect_bot = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $bot['oauth_token'], $bot['oauth_token_secret']);

      if (isset($_POST['follow']) && $_POST['follow'] == 'tambah') {
        $connect_bot->post('friendships/create', ['screen_name' => $_POST['username']]);
      } else if (isset($_POST['follow']) && $_POST['follow'] == 'kurang') {
        $connect_bot->post('friendships/destroy', ['screen_name' => $_POST['username']]);
      }

      if (isset($_POST['retweet']) && $_POST['retweet'] == 'tambah') {
        $connect_bot->post('statuses/retweet', ['id' => $_POST['id']]);
      } else if (isset($_POST['retweet']) && $_POST['retweet'] == 'kurang') {
        $connect_bot->post('statuses/unretweet', ['id' => $_POST['id']]);
      }

      if (isset($_POST['favorite']) && $_POST['favorite'] == 'tambah') {
        $connect_bot->post('favorites/create', ['id' => $_POST['id']]);
      } else if (isset($_POST['favorite']) && $_POST['favorite'] == 'kurang') {
        $connect_bot->post('favorites/destroy', ['id' => $_POST['id']]);
      }

      if ($connect_bot->getLastHttpCode() == 200) {
        $i++;
      }

      if ($i > 0) {
        $msg = "Successfully action $i users";
      }
    }
  }
}
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Twitter Panel</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="shortcut icon" href="https://abs.twimg.com/favicons/twitter.ico" type="image/x-icon">
</head>

<body>
  <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
    <div class="container justify-content-center">
      <a class="navbar-brand" href="/">
        <img src="https://abs.twimg.com/favicons/twitter.ico" width="30" height="30" class="d-inline-block align-top" alt="Twitter Panel">
        Twitter Panel by <small>Zacky Achmad</small>
      </a>
    </div>
  </nav>
  <div class="container">
    <?php if (isset($msg)) : ?>
      <div class="card-body">
        <div class="alert alert-dark" role="alert">
          <?= $msg; ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
    <?php endif; ?>
    <div class="row justify-content-center my-5">
      <div class="col-md-5">
        <div class="card">
          <div class="card-header">
            <i class="fa fa-users" aria-hidden="true"></i> Follow
          </div>
          <div class="card-body">
            <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
              <div class="form-group">
                <label for="username">Username</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="username">@</span>
                  </div>
                  <input type="text" class="form-control" id="username" name="username" required>
                </div>
              </div>
              <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" required>
              </div>
              <div class="form-group">
                <label for="follow">Action</label>
                <select class="form-control" id="follow" name="follow">
                  <option value="tambah">Tambah</option>
                  <option value="kurang">Kurang</option>
                </select>
              </div>
              <button type="submit" class="btn btn-dark">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="row justify-content-center my-5">
      <div class="col-md-5">
        <div class="card">
          <div class="card-header">
            <i class="fa fa-retweet" aria-hidden="true"></i> Retweet
          </div>
          <div class="card-body">
            <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
              <div class="form-group">
                <label for="id">ID Tweet</label>
                <input type="number" class="form-control" id="id" name="id" required>
              </div>
              <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" required>
              </div>
              <div class="form-group">
                <label for="retweet">Action</label>
                <select class="form-control" id="retweet" name="retweet">
                  <option value="tambah">Tambah</option>
                  <option value="kurang">Kurang</option>
                </select>
              </div>
              <button type="submit" class="btn btn-dark">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="row justify-content-center my-5">
      <div class="col-md-5">
        <div class="card">
          <div class="card-header">
            <i class="fa fa-heart" aria-hidden="true"></i> Favorite
          </div>
          <div class="card-body">
            <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
              <div class="form-group">
                <label for="id">ID Tweet</label>
                <input type="number" class="form-control" id="id" name="id" required>
              </div>
              <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" required>
              </div>
              <div class="form-group">
                <label for="favorite">Action</label>
                <select class="form-control" id="favorite" name="favorite">
                  <option value="tambah">Tambah</option>
                  <option value="kurang">Kurang</option>
                </select>
              </div>
              <button type="submit" class="btn btn-dark">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="bottom bg-dark text-white">
    <div class="container pt-3">
      <div class="row">
        <div class="col text-center">
          <p>Copyright 2020 &copy; Zetbot Indonesia All Right Reserved • Made with &#10084; By <a href="https://www.zacky.id" target="_blank" class="text-decoration-none text-white">Zacky Achmad</a></p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>