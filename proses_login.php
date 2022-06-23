<?php
    require_once("koneksi.php");
    session_start();

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin";
    $query = mysqli_query($connect,$sql);

    while ($row = mysqli_fetch_assoc($query)) {
        if ($username == $row['username'] && $password == $row['password']) {
            $_SESSION['idAdmin'] = $row['idAdmin'];
            $_SESSION['nama']    = $row['nama_lengkap'];
            $_SESSION['tanggal'] = date("Y-m-d");
            header("location: data_obat.php");
            break;
        } else {
            header("location: login.php?status=gagal");
        }
    }
    

?>