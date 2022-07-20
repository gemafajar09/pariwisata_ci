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
                    <img src="<?= base_url('assets/upload/wisata/' . $wisata['foto_wisata']) ?>" width="500px" alt="">
                </div>
                <div class="card-body">
                    <div>
                        <h3 class="card-title"><?= $wisata['nama_wisata'] ?></h3>
                    </div>
                    <hr>
                    <p  style="float:right" class="card-text"><small class="text-muted"><b><?= $wisata['alamat'] ?></b></small></p>
                    <p class="card-text">
                        <h5>
                            <?= $wisata['nama_wisata'] ?>
                        </h5>
                        <br>
                        <p><?= $wisata['pusat_informasi'] ?></p>
                    </p>
                    <br>
                    <div class="row">
                        <div class="col-md-3">
                            <center><h5>Mushola</h5></center>
                            <hr>
                            <br>
                            <img src="<?= base_url('assets/upload/wisata/' . $wisata['mushola']) ?>" style="width:60%" alt="">
                        </div>
                        <div class="col-md-3">
                            <center><h5>WC</h5></center>
                            <hr>
                            <br>
                            <img src="<?= base_url('assets/upload/wisata/' . $wisata['wc']) ?>" style="width:60%" alt="">
                        </div>
                        <div class="col-md-3">
                            <center><h5>P3K</h5></center>
                            <hr>
                            <br>
                            <img src="<?= base_url('assets/upload/wisata/' . $wisata['p3k']) ?>" style="width:60%" alt="">
                        </div>
                        <div class="col-md-3">
                            <center><h5>Parkiran</h5></center>
                            <hr>
                            <br>
                            <img src="<?= base_url('assets/upload/wisata/' . $wisata['tempat_parkir']) ?>" style="width:60%" alt="">
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <button class="btn btn-sm btn-primary w-12" onclick="javascript:history.back()">Kembali</button>
                </div>
            </div>
    </div>

</section>
