<div class="pd-ltr-20 xs-pd-20-10">
	<div class="page-header">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Data Testimoni</li>
			</ol>
		</nav>
	</div>

	<div class="card">
		<div class="card-header">
			<div class="float-left">
				Data Testimoni
			</div>
			<div class="float-right">
				<button style="border-radius:15px" class="btn btn-primary btn-sm" type="button" id="addData">Add Data</button>
			</div>
		</div>
		<div class="card-body">
			<table class="table" id="tables">
				<thead>
					<tr>
						<th style="width:10%">No</th>
						<th>Nama</th>
						<th>Email</th>
						<th>Komentar</th>
						<th>Tanggal</th>
						<th>Status</th>
						<th style="width:20%"></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($testimoni as $i => $isi): ?>
					<tr>
						<td><?= $i+1 ?></td>
						<td><?= $isi->nama ?></td>
						<td><?= $isi->email ?></td>
						<td><?= $isi->komentar ?></td>
						<td><?= $isi->tanggal ?></td>
						<td><?= $isi->status == 0 ? 'Tidak Ditampilkan' : 'Ditampilkan' ?></td>
						<td>
							<button onclick="lockData('<?= $isi->id_testimoni ?>','<?= $isi->status ?>')"
								style="border-radius:25px;background-color: #ff7b00;color:white;width:50px"
								type="button" class="btn btn-sm"><i class="fa fa-<?= $isi->status == 0 ? 'lock' : 'unlock' ?>"></i></button>
							<button onclick="hapusData('<?= $isi->id_testimoni ?>')"
								style="border-radius:25px;background-color: #ea003a;color:white;width:50px"
								type="button" class="btn btn-sm"><i class="fa fa-trash"></i></button>
						</td>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<script>

	function lockData(id, status)
	{

        $.ajax({
            url: 'testimoni-lock/'+id,
            type: 'POST',
            dataType: 'JSON',
            data: {status: status},
            success: function (res) {
                if(res.pesan){
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
						url: 'testimoni-del/' + id,
						type: 'GET',
						dataType: 'json',
						success: function (res) {
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
