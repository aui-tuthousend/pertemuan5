<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="addTransaksi.php" method="POST">
                    <label for="form1">Id Transaksi</label>
                    <div class="d-flex align-items-center justify-content-between col">
                        <input type="number" class="form-control" name="idT">
                    </div>

                    <label for="form1">Id Barang</label>
                    <div class="d-flex align-items-center justify-content-between col">
                        <input type="number" class="form-control" name="idB">
                    </div>

                    <label for="form1">Tanggal</label>
                    <div class="d-flex align-items-center justify-content-between col">
                        <input type="date" name="tgl" required>
                    </div>

                    <label for="form1">Total Barang</label>
                    <div class="d-flex align-items-center justify-content-between col">
                        <input type="number" class="form-control" name="total">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include_once 'koneksi.php';

    $idT = intval($_POST['idT']);
    $idB = intval($_POST['idB']);
    $tgl = mysqli_real_escape_string($koneksi, $_POST['tgl']);
    $total = intval($_POST['total']);

    $query = "INSERT INTO transaksi (id_transaksi, id_barang, tanggal, total) VALUES ($idT, $idB, '$tgl', $total)";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        header('Location: index.php');
        exit();
    } else {
        echo "Error: ";
    }

    $koneksi->close();
}
?>
