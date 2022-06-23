<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <title>LAPORAN DATA OBAT</title>
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
    <form class="form-inline my-2 my-lg-0" action="laporan_data_obat.php" method="get">
      <input class="form-control mr-sm-2 col-auto" type="search" placeholder="Nama Obat" aria-label="Search" name="cari">
      <button class="btn btn-outline-success my-2 my-sm-0 text-white" style="background-color:#BDDFBC" type="submit"><strong>CARI</strong></button>
    </form>
  </div>
</nav>
<div class="container-fluid">
  <div class="row">
    <div class="col text-center">
      <h1 class="text-success"><strong>LAPORAN DATA OBAT</strong></h1>
      <hr>
    </div>
  </div>
  <div class="row">
    <div class="col text-right">
    <form class="form-inline my-2 my-lg-0" action="laporan_data_obat.php" method="get">
      <label for="inputGroupSelect01">Tanggal&nbsp;&nbsp;&nbsp;</label>
      <input class="form-control mr-sm-2 col-auto" type="date" name="cariTanggal" id="inputGroupSelect01">
      <button class="btn btn-info btn-outline-info my-2 my-sm-0 text-white" type="submit"><strong>CARI</strong></button>
    </form>
    </div>
  </div>
  <hr>
  <br>
  <?php
      require_once("koneksi.php");
      session_start();
      if (!isset($_SESSION['idAdmin'])){
        header('location: login.php');
      }
      if (isset($_GET['cari'])) {//CARI BERDASARKAN NAMA
        $cari = ucwords($_GET['cari']);
        if ($cari == "") {
          $sqlLaporan = "SELECT * FROM laporan_obat";
        } else {
          $sqlLaporan = "SELECT * FROM laporan_obat
                    WHERE nama_obat = '$cari'";
        }
      } elseif (isset($_GET['cariTanggal'])) {// CARI BERDASARKAN TANGGAL
        $cari = $_GET['cariTanggal'];
        $sqlLaporan = "SELECT * FROM laporan_obat
                    WHERE tanggal = '$cari'";
      }  else {
        $sqlLaporan = "SELECT * FROM laporan_obat";
      }
      $queryLaporan = mysqli_query($connect,$sqlLaporan);
      $dataObat = array();

      while ($row = mysqli_fetch_assoc($queryLaporan)) {
        $tambah = array(
          "tanggal"    => $row['tanggal'],
          "kode_obat"  => $row['kode_obat'],
          "nama_obat"  => $row['nama_obat'],
          "harga_beli" => $row['harga_beli'],
          "harga_jual" => $row['harga_jual'],
          "stok"       => $row['stok'],
          "satuan"     => $row['satuan']
        );
        array_push($dataObat, $tambah);
      }
      //JIKA YANG DICARI TIDAK ADA
    if (empty($dataObat)) {
      echo "<h2 class='text-center text-secondary'>DATA OBAT TIDAK ADA</h2>";
    } else {
      $tanggal = $dataObat[0]['tanggal'];
      for ($x=0; $x < count($dataObat); $x++) {
        if ($dataObat[$x]['tanggal'] != $tanggal) {
          continue;
        } else {
      
?>
    <table class="table table-bordered">
  <thead class="thead">
    <tr>
      <th scope="col" colspan="6"><h4><?php echo date('d-m-Y', strtotime($dataObat[$x]['tanggal'])); ?></4></th>
    </tr>
    <tr>
      <th scope="col">KODE OBAT</th>
      <th scope="col">NAMA OBAT</th>
      <th scope="col">HARGA BELI</th>
      <th scope="col">HARGA JUAL</th>
      <th scope="col">STOK</th>
      <th scope="col">SATUAN</th>
    </tr>
  </thead>
<?php
          for ($y=0; $y < count($dataObat); $y++) {
            if ($dataObat[$y]['tanggal'] != $dataObat[$x]['tanggal']) {
              $tanggal = $dataObat[$y]['tanggal'];
              continue;
            } else {
?>
  <tbody>
    <tr>
      <td><?php echo $dataObat[$y]['kode_obat'];?></td>
      <td><?php echo $dataObat[$y]['nama_obat'];?></td>
      <td>Rp<?php echo $dataObat[$y]['harga_beli'];?>,-</td>
      <td>Rp<?php echo $dataObat[$y]['harga_jual'];?>,-</td>
      <td><?php echo $dataObat[$y]['stok']; ?></td>
      <td><?php echo $dataObat[$y]['satuan']; ?></td>
    </tr>
  </tbody>
  <?php
              $tanggal = "";//JIKA TANNGAL DI LAPORANNYA CUMA 1
            }
          }
        }
      }
    }
?>
</table>
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