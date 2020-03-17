<div class="container-fluid">

    <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_hewan"> <i class="fas fa-plus fa-sm"></i> Tambah Data Hewan</button>

    <table class="table table-bordered">
    <!-- membuat class table yang diambil dari boostrap -->

        <tr>
            <!-- tablenya itu terdiri dari apa saja sesuai dengan yang kita isi dan datanya diambil dari database -->
            <th>Nomor</th>
            <th>Jenis Hewan</th>
            <th>Harga Hewan</th>
            <th>Stok</th>
            <th>Kategori</th>
            <th colspan="3">Aksi</th>
        </tr>

        <?php 
            $no=1;
            //membuat perulangan dengan nama hewan atau hwn yang berisi data sesuai data yang ada di database
            foreach($hewan as $hwn) :?>

        <tr>
            <td> <?php echo $no++  ?> </td>
            <td> <?php echo $hwn->jenis_hewan ?> </td>
            <td> <?php echo $hwn->harga_hewan ?> </td>
            <td> <?php echo $hwn->Stok ?> </td>
            <td> <?php echo $hwn->Kategori ?> </td>


           
              <!-- menampilakan aksi edit dan hapus  -->
            <td><?php echo anchor ('admin/data_hewan/edit/' .$hwn->id_hewan, '<div class="btn btn-primary btn-sm"> <i class="fas fa-edit"></i> </div>') ?></td>

            <td><?php echo anchor ('admin/data_hewan/hapus/' .$hwn->id_hewan, '<div class="btn btn-danger  btn-sm"> <i class="fas fa-trash"></i></div>') ?></td>
        </tr>

        <?php endforeach; ?>

    </table>

</div>


<!-- Modal untuk menambahkan data hewan -->
<div class="modal fade" id="tambah_hewan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!--<h5 class="modal-title" id="exampleModalLabel"></h5> -->
        <p class="fab fa-battle-net">FORM INPUT DATA HEWAN</p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url(). 'admin/data_hewan/tambah_aksi' ?>" method="post" enctype="multipart/form-data" >
                <!-- menampilakan isi field dari database -->
                <div class="form-group">
                    <label><p class="text-danger">Jenis Hewan</p></label>
                    <input type="text" name="jenis_hewan" class="form-control">
                </div>
                <!-- menampilakan isi field dari database -->
                <div class="form-group">
                    <label>Harga Hewan</label>
                    <input type="text" name="harga_hewan" class="form-control">
                </div>
              <!-- menampilakan isi field dari database -->
                <div class="form-group">
                    <label>Stok</label>
                    <input type="text" name="Stok" class="form-control">
                </div>
              <!-- menampilakan isi field dari database -->
                <div class="form-group">
                    <label>Kategori</label>
                    <input type="text" name="Kategori" class="form-control">
                </div>
              <!-- menampilakan isi field dari database -->
                <div class="form-group">
                    <label>Gambar Hewan</label><br>
                    <input type="file" name="gambar" class="form-control">
                </div>
        
      </div>
      <div class="modal-footer">
      <!-- membuat fungsi tombol close dan simpan pada form tambah data -->
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>

      </form>
      
    </div>
  </div>
</div>