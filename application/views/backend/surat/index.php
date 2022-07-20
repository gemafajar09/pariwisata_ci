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
				<li class="breadcrumb-item active" aria-current="page">Data Surat</li>
			</ol>
		</nav>
	</div>

	<div class="card">
		<div class="card-header">
			<div class="float-left">
				Daftar Surat
			</div>
			<?php if ($_SESSION['level'] == 3) : ?>
				<div class="float-right">
					<button style="border-radius:15px" class="btn btn-primary btn-sm" type="button" id="addData">Tambah Surat</button>
				</div>
			<?php endif ?>
		</div>
		<div class="card-body">
			<table class="table" id="tables">
				<thead>
					<tr>
						<th>No</th>
						<th>Surat Rekomendasi</th>
						<th>Wisata</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($surat as $i => $isi) : ?>
						<tr>
							<td><?= $i + 1 ?></td>
							<td><?= $isi->surat ?></td>
							<td><?= $isi->nama_wisata ?></td>
							<td>
								<a style="border-radius:25px;background-color: #51a822;color:white;width:50px" type="button" class="btn btn-sm" href="<?php echo base_url() . 'surat-download/' . $isi->id_surat ?>"><i class="fa fa-download"></i></a>
								<button onclick="hapusData('<?= $isi->id_surat ?>')" style="border-radius:25px;background-color: #ea003a;color:white;width:50px" type="button" class="btn btn-sm"><i class="fa fa-trash"></i></button>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="modal" id="datasurat" tabindex="-1" role="dialog">
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
						<label for="">Objek WIsata</label>
						<select name="objek_wisata" id="objek_wisata" class="form-control">
							<option value="">-PILIH-</option>
							<?php foreach ($wisata as $b) : ?>
								<option value="<?= $b->id_wisata ?>"><?= $b->nama_wisata ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="form-group">
						<label for="">Upload Surat Rekomendasi</label>
						<input type="file" class="form-control" id="surat" name="surat">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" onclick="simpandata()" class="btn btn-primary">Save</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script>
	var base = '<?= base_url() ?>'
	var id, surat, urls, file_lama;

	$('#addData').click(function() {
		$('#judul').html("Tambah Surat")
		$('#datasurat').modal('show')
	})

	// aksi simpan dan edit data yang akan dikirimkan ke controller
	function simpandata() {
		var form_data = new FormData();
		urls = "surat-add";

		var objek_wisata = $('#objek_wisata').val();
		var surat = $("#surat").prop("files")[0];

		form_data.append("objek_wisata", objek_wisata);
		form_data.append("surat", surat);

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
						url: 'surat-del/' + id,
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