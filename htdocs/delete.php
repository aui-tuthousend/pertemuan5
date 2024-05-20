<?php
include 'koneksi.php';
$id = $_GET['idTransaksi'];
$q = "DELETE FROM transaksi WHERE id_transaksi = $id";
$result = mysqli_query($koneksi, $q);

if ($result) {
    header('Location: index.php');
    exit();
} else {
    echo "Error: ";
}

$koneksi->close();