<?php
    require_once("koneksi.php");
    session_start();
    $tanggal = $_SESSION['tanggal'];
    $kode = $_GET['kode'];
    
    $sqlLaporan = "DELETE FROM laporan_obat 
                    WHERE tanggal = '$tanggal' AND kode_obat = '$kode'";
    mysqli_query($connect,$sqlLaporan);
    
    $sqlObat = "DELETE FROM data_obat 
                WHERE kode_obat = '$kode'";
    mysqli_query($connect,$sqlObat);
    header("Location: data_obat.php");



?>