
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="edit.php" method="POST">
                    <!--                    <input type="hidden" id="edit-id" name="idT">-->
                    <?php
                    include 'koneksi.php';
                    $data = [];
                    session_start();
                    if (isset($_SESSION['idT'])){
                        $id = ($_SESSION['idT']);
                        $q = "SELECT * FROM transaksi WHERE id_transaksi = $id";
                        $result = mysqli_query($koneksi, $q);
                        $data = mysqli_fetch_assoc($result);
//        echo $data['total'];
                    }
                    //        $idT = $data['id_transaksi'];
                    ?>

                    <input type="hidden" id="edit-id" name="idT">
                    <div class="form-group">
                        <label for="edit-idB">Id Barang</label>
                        <input type="text" class="form-control" id="edit-idB"  value="" required>
                    </div>
                    <div class="form-group">
                        <label for="edit-date">Tanggal</label>
                        <input type="date" class="form-control" id="edit-date"  required>
                    </div>
                    <div class="form-group">
                        <label for="edit-total">Total Barang</label>
                        <input type="number" class="form-control" id="edit-total" value="<?php echo $id ?>" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>