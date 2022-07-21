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
				<li class="breadcrumb-item active" aria-current="page">Formulir Petugas Wisata</li>
			</ol>
		</nav>
	</div>

	<div class="card">
		<div class="card-header">
			<div class="float-left">
				Formulir Petugas Wisata
			</div>
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
								<button onclick="unlockPetugas('<?= $isi->id_user ?>')" style="border-radius:25px;background-color:<?= $isi->status == 1 ? '#62e583' : '#3aba3c' ?> ;color:white;width:50px" type="button" class="btn btn-sm"><i class="fa fa-<?= $isi->status == 1 ? 'close' : 'check' ?>"></i></button>
								<button onclick="hapusData('<?= $isi->id_user ?>')" style="border-radius:25px;background-color: #ea003a;color:white;width:50px" type="button" class="btn btn-sm"><i class="fa fa-trash"></i></button>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
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