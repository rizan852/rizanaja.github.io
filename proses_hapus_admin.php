<?php
    require_once("koneksi.php");
    session_start();

    $idAdmin = $_GET['idAdmin'];

    $sqlAdmin = "DELETE FROM admin
                    WHERE idAdmin = '$idAdmin'";
    mysqli_query($connect, $sqlAdmin);
    header("location: admin.php");

?>