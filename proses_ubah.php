<?php
    require_once("koneksi.php");

    $kode = $_GET['kode'];
    $nama = ucwords($_POST['nama']);
    $jumlah = (int) $_POST['jumlah'];
    $hargaJual = (double) $_POST['harga'];
    $satuan = $_POST['satuan'];

    $hargaBeli = $hargaJual*100/110;

    $sqlObat = "UPDATE data_obat
                SET nama_obat='$nama',harga_beli='$hargaBeli',harga_jual='$hargaJual',stok='$jumlah',satuan='$satuan'
                WHERE kode_obat = '$kode'";
    mysqli_query($connect,$sqlObat);
    header("Location: data_obat.php");
?>