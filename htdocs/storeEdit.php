<?php

if (isset($_POST['update'])) {
    include_once 'koneksi.php';

    $idT = intval($_POST['idT']);
    $idB = intval($_POST['idB']);
    $tanggal = strtotime($_POST['tanggal']);
    $tanggal = date('Y-m-d', $tanggal);
    $total = intval($_POST['total']);


    $query = "UPDATE transaksi
    SET id_barang = $idB, total = $total
    WHERE id_barang = $idT";

    $result2 = mysqli_query($koneksi, $query);

    if ($result2) {
        header('Location: index.php');
        exit();
    } else {
        echo "Error: ";
    }

//    $koneksi->close();

}
?>