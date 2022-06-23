<?php
    require_once("koneksi.php");
    
    $supplier = $_POST["supplier"];
    $tanggal = $_POST["tanggal"];
    $tanggal = date('I,d-m-Y');
    echo $tanggal;
    $nama = ucwords($_POST["nama"]);
    $jumlah = (int) $_POST["jumlah"];
    $harga = (double) $_POST["harga"];
    $satuan = $_POST["satuan"];
    $hargaJual = $harga*120/100;
    $total_harga = $jumlah*$harga;

    $sqlObat = "SELECT * FROM data_obat";
    $queryObat = mysqli_query($connect,$sqlObat);
    while ($row = mysqli_fetch_assoc($queryObat)) {
        if ($nama == $row['nama_obat']) {
            $jumlah = $jumlah + ((int) $row['stok']);
            $sqlObat = "UPDATE data_obat
                        SET stok='$jumlah', harga_beli='$harga', harga_jual='$hargaJual'
                        WHERE nama_obat = '$nama'";
            break;
        } else {
            $sqlObat = "INSERT INTO data_obat(nama_obat, harga_beli, harga_jual, stok, satuan)
                            VALUES ('$nama', '$harga', '$hargaJual', '$jumlah', '$satuan')";
        }
    }
    
    $sqlMasuk = "INSERT INTO obat_masuk(kode_transaksi, supplier, tanggal, nama_obat, jumlah_masuk, harga, satuan, total_harga)
                     VALUES (NULL, '$supplier', '$tanggal', '$nama', '$jumlah', '$harga', '$satuan', '$total_harga')";
    $queryMasuk = mysqli_query($connect,$sqlMasuk);
    $queryObat = mysqli_query($connect,$sqlObat);

    if($queryMasuk && $queryObat){
        $status = "sukses";
        header("Location: obat_masuk.php?status=$status");
    } else {
        $status = "gagal";
        header("Location: obat_masuk.php?status=$status");
    }
?>