<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <ol>
            <li><a href="index.html">Home</a></li>
            <li>Wisata</li>
        </ol>

    </div>
</section>

<section id="berita">
    <div class="container mt-5">
        <center>
            <h2>Wisata</h2>
        </center>
        <hr>
            <div class="card mb-3">
                <div class="m-3">
                    <img src="<?= base_url('assets/upload/wisata/' . $wisata['foto_wisata']) ?>" width="100%" alt="">
                </div>
                <div class="card-body">
                    <div>
                        <a href="<?= $wisata['url'] ?>" target="_blank">
                            <h3 class="card-title"><?= $wisata['nama_wisata'] ?></h3>
                        </a>
                    </div>
                    <hr>
                    <p  style="float:right" class="card-text"><small class="text-muted"><b><?= $wisata['alamat'] ?></b></small></p>
                    <p class="card-text">
                        <p><?= $wisata['pusat_informasi'] ?></p>
                    </p>
                    <br>

                    <h5>Fasilitas Umum</h5>
                    <hr><br>
                            <img src="<?= base_url('assets/upload/wisata/' . $wisata['mushola']) ?>" style="width:20%" alt="">
                      
                            <img src="<?= base_url('assets/upload/wisata/' . $wisata['wc']) ?>" style="width:20%" alt="">

                            <img src="<?= base_url('assets/upload/wisata/' . $wisata['p3k']) ?>" style="width:20%" alt="">

                            <img src="<?= base_url('assets/upload/wisata/' . $wisata['tempat_parkir']) ?>" style="width:20%" alt="">
                        
                            <br>
                            <br>
                            <br>
                            <p>
                               <h4> Deskripsi : </h4><br>
                               <h6>
                                   <?= $wisata['nama_wisata'] ?> Memiliki Mushola Dengan Luas <?= $wisata['luas_mushola'] ?> m<sup>2</sup> dan luas parkiran <?= $wisata['luas_tempat_parkir'] ?> m<sup>2</sup> dan juga memiliki jumlah Wc umum sebanyak <?= $wisata['jumlah_wc'] ?>.
                               </h6>
                            </p>
                    <div class="float-right">
                        <a href="<?= $wisata['url'] ?>" target="_blank" class="btn btn-primary btn-sm">Cek Lokasi</a>
                    </div>
                </div>
            </div>
    </div>

</section>
