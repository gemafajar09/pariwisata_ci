<style>
    .form-control {
        border-radius: 15px;
    }
</style>

<div class="pd-ltr-20 xs-pd-20-10">
    <div class="page-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Berita</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Berita</li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="float-left">
                Data Berita
            </div>
            <div class="float-right">
                <a style="border-radius:15px" href="tambah-berita" class="btn btn-primary btn-sm">Tambah Berita</a>
                <!-- <button style="border-radius:15px" class="btn btn-primary btn-sm" type="button" id="addData">Tambah
                    Berita</button> -->
            </div>
        </div>
        <div class="card-body">
            <table class="table" id="tables">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Judul Berita</th>
                        <th>Isi Berita</th>
                        <th>Penulis</th>
                        <th>Tgl Publish</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($berita as $i => $isi) : ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><img src="<?= base_url('assets/upload/berita/' . $isi->foto) ?>" width="130px" alt="">
                            </td>
                            <td><?= $isi->judul ?></td>
                            <td><?= $isi->isi_berita ?></td>
                            <td><?= $isi->tgl_publish ?></td>
                            <td><?= $isi->penulis ?></td>
                            <td>
                                <!-- <button onclick="editData('<?= $isi->id_berita ?>','<?= $isi->judul ?>','<?= $isi->isi_berita ?>','<?= $isi->penulis ?>','<?= $isi->foto ?>','<?= $isi->alamat ?>','<?= $isi->tgl_publish ?>')" style="border-radius:25px;background-color: #ff7b00;color:white;width:50px" type="button" class="btn btn-sm"><i class="fa fa-edit"></i></button>
                                <button onclick="hapusData('<?= $isi->id_berita ?>')" style="border-radius:25px;background-color: #ea003a;color:white;width:50px" type="button" class="btn btn-sm"><i class="fa fa-trash"></i></button> -->
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>