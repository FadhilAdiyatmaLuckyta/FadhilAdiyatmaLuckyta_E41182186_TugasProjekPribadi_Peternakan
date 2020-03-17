<div class="container-fluid">

    <h3><i class="fas fa-edit"></i>EDIT DATA HEWAN</h3>

    <?php foreach($hewan as $hwn) : ?>

        <form method="post" action="<?php echo base_url().'admin/data_hewan/update' ?>">
            <!-- menampilakan isi field dari database -->
            <div class="for-group">
                <label>Jenis Hewan</label>
                <input type="text" name="jenis_hewan" class="form-control" value="<?php echo $hwn->jenis_hewan ?>">
            </div>
            <!-- menampilakan isi field dari database -->
            <div class="for-group">
                <label>Harga Hewan</label>
                <input type="text" name="harga_hewan" class="form-control" value="<?php echo $hwn->harga_hewan ?>">
            </div>
            <!-- menampilakan isi field dari database -->
            <div class="for-group">
                <label>Stok</label>
                <input type="text" name="Stok" class="form-control" value="<?php echo $hwn->Stok ?>">
            </div>
            <!-- menampilakan isi field dari database -->
            <div class="for-group">
                <label>Kategori</label>
                <input type="hidden" name="id_hewan" class="form-control" value="<?php echo $hwn->id_hewan ?>">
                <input type="text" name="Kategori" class="form-control" value="<?php echo $hwn->Kategori ?>">
            </div>
            <!-- membuat tombol beserta fungsi dari tombol simpan -->
            <button type="submit" class="btn btn-primary btn-sm mt-3"> SIMPAN </button>
        
        </form>

    <?php endforeach; ?>
</div>
