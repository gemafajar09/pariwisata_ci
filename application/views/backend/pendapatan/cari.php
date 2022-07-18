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
                        <div class="weight-700 font-24 text-dark">Rp. <?= $total_pendapatan->h ?>  </div>
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
                        <div class="weight-700 font-24 text-dark"><?= $total_tiket->j ?> Tiket </div>
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
                    <?php foreach ($tiket_filter as $i => $a) : ?>
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