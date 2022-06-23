<?php
    require_once("koneksi.php");
    session_start();

    $tanggal = $_SESSION['tanggal'];

    $sqlObat = "SELECT * FROM data_obat";
    $queryObat = mysqli_query($connect, $sqlObat);
    $dataObat = array();

    while ($rowObat = mysqli_fetch_assoc($queryObat)) {
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
    // mengisi data laporan perhari
    if(!empty($dataLaporan)) {//JIKA LAPORAN SUDAH TERISI
        for ($x=0; $x < count($dataObat); $x++) {
            $kode_obat = $dataObat[$x]['kode_obat'];
            $nama_obat = $dataObat[$x]['nama_obat'];
            $harga_beli = $dataObat[$x]['harga_beli'];
            $harga_jual = $dataObat[$x]['harga_jual'];
            $stok = $dataObat[$x]['stok'];
            $satuan = $dataObat[$x]['satuan'];
            for ($y=0; $y < count($dataLaporan); $y++) {
                if($tanggal == $dataLaporan[$y]['tanggal']) {
                    //CARI KODE DI LAPORAN
                    if ($dataLaporan[$y]['kode_obat'] == $kode_obat){
                        $sqlTambah = "UPDATE laporan_obat
                                        SET nama_obat='$nama_obat', harga_beli='$harga_beli', harga_jual='$harga_jual', stok='$stok', satuan='$satuan'
                                        WHERE kode_obat = '$kode_obat'";
                        echo "Mantab<br>";
                        mysqli_query($connect, $sqlTambah);
                    }
                } else {
                    $sqlTambah = "INSERT INTO laporan_obat (tanggal, kode_obat, nama_obat, harga_beli, harga_jual, stok, satuan)
                                VALUES ('$tanggal','$kode_obat','$nama_obat','$harga_beli','$harga_jual','$stok','$satuan')";
                    mysqli_query($connect, $sqlTambah);
                }
            }
            if ($x >= count($dataLaporan)) {
                //JIKA ADA KODE BARU
                $sqlTambah = "INSERT INTO laporan_obat(tanggal, kode_obat, nama_obat, harga_beli, harga_jual, stok, satuan)
                                    VALUES ('$tanggal', '$kode_obat', '$nama_obat', '$harga_beli', '$harga_jual', '$stok', '$satuan')";
                echo "Oke<br>";
                mysqli_query($connect, $sqlTambah);
            }
        }
    } else {//JIKA LAPORANNYA KOSONG TANPA DATA
        for ($x=0; $x < count($dataObat); $x++) {
            $kode_obat = $dataObat[$x]['kode_obat'];
            $nama_obat = $dataObat[$x]['nama_obat'];
            $harga_beli = $dataObat[$x]['harga_beli'];
            $harga_jual = $dataObat[$x]['harga_jual'];
            $stok = $dataObat[$x]['stok'];
            $satuan = $dataObat[$x]['satuan'];
            $sqlTambah = "INSERT INTO laporan_obat (tanggal, kode_obat, nama_obat, harga_beli, harga_jual, stok, satuan)
                            VALUES ('$tanggal','$kode_obat','$nama_obat','$harga_beli','$harga_jual','$stok','$satuan')";
            mysqli_query($connect, $sqlTambah);
            echo "Horas<br>";                        
        }  
    }
    
        
    session_unset();
    session_destroy();
    // header('location: data_obat.php');
?>