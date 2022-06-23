<?php
    require_once("koneksi.php");
    session_start();

    $idAdmin = $_GET['idAdmin'];
    $namaLengkap = $_POST['nama'];
    $username = $_POST['username'];

    $sqlAdmin = "UPDATE admin
                    SET nama_lengkap='$namaLengkap', username='$username'
                    WHERE idAdmin = '$idAdmin'";
    mysqli_query($connect, $sqlAdmin);
    header("location: admin.php");

?>