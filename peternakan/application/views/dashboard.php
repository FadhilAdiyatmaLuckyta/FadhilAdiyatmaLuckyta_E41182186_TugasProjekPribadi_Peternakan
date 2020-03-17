<div class="container-fluid">
    <!-- menampilkan carausel pada halaman dashboard yang kita copy dari getbosstrap -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
         <ol class="carousel-indicators">
         <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
         <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
         <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
         </ol>
        <div class="carousel-inner">
         <div class="carousel-item active">
             <img src="<?php echo base_url('assets/img/slider1.jpg') ?>" class="d-block w-100" alt="...">
         </div>
        <div class="carousel-item">
            <img src="<?php echo base_url('assets/img/slider2.jpg') ?>" class="d-block w-100" alt="...">
         </div>
        
    </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="row text-center mt-4">
    <!-- menampilkan data dalam bentuk card yang kita copy di boostrap -->
    <?php foreach ($hewan as $hwn) : ?>
        <!-- menampilkan foto di halaman awal, dalam bentuk card-->
        <div class="card ml-3 mb-3" style="width: 16rem;">
            <img src="<?php echo base_url().'/uploads/'.$hwn->gambar ?>" class="card-img-top" alt="...">
            <div class="card-body">
            <!-- menampilkan data dari database hanya jenis hewan dan stok -->
            <h5 class="card-title mb-1"><?php echo $hwn->jenis_hewan ?></h5>
            <h5 class="card-title mb-1"><?php echo $hwn->Stok ?></h5>
            <br>
            <span class="badge badge-success mb-3"> Rp.<?php echo $hwn->harga_hewan ?></span>
            
            <a href="#" class="btn btn-sm btn-primary">Tambah Keranjang</a>
            <a href="#" class="btn btn-sm btn-info">Detail</a>
         </div>
    </div>

        <?php endforeach; ?>

    </div>

</div>