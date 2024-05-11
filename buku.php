<?php 
    include "header.php";
?>
<h2>Daftar Buku</h2>
<div class="row">
    <?php 
    include "koneksi.php";
    $qry_buku=mysqli_query($conn,"select * from buku");
    while($dt_buku=mysqli_fetch_array($qry_buku)){
        $imageData = base64_encode($dt_buku['foto']);
        $imageFormat = 'data:image/jpeg;base64,';
        ?>
    <div class="col-md-3">
        <div class="card">
            <img src="<?= $imageFormat . $imageData?>" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title"><?=$dt_buku['nama_buku']?></h5>
                <p class="card-text"><?=substr($dt_buku['deskripsi'], 0,20)?></p>
                <a href="pinjam_buku.php?id_buku=<?=urlencode($dt_buku['id_buku'])?>" class="btn btn-primary">Pinjam</a>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
</div>
<?php 
    include "footer.php";
?>