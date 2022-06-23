<?php
    require_once("koneksi.php");
    session_start();
    if (!isset($_SESSION['idAdmin'])){
        header('location: login.php');
      }
    
    $namaLengkap = ucwords($_POST['namaLengkap']);
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sqlAdmin = "INSERT INTO admin(nama_lengkap, username, password)
                    VALUES ('$namaLengkap', '$username', '$password')";
    mysqli_query($connect, $sqlAdmin);
    header("location: admin.php");

?>