<?php
    require_once("koneksi.php");
    $namaLengkap = ucwords($_POST['nama_lengkap']);
    $username = $_POST['username'];
    $newPassword = $_POST['new_password'];

    $sql = "SELECT * FROM admin";
    $query = mysqli_query($connect,$sql);

    while ($row = mysqli_fetch_assoc($query)) {
        if (($namaLengkap == $row['nama_lengkap']) && ($username == $row['username'])){
            $idAdmin = $row['idAdmin'];
            $sqlBaru = "UPDATE admin
                        SET password='$newPassword'
                        WHERE idAdmin = '$idAdmin'";
            mysqli_query($connect, $sqlBaru);
            header('location: login.php');
            break;
        } else {
            header('location: lupa_password.php?status=gagal');
        }
    }
?>