<style>
    .form-control {
        border-radius: 15px;
    }
</style>

<div class="pd-ltr-20 xs-pd-20-10">
    <div class="page-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Petugas Wisata</li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="float-left">
                Data Petugas Wisata
            </div>
            <!-- <div class="float-right">
                <button style="border-radius:15px" class="btn btn-primary btn-sm" type="button" id="addData">Tambah Petugas</button>
            </div> -->
        </div>
        <div class="card-body">
            <table class="table" id="tables">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Tgl Lahir</th>
                        <th>Pendidikan</th>
                        <th>Agama</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($petugas as $i => $isi) : ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= $isi->nama ?></td>
                            <td><?= $isi->nik ?></td>
                            <td><?= $isi->tgl_lahir ?></td>
                            <td><?= $isi->pendidikan ?></td>
                            <td><?= $isi->agama ?></td>
                            <td><?= $isi->alamat ?></td>
                            <td>
                                <!-- <button onclick="unlockPetugas('<?= $isi->id_petugas ?>')" style="border-radius:25px;background-color:<?= $isi->status == 1 ? '#346cc7' : '#3aba3c' ?> ;color:white;width:50px" type="button" class="btn btn-sm"><i class="fa fa-<?= $isi->status == 1 ? 'eye' : 'check' ?>"></i></button>
                                <button onclick="editData()" style="border-radius:25px;background-color: #ff7b00;color:white;width:50px" type="button" class="btn btn-sm"><i class="fa fa-edit"></i></button> -->
                                <button onclick="hapusData('<?= $isi->id_user ?>')" style="border-radius:25px;background-color: #ea003a;color:white;width:50px" type="button" class="btn btn-sm"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Tambah Petugas Wisata -->
<div class="modal" tabindex="-1" id="register-petugas" role="dialog">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                Daftar Petugas Wisata
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" class="form-control" placeholder="" name="nama" id="nama">
                            </div>

                            <div class="form-group">
                                <label for="">NIK</label>
                                <input type="number" class="form-control" placeholder="" name="nik" id="nik">
                            </div>

                            <div class="form-group">
                                <label for="">KK</label>
                                <input type="file" class="form-control" placeholder="" onchange="tampilKK()" name="kk" id="kk">
                                <div class="py-3 text-center" id="showKK">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Foto</label>
                                <input type="file" class="form-control" placeholder="" onchange="tampilFoto()" name="foto" id="foto">
                                <div class="py-3 text-center" id="showFoto">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Tgl Lahir</label>
                                <input type="date" class="form-control" placeholder="" name="tgl_lahir" id="tgl_lahir">
                            </div>
                            <div class="form-group">
                                <label for="">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                    <option value="">-PILIH-</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">No. Hp</label>
                                <input type="number" class="form-control" placeholder="" name="nohp" id="nohp">
                            </div>
                            <div class="form-group">
                                <label for="">Objek WIsata</label>
                                <select name="objek_wisata" id="objek_wisata" class="form-control">
                                    <option value="">-PILIH-</option>
                                    <?php foreach ($wisata as $b) : ?>
                                        <option value="<?= $b->id_wisata ?>"><?= $b->nama_wisata ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Jabatan</label>
                                <select name="jabatan" id="jabatan" class="form-control">
                                    <option value="">-PILIH-</option>
                                    <?php foreach ($jabatan as $a) : ?>
                                        <option value="<?= $a->id_jabatan ?>"><?= $a->jabatan ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Agama</label>
                                <select name="agama" id="agama" class="form-control">
                                    <option value="">-PILIH-</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha">Buddha</option>
                                    <option value="Konghucu">Konghucu</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Pendidikan</label>
                                <select name="pendidikan" id="pendidikan" class="form-control">
                                    <option value="">-PILIH-</option>
                                    <option value="SD">SD</option>
                                    <option value="SMP">SMP</option>
                                    <option value="SMA">SMA</option>
                                    <option value="Sarjana">Sarjana</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Ijazah</label>
                                <input type="file" class="form-control" placeholder="" onchange="tampilIjazah()" name="ijazah" id="ijazah">
                                <div class="py-3 text-center" id="showIjazah">
                                </div>
                            </div>

                        </div>

                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <textarea name="alamat" id="alamat" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="co-md-4">
                            <button type="button" onclick="simpanData()" class="btn btn-primary mt-5" style="width:300px">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    var base = '<?= base_url() ?>'
    var id, urls, foto_lama;

    // unlock user
    function unlockPetugas(id) {
        $.ajax({
            url: 'formulir-petugas-up/' + id,
            type: 'GET',
            dataType: 'JSON',
            success: function(res) {
                if (res.pesan) {
                    window.location.reload();
                }
            }
        })
    }

    function hapusData(id) {
        swal({
                title: "Yakin Ingin Menghapus Data?",
                text: "Data Yang Telah Terhapus Tidak Dapat kembali lagi.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: 'formulir-petugas-del/' + id,
                        type: 'GET',
                        dataType: 'json',
                        success: function(res) {
                            if (res.pesan) {
                                window.location.reload();
                            }
                        }
                    })
                } else {
                    swal("Hapus Data Dibatalkan!");
                }
            });
    }
</script>