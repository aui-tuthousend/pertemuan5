

<!DOCTYPE html>
<html>
<head>
    <title>Edit</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<style>
    body{
        padding: 4rem 4rem 4rem 2rem;
    }
</style>
<h3>Edit Data Transaksi</h3>
<br>
<form action="storeEdit.php" method="POST">
    <?php
    include 'koneksi.php';
    $id = $_GET['idEdit'];
    $q = "SELECT * FROM transaksi WHERE id_transaksi = $id";
    $result = mysqli_query($koneksi, $q);
    $data = mysqli_fetch_array($result);

    ?>

    <label for="form1">Id Transaksi</label>
    <div class="d-flex align-items-center justify-content-between col">
        <input type="number" class="form-control" name="idT" value="<?= $data['id_transaksi'] ?>">
    </div>

    <label for="form1">Id Barang</label>
    <div class="d-flex align-items-center justify-content-between col">
        <input type="number" class="form-control" name="idB" value="<?= $data['id_barang'] ?>">
    </div>

    <label for="form1">Tanggal</label>
    <div class="d-flex align-items-center justify-content-between col">
        <input type="date" class="form-control" name="tanggal" value="<?= $data['tanggal'] ?>">
    </div>

    <label for="form1">Total Barang</label>
    <div class="d-flex align-items-center justify-content-between col">
        <input type="number" class="form-control" name="total" value="<?= $data['total'] ?>">
    </div>
    <br>

    <button type="submit" class="btn btn-primary">Save changes</button>
</form>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
