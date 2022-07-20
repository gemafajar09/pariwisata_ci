<style>
    .form-control {
        border-radius: 15px;
    }

    .wysihtml5-sandbox {
        width: 100% !important;
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
                            <td><?= substr($isi->isi_berita,0,250) ?></td>
                            <td><?= $isi->penulis ?></td>
                            <td><?= $isi->tgl_publish ?></td>
                            <td>
                                <button onclick="editData(
                                    '<?= $isi->id_berita ?>',
                                    `<?= $isi->judul ?>`,
                                    `<?= $isi->isi_berita ?>`,
                                    '<?= $isi->foto ?>',
                                    '<?= $isi->penulis ?>',
                                    '<?= $isi->tgl_publish ?>'
                                    )" style="border-radius:25px;background-color: #ff7b00;color:white;width:50px" type="button" class="btn btn-sm">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button onclick="hapusData('<?= $isi->id_berita ?>')" style="border-radius:25px;background-color: #ea003a;color:white;width:50px" type="button" class="btn btn-sm"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal" id="databerita" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="border-radius:15px">
            <div class="modal-header">
                <h5 class="modal-title" id="judul"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Judul</label>
                        <input type="text" class="form-control" placeholder="Judul" id="judul_berita" name="judul_berita" required>
                    </div>
                    <div class="form-group">
                        <label for="">Isi Berita</label>
                        <div class="html-editor pd-20 mb-30">
                            <textarea class=" form-control border-radius-0 w-100" placeholder="Tulis Berita" id="isi_berita" name="isi_berita"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Foto</label>
                        <input type="file" class="form-control" onchange="tampilfoto()" id="foto" name="foto">
                        <div class="py-3 text-center" id="showGambar">
                        </div>
                    </div>
                    <div class="from-group">
                        <label for="">Penulis</label>
                        <input type="text" class="form-control" id="penulis" name="penulis">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="simpandata()" class="btn btn-success">Simpan Perubahan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    var base = '<?= base_url() ?>'

    function simpandata() {
        var form_data = new FormData();
        urls = "berita-add";

        var judul_berita = $('#judul_berita').val();
        var isi_berita = $('#isi_berita').val();
        var penulis = $('#penulis').val();
        var foto = $("#foto").prop("files")[0];

        form_data.append("foto", foto);
        form_data.append("judul", judul_berita);
        form_data.append("isi_berita", isi_berita);
        form_data.append("penulis", penulis);

        if (id != null) {
            form_data.append("id", id);
            form_data.append("foto_lama", foto_lama);
            urls = "berita-add/" + id;
        }

        $.ajax({
            url: urls,
            dataType: 'JSON',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function(res) {
                if (res.pesan) {
                    window.location.reload();
                }
            }
        });
    }

    function editData(idx, judul, isi_berita, foto, penulis, tgl_publish) {
        foto_lama = foto
        id = idx
        $('#judul_berita').val(judul)
        $('#isi_berita').val(isi_berita)
        document.getElementById('showGambar').innerHTML = '<img src="' + base + 'assets/upload/berita/' + foto +
            '" width="120px"/>';
        $('#penulis').val(penulis)

        $('#judul').html("Edit Data")
        $('#databerita').modal('show')
    }

    function tampilfoto() {
        var fileInput = document.getElementById('foto');
        var filePath = fileInput.value;
        var extensions = /(\.jpg|\.png)$/i;
        var ukuran = fileInput.files[0].size;
        if (ukuran > 10000000) {
            alert('ukuran terlalu besar. Maksimal 1000KB')
            fileInput.value = '';
            return false;
        } else {
            if (!extensions.exec(filePath)) {
                alert('Silakan unggah file yang memiliki ekstensi .jpg/.png.');
                fileInput.value = '';
                return false;
            } else {
                //Image preview
                if (fileInput.files && fileInput.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('showGambar').innerHTML = '<img src="' + e.target.result +
                            '" width="120px"/>';
                    };
                    reader.readAsDataURL(fileInput.files[0]);
                }
            }
        }
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
                        url: 'berita-del/' + id,
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