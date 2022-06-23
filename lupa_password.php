<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <title>LUPA PASSWORD</title>
  </head>
  <body style="background-color: #CEDFD2">
<nav class="navbar navbar-light bg-success justify-content-center">
  <a class="navbar-brand" href="#">
  <img class="logo" src="img/pharmacy.svg" width="75px" alt="Logo">
  </a>
</nav>
<!-- card -->
<div class="container">
  <div class="row">
    <div class="col text-center text-success" style="margin: 20px">
      <h1><strong>ARF PHARMACY</strong></h1>
    </div>
  </div>
  <div class="row">
    <div class="col text-center box-login">
      <div class="card text-center">
        <div class="card-header">
          <h1 style="color: #808080;">PASSWORD BARU</h1>
        </div>
        <form action="proses_lupa.php" method="post" id="login">
        <div class="card-body">
        <?php 
        if(isset($_GET['status'])){
          if ($_GET['status'] == 'gagal') {
            echo "username / password salah<br><br>";
          }
        }
        ?>
        <div class="form-row">
            <div class="form-group col-md-4">
              <label for="inputNamaLengkap" style="color: #808080;"><strong>NAMA LENGKAP</strong></label>
            </div>
            <div class="form-group col-md-6">
              <input type="text" class="form-control" id="inputNamaLengkap" name="nama_lengkap" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="inputUsername" style="color: #808080;"><strong>USERNAME</strong></label>
            </div>
            <div class="form-group col-md-6">
              <input type="text" class="form-control" id="inputUsername" name="username" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="inputNewPassword" style="color: #808080;"><strong>NEW PASSWORD</strong></label>
            </div>
            <div class="form-group col-md-6">
              <input type="password" class="form-control" id="inputPassword" name="new_password" required>
            </div>
          </div>
          <button type="submit" form="login" class="btn btn-info">CONFIRM</button>
        </div>
        </form>
        <div class="card-footer text-muted">
          <a href="login.php" style="color: #808080">Login</a>
        </div>
      </div>
    </div>
  </div>
</div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>