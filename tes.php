<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "pertemuan5");

// Cek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
</head>
<body>

<form method="POST">
    <label for="aksi">Pilih Aksi:</label>
    <select name="aksi" id="aksi">
        <option value="tambah">Tambah Data</option>
        <option value="update">Update Data</option>
        <option value="hapus">Hapus Data</option>
        <option value="lihat">Lihat Data</option>
    </select>
    <button type="submit" name="submit_aksi">Pilih</button>
</form>

<?php
if (isset($_POST['submit_aksi'])) {
    $aksi = $_POST['aksi'];
    
    if ($aksi == 'tambah') {
        ?>
        <form method="POST">
            <label for="id_transaksi">ID Transaksi</label>
            <input type="number" name="id_transaksi" id="id_transaksi" required><br>
            <label for="barang_id">ID Barang</label>
            <input type="number" name="barang_id" id="barang_id" required><br>
            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" required><br>
            <label for="total">Total</label>
            <input type="number" name="total" id="total" required><br>
            <button type="submit" name="submit_tambah">Tambah</button>
        </form>
        <?php
    } elseif ($aksi == 'update') {
        ?>
        <form method="POST">
            <label for="id_transaksi">ID Transaksi</label>
            <input type="number" name="id_transaksi" id="id_transaksi" required><br>
            <label for="barang_id">ID Barang</label>
            <input type="number" name="barang_id" id="barang_id" ><br>
            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" ><br>
            <label for="total">Total</label>
            <input type="number" name="total" id="total" ><br>
            <button type="submit" name="submit_update">Update</button>
        </form>
        <?php
    } elseif ($aksi == 'hapus') {
        ?>
        <form method="POST">
            <label for="id_transaksi">ID Transaksi</label>
            <input type="number" name="id_transaksi" id="id_transaksi" required><br>
            <button type="submit" name="submit_hapus">Hapus</button>
        </form>
        <?php
    } elseif ($aksi == 'lihat') {
        $query = "SELECT * FROM transaksi";
        $result = mysqli_query($koneksi, $query);
        if (mysqli_num_rows($result) > 0) {
            echo "<table border='1'><tr><th>ID Transaksi</th><th>ID Barang</th><th>Tanggal</th><th>Total</th></tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" . $row["id_transaksi"] . "</td><td>" . $row["barang_id"] . "</td><td>" . $row["tanggal"] . "</td><td>" . $row["total"] . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "Kosong Boss Datanya";
        }
    }
}

if (isset($_POST['submit_tambah'])) {
    $id_transaksi = $_POST['id_transaksi'];
    $barang_id = $_POST['barang_id'];
    $tanggal = $_POST['tanggal'];
    $total = $_POST['total'];
    $query = "INSERT INTO transaksi (id_transaksi, barang_id, tanggal, total) VALUES ('$id_transaksi', '$barang_id', '$tanggal', '$total')";
    if (mysqli_query($koneksi, $query)) {
        echo "Data berhasil ditambahkan.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}

if (isset($_POST['submit_update'])) {
    $id_transaksi = $_POST['id_transaksi'];
    $barang_id = $_POST['barang_id'];
    $tanggal = $_POST['tanggal'];
    $total = $_POST['total'];
    $query = "UPDATE transaksi SET barang_id='$barang_id', tanggal='$tanggal', total='$total' WHERE id_transaksi='$id_transaksi'";
    if (mysqli_query($koneksi, $query)) {
        echo "Data berhasil diupdate.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}

if (isset($_POST['submit_hapus'])) {
    $id_transaksi = $_POST['id_transaksi'];
    $query = "DELETE FROM transaksi WHERE id_transaksi='$id_transaksi'";
    if (mysqli_query($koneksi, $query)) {
        echo "Data berhasil dihapus.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}
?>

</body>
</html>
