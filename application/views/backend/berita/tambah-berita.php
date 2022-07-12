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
                <li class="breadcrumb-item active" aria-current="page">Tambah Berita</li>
            </ol>
        </nav>
    </div>

    <div class="pd-20 card-box mb-30">
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue h4">Buat Berita Baru</h4>
                <p class="mb-30">Tambahkan detail berita baru di bawah ini</p>
            </div>
        </div>
        <form name="formdata" id="formdata">
            <div class="form-group">
                <label class="col-sm-12 col-md-2 col-form-label">Judul Berita</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" id="judul" name="judul" placeholder="Ex: 10 Tempat Wisata Terfavorit di Sumatera Barat">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-12 col-md-2 col-form-label">Isi Berita</label>
                <div class="html-editor pd-20 mb-30">
                    <textarea class="textarea_editor form-control border-radius-0 w-100" placeholder="Enter text ..." id="isi_berita" name="isi_berita"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-12 col-md-2 col-form-label">Foto</label>
                <div class="col-sm-12 col-md-10">
                    <input type="file" class="form-control" onchange="tampilfoto()" id="foto" name="foto">
                    <div class="py-3 text-center" id="showGambar"></div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-12 col-md-2 col-form-label">Penulis</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" placeholder="Ex: Admin" type="text" readonly value="<?= $_SESSION['nama'] ?>" id="penulis" name="penulis">
                </div>
            </div>
            <div class="text-right">

                <a class="btn btn-warning" href="javascript:history.back()">Cancel</a>
                <!-- <button class="btn btn-warning" type="button">Cancel</button> -->
                <button class="btn btn-success" onclick="simpandata()" type="button">Simpan</button>

            </div>
        </form>
    </div>
</div>

<script>
    function simpandata() {
        var form_data = new FormData();
        urls = "berita-add";

        var judul = $('#judul').val();
        var isi = $('#isi_berita').val();
        var penulis = $('#penulis').val();
        var foto = $("#foto").prop("files")[0];

        var date = new Date();

        form_data.append("judul", judul);
        form_data.append("isi_berita", isi);
        form_data.append("foto", foto);
        form_data.append("penulis", penulis);

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
                    window.location = 'berita';
                }
            }
        });
    }


    // function dibawah untuk menmpilkan gambar pada saat melakukan upload file
    function tampilfoto() {
        var fileInput = document.getElementById('foto');
        var filePath = fileInput.value;
        var extensions = /(\.jpg|\.png)$/i;
        var ukuran = fileInput.files[0].size;
        if (ukuran > 1000000) {
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
</script>