<?php
    require_once("koneksi.php");
    $sqlObat = "SELECT * FROM data_obat";
    $queryObat = mysqli_query($connect,$sqlObat);
    $rowObat = mysqli_fetch_assoc($queryObat);

    $sqlLaporan = "SELECT * FROM laporan_obat";
    $queryLaporan = mysqli_query($connect,$sqlLaporan);
    $rowLaporan = mysqli_fetch_assoc($queryLaporan);
    if (empty($rowObat)) {
        echo "Data Kosong<br>";
    } else {
        echo $rowObat['nama_obat']."<br>";
        while ($rowObat = mysqli_fetch_assoc($queryObat)) {
            echo $rowObat['nama_obat']."<br>";
        }
    }

    // while ($row = mysqli_fetch_assoc($queryObat)) {
    //     echo $row['nama_obat']."<br>";
    // }
    // while ($row = mysqli_fetch_assoc($queryObat)) {
    //     echo $row['nama_obat'][0];
    //     $jumlah = (int) $row['harga_beli'];
    //     var_dump($jumlah);
    // }
    $kode = $_GET['kode'];
    if(isset($kode)){
        echo "mantab";
    } else {
        echo "siip";
    }
    $jumlah = (double) 50;
    $nama = "Paracetamol";
    $nama2 = ucwords("rike");
    echo "<br>";
    echo $nama;
    echo "<br>";
    echo $nama2;
    $jumlah = $jumlah * ((int) 50);
    echo $jumlah;
    $sqlObat = "UPDATE data_obat
                SET stok='$jumlah'
                WHERE nama_obat = '$nama'";
    mysqli_query($connect,$sqlObat);
    echo "<a href='coba.php?kode=20'>pilih</a>";
    echo "<br>";
    echo "Today is " . date("Y/m/d") . "<br>";
    echo "Today is " . date("Y.m.d") . "<br>";
    echo "Today is " . date("Y-m-d") . "<br>";
    echo "Today is " . date("l")."<br>";

    $sqlObat = "SELECT * FROM laporan_obat";
    $queryObat = mysqli_query($connect, $sqlObat);
    if ($queryObat) {
        echo "mantab Lur<br>";
    } else {
        echo "gobls";
    }
    $dataObat = array();

    while ($rowObat = mysqli_fetch_assoc($queryObat)) {
        if ($rowObat['nama_obat'] == null) {
            echo "blok<br>";
        } else {
            echo "mantab<br>";
        }
        echo $rowObat['kode_obat']."<br>";
        $tambah = array(
            "kode_obat"  => $rowObat['kode_obat'],
            "nama_obat"  => $rowObat['nama_obat'],
            "harga_beli" => $rowObat['harga_beli'],
            "harga_jual" => $rowObat['harga_jual'],
            "stok"       => $rowObat['stok'],
            "satuan"     => $rowObat['satuan']
        );
        array_push($dataObat, $tambah);
    }
    for ($x=0; $x < count($dataObat); $x++) {
        echo $dataObat[$x]['nama_obat']."<br>";
    }
    echo date("Y-m-d")."<br>";
    echo "Today is " . date("Y/m/d") . "<br>";

    $sqlLaporan = "SELECT * FROM laporan_obat";
    $queryLaporan = mysqli_query($connect, $sqlLaporan);
    $dataLaporan = array();
    while ($rowDataLaporan = mysqli_fetch_assoc($queryLaporan)) {
        $tambah = array(
            "tanggal"    => $rowDataLaporan['tanggal'],
            "kode_obat"  => $rowDataLaporan['kode_obat'],
            "nama_obat"  => $rowDataLaporan['nama_obat'],
            "harga_beli" => $rowDataLaporan['harga_beli'],
            "harga_jual" => $rowDataLaporan['harga_jual'],
            "stok"       => $rowDataLaporan['stok'],
            "satuan"     => $rowDataLaporan['satuan']
        );
        array_push($dataLaporan, $tambah);
    }
    if (empty($dataLaporan)){
        echo "Mantab";
    }
    var_dump($dataLaporan)[0];
    // ['kode_obat']."<br>";

    echo "<br>";
    $date= "2013-03-15";
    // $date = date("Y/m/d");
    $tanggal = strtotime($date);
    $tanggal = date("d-m-Y", $tanggal);
    echo $tanggal;
?> 
<!-- $originalDate = "2010-03-21";
$newDate = date("d-m-Y", strtotime($originalDate)); -->
