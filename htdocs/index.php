<?php
include_once 'koneksi.php';
include 'addTransaksi.php';

$q = "SELECT * FROM transaksi";

$transaksis = mysqli_query($koneksi,$q);

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>

<style>
    body{
        padding: 4rem 0 4rem 2rem;
    }
    button{
        margin: 0 0 1rem 0.4rem;
    }
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 60%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>

<body>

<table>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">
        Tambah+
    </button>
    <tr>
        <th>Id</th>
        <th>Id Barang</th>
        <th>Tanggal</th>
        <th>Total</th>
        <th>Edit</th>
    </tr>
    <?php
        while ($transaksi = mysqli_fetch_array($transaksis)) {
    ?>
        <tr>
            <td><?php echo $transaksi['id_transaksi']?></td>
            <td><?php echo $transaksi['id_barang']?></td>
            <td><?php echo $transaksi['tanggal']?></td>
            <td><?php echo $transaksi['total']?></td>
            <td>
                <a class="btn btn-warning" href="edit.php?idEdit=<?=$transaksi['id_transaksi'] ?>" >edit</a>
                <a class="btn btn-danger" href="delete.php?idTransaksi=<?=$transaksi['id_transaksi'] ?>" onclick="return confirm('Delete?')">delete</a>

            </td>
        </tr>
    <?php
        }
    ?>
</table>








<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>