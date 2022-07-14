<div class="pd-ltr-20 xs-pd-20-10">
    <div class="page-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pendapatan</li>
            </ol>
        </nav>
    </div>

    <div class="row pb-10">
        <div class="col-xl-6 col-lg-6 col-md-6 mb-20">
            <div class="card-box height-100-p widget-style3">
                <div class="d-flex flex-wrap">
                    <div class="widget-data">
                        <div class="weight-700 font-24 text-dark">Rp. <?= $total_harga_tiket->h ?></div>
                        <div class="font-14 text-secondary weight-500">
                            Semua Pendapatan
                        </div>
                    </div>
                    <div class="widget-icon">
                        <div class="icon" data-color="#00eccf">
                            <i class="icon-copy fa fa-money"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 mb-20">
            <div class="card-box height-100-p widget-style3">
                <div class="d-flex flex-wrap">
                    <div class="widget-data">
                        <div class="weight-700 font-24 text-dark"><?= $total_tiket->j ?> Tiket</div>
                        <div class="font-14 text-secondary weight-500">
                            Semua Tiket
                        </div>
                    </div>
                    <div class="widget-icon">
                        <div class="icon" data-color="#ff5b5b">
                            <span class="icon-copy dw dw-calendar1"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pd-20 card-box mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue h4">Cari Pendapatan Berdasarkan</h4>
            </div>
        </div>
        <form method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Pilih Tanggal</label>
                        <input class="form-control date-picker" placeholder="Pilih Tanggal" type="text" id="tgl" required />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Wisata</label>
                        <select name="id_wisata" class="form-control" id="id_wisata">
                            <option value="">- PILIH -</option>
                            <?php foreach ($wisata as $i => $a) : ?>
                                <option value="<?= $a->id_wisata ?>"><?= $a->nama_wisata ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group text-right">
                <button type="button" onclick="cari()" class="btn btn-primary"><i class="fa fa-search"></i> Cari</button>
                <!-- <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i> Search</button> -->
            </div>
        </form>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="float-left">
                Hasil Pencarian Pendapatan
            </div>
        </div>
        <div class="card-body">
            <table class="table" id="tables">
                <thead>
                    <tr>
                        <th style="width:10%">No</th>
                        <th>Wisata</th>
                        <th>Harga Tiket</th>
                        <th>Jumlah Tiket</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tiket as $i => $a) : ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= $a->nama_wisata ?></td>
                            <td><?= $a->harga_tiket ?></td>
                            <td><?= $a->jumlah ?></td>
                            <td><?= $a->total ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal" id="dataTiket" tabindex="-1" role="dialog">
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
                            <label for="">Wisata</label>
                            <select name="id_wisata" id="id_wisata" class="form-control">
                                <option value="">-PILIH-</option>
                                <?php foreach ($wisata as $i => $a) : ?>
                                    <option value="<?= $a->id_wisata ?>"><?= $a->nama_wisata ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Harga Tiket</label>
                                    <input type="number" class="form-control" id="harga_tiket" name="harga_tiket" placeholder="Ex: 10000">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Jumlah Tiket</label>
                                    <input type="number" class="form-control" id="jumlah_tiket" name="jumlah_tiket" placeholder="Ex: 5">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Total</label>
                                    <input type="number" class="form-control" id="total" name="total" placeholder="Total" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Harga Parkir</label>
                                    <input type="number" class="form-control" id="harga_parkir" name="harga_parkir" placeholder="Ex: 5000">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Keterangan</label>
                            <textarea class="form-control" placeholder="Enter text ..." id="keterangan" name="keterangan"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="simpandata()" class="btn btn-primary">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        var urlx;
        var form_data = new FormData();

        function cari() {

            urlx = 'cari-pendapatan';
            var id = $('#id_wisata').val();

            var check_tgl = $('#tgl').val();

            var tgl = new Date($('#tgl').val());

            if (id == '' || check_tgl == '') {
                alert('Tanggal dan Wisata tidak boleh kosong');
            } else {

                tgl = tgl.getFullYear() + '-' + (tgl.getMonth() + 1) + '-' + tgl.getDate();

                form_data.append("id_wisata", id);
                form_data.append("tgl", tgl);

                // redirect
                window.location.href = `<?= base_url('cari-pendapatan') ?>/${id}/${tgl}`

                $.ajax({
                    url: urlx,
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

        }

        // function ubahTotal() {
        //     harga_tiket = parseInt($('#harga_tiket').val())
        //     jumlah_tiket = parseInt($('#jumlah_tiket').val())

        //     $('#total').val(harga_tiket * jumlah_tiket);
        // }

        // $('#addData').click(function() {
        //     $('#judul').html('Buat Tiket')
        //     $('#dataTiket').modal('show');
        // })

        // function simpandata() {
        //     var form_data = new FormData();
        //     urlx = "tiket-add";

        //     var id_wisata = $('#id_wisata').val();
        //     var harga_tiket = $('#harga_tiket').val();
        //     var jumlah_tiket = $('#jumlah_tiket').val();
        //     var total = $('#total').val();
        //     var harga_parkir = $('#harga_parkir').val();
        //     var keterangan = $('#keterangan').val();

        //     form_data.append("id_wisata", id_wisata);
        //     form_data.append("harga_tiket", harga_tiket);
        //     form_data.append("jumlah_tiket", jumlah_tiket);
        //     form_data.append("total", total);
        //     form_data.append("harga_parkir", harga_parkir);
        //     form_data.append("keterangan", keterangan);

        //     // if (idx != null) {
        //     //     form_data.append("id_wisata", id_wisata);
        //     //     form_data.append("harga_tiket", harga_tiket);
        //     //     form_data.append("jumlah_tiket", jumlah_tiket);
        //     //     form_data.append("total", total);
        //     //     form_data.append("harga_parkir", harga_parkir);
        //     //     form_data.append("keterangan", keterangan);
        //     //     urlx = "tiket-add/" + idx;
        //     // }

        //     $.ajax({
        //         url: urlx,
        //         dataType: 'JSON',
        //         cache: false,
        //         contentType: false,
        //         processData: false,
        //         data: form_data,
        //         type: 'post',
        //         success: function(res) {
        //             if (res.pesan) {
        //                 window.location.reload();
        //             }
        //         }
        //     });
        // }

        // function editData(id, id_wisata, harga_tiket, jumlah_tiket, total, harga_parkir, keterangan) {
        //     idx = id
        //     $('#id_wisata').val(id_wisata)
        //     $('#harga_tiket').val(harga_tiket)
        //     $('#jumlah_tiket').val(jumlah_tiket)
        //     $('#total').val(total)
        //     $('#harga_parkir').val(harga_parkir)
        //     $('#keterangan').val(keterangan)
        //     $('#judul').html("Edit Data")
        //     $('#dataTiket').modal('show')
        // }

        // function hapusData(id) {
        //     swal({
        //             title: "Yakin Ingin Menghapus Data?",
        //             text: "Data Yang Telah Terhapus Tidak Dapat kembali lagi.",
        //             icon: "warning",
        //             buttons: true,
        //             dangerMode: true,
        //         })
        //         .then((willDelete) => {
        //             if (willDelete) {
        //                 $.ajax({
        //                     url: 'tiket-del/' + id,
        //                     type: 'GET',
        //                     dataType: 'json',
        //                     success: function(res) {
        //                         if (res.pesan) {
        //                             window.location.reload();
        //                         }
        //                     }
        //                 })
        //             } else {
        //                 swal("Hapus Data Dibatalkan!");
        //             }
        //         });

        // }
    </script>