<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <title>UBAH DATA OBAT</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-success">
  <a class="navbar-brand" href="#">
    <img src="img/pharmacy.svg" width="60" height="60" alt="logo">
  </a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <strong>DATA</strong>
        </a>
        <div class="dropdown-menu bg-success" aria-labelledby="navbarDropdown">
          <a class="dropdown-item text-light" href="data_obat.php"><strong>DATA OBAT</strong></a>
          <a class="dropdown-item text-light" href="obat_masuk.php"><strong>DATA OBAT MASUK</strong></a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <strong>LAPORAN</strong>
        </a>
        <div class="dropdown-menu bg-success" aria-labelledby="navbarDropdown">
          <a class="dropdown-item text-light" href="laporan_data_obat.php"><strong>LAPORAN DATA OBAT</strong></a>
          <a class="dropdown-item text-light" href="laporan_obat_masuk.php"><strong>LAPORAN OBAT MASUK</strong></a>
        </div>
      </li>
      <li class="nav-item active">
        <a class="nav-link text-light" href="admin.php"><strong>ADMIN</strong> <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link text-light" href="logout.php"><strong>LOGOUT</strong> <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="data_obat.php" method="get">
      <input class="form-control mr-sm-2 col-auto" type="search" placeholder="Nama Obat" aria-label="Search" name="cari">
      <button class="btn btn-outline-success my-2 my-sm-0 text-white" style="background-color:#BDDFBC" type="submit"><strong>CARI</strong></button>
    </form>
  </div>
</nav>
<div class="container">
  <div class="row" style="margin-bottom: 50px; margin-top: 50px;">
    <div class="col text-center">
      <h1 class="text-success"><strong>FORM UBAH DATA OBAT</strong></h1>
    </div>
  </div>
<!-- FORM -->
<?php
    require_once("koneksi.php");
    session_start();
    if (!isset($_SESSION['idAdmin'])){
      header('location: login.php');
    }
    if (!isset($_GET['cari'])) {
      $kode = $_GET['kode'];
      $sqlObat = "SELECT * FROM data_obat
                  WHERE  kode_obat = '$kode'";
      
    } else {
      $cari = ucwords($_GET['cari']);
      $sqlObat = "SELECT * FROM data_obat
                  WHERE  nama_obat = '$cari'";
    }
    
    $queryObat = mysqli_query($connect,$sqlObat);
    $row = mysqli_fetch_assoc($queryObat);    
?>
<div class="row">
  <div class="col">
<form action="proses_ubah.php?kode=<?php echo $row['kode_obat'];?>" method="post"> 
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputNama">NAMA OBAT</label>
    </div>
    <div class="form-group col-md-8">
      <input type="text" class="form-control" id="inputNama" name="nama" value="<?php echo $row['nama_obat']?>" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputJumlah">JUMLAH OBAT</label>
    </div>
    <div class="form-group col-md-8">
      <input type="text" class="form-control" id="inputJumlah" name="jumlah" value="<?php echo $row['stok']?>" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputHarga">HARGA JUAL (RUPIAH)</label>
    </div>
    <div class="form-group col-md-8">
      <input type="text" class="form-control" id="inputHarga" name="harga" value="<?php echo $row['harga_jual']?>" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputJumlah">Satuan</label>
    </div>
    <div class="form-group col-md-4">
      <div class="custom-control custom-radio">
        <input type="radio" id="botol" name="satuan" class="custom-control-input" value="Botol" <?php if ($row['satuan'] == "Botol") {echo "checked";} ?>>
        <label class="custom-control-label" for="botol">Botol</label>
      </div>
    </div>
    <div class="form-group col-md-4">
      <div class="custom-control custom-radio">
        <input type="radio" id="tablet" name="satuan" class="custom-control-input" value="Tablet" <?php if ($row['satuan'] == "Tablet") {echo "checked";} ?>>
        <label class="custom-control-label" for="tablet">Tablet</label>
      </div>
  </div>
  <div class="form-row">
      <button type="submit" class="btn btn-ubah">UBAH DATA OBAT</button>
  </div>
  </form>
  </div>
</div>
<div class="container">
<div class="row">
  <div class="col text-success text-center sukses">
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
