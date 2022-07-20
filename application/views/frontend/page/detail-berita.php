<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <ol>
            <li><a href="index.html">Home</a></li>
            <li>Berita</li>
        </ol>

    </div>
</section>

<section id="berita">
    <div class="container mt-5">
        <center>
            <h2>Berita</h2>
        </center>
        <hr>
        <?php foreach ($data as $isi) : ?>
            <div class="card mb-3">
                <div class="m-3">
                    <img src="<?= base_url('assets/upload/berita/' . $isi->foto) ?>" width="100%" alt="">
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $isi->judul ?></h5>
                    <p class="card-text"><small class="text-muted">Oleh <b><?= $isi->penulis ?></b> pada <?= date("d-m-Y H:i", strtotime($isi->tgl_publish)) ?></small></p>
                    <p class="card-text">
                        <?= $isi->isi_berita ?>
                    </p>
                    <button class="btn btn-sm btn-primary" onclick="javascript:history.back()">Kembali</button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</section>
