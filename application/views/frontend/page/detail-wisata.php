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
        <?php foreach ($data as $isi) : ?>
            <div class="card mb-3">
                <div class="m-3">
                    <img src="<?= base_url('assets/upload/berita/' . $isi->id_wisata) ?>" width="500px" alt="">
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $isi->nama_wisata ?></h5>
                    <p class="card-text"><small class="text-muted"><b><?= $isi->alamat ?></b></small></p>
                    <p class="card-text">
                        <?= $isi->nama_wisata ?>
                    </p>
                    <button class="btn btn-sm btn-primary" onclick="javascript:history.back()">Kembali</button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</section>
