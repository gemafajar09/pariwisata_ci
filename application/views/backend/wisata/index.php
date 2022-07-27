<div class="pd-ltr-20 xs-pd-20-10">
	<div class="page-header">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Data Wisata</li>
			</ol>
		</nav>
	</div>

	<div class="card">
		<div class="card-header">
			<div class="float-left">
				Data Wisata
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
						<th>Foto Wisata</th>
						<th>Nama Wisata</th>
						<th>Alamat</th>
						<th>Pusat Info</th>
						<th>P3k</th>	
						<th>Paket Wisata</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($wisata as $i => $isi) : ?>
						<tr>
							<td><?= $i + 1 ?></td>
							<td><img src="<?= base_url('assets/upload/wisata/' . $isi->foto_wisata) ?>" width="130px" alt="">
							<td><?= $isi->nama_wisata ?></td>
							<td><?= $isi->alamat ?></td>
							<td><?= substr($isi->pusat_informasi, 0, 50) ?></td>
							<td><img src="<?= base_url('assets/upload/wisata/' . $isi->p3k) ?>" width="130px" alt="">
							<td><?= $isi->paket_wisata ?></td>
							<td>
								<button onclick="editData(
									'<?= $isi->id_wisata ?>',
									'<?= $isi->nama_wisata ?>',
									'<?= $isi->alamat ?>',
									`<?= $isi->pusat_informasi ?>`,
									'<?= $isi->p3k ?>',
									'<?= $isi->foto_wisata ?>',
									'<?= $isi->paket_wisata ?>')" style="border-radius:25px;background-color: #ff7b00;color:white;width:50px" type="button" class="btn btn-sm"><i class="fa fa-edit"></i></button>
								<button onclick="hapusData('<?= $isi->id_wisata ?>')" style="border-radius:25px;background-color: #ea003a;color:white;width:50px" type="button" class="btn btn-sm"><i class="fa fa-trash"></i></button>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="modal" id="dataWisata" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content" style="border-radius:15px">
			<div class="modal-header">
				<h5 class="modal-title" id="judul"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="" method="post">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Nama Wisata</label>
								<input type="text" class="form-control" placeholder="Nama Wisata" id="nama_wisata" name="nama_wisata" required>
							</div>
							<div class="form-group">
								<label for="">Pusat Informasi</label>
								<textarea class=" form-control border-radius-0 w-100" placeholder="Enter text ..." id="pusat_informasi" name="pusat_informasi"></textarea>
							</div>
							<div class="form-group">
								<label for="">Paket Wisata</label>
								<input type="text" class="form-control" placeholder="Ex: Wisata alam" id="paket_wisata" name="paket_wisata" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Alamat</label>
								<input type="text" class="form-control" placeholder="Alamat" id="alamat" name="alamat" required>
							</div>
							<div class="form-group">
								<label for="">Foto Wisata</label>
								<input type="file" class="form-control" onchange="tampilfotoWisata()" id="foto_wisata" name="foto_wisata">
								<div class="py-3 text-center" id="showGambarWisata">
								</div>
							</div>
							<div class="form-group">
								<label for="">P3K</label>
								<input type="file" class="form-control" onchange="tampilfotop3k()" id="p3k" name="p3k">
								<div class="py-3 text-center" id="showGambarP3K">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" onclick="simpandata()" class="btn btn-primary">Simpan</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script>
	var idx, urlx;
	var base = '<?= base_url() ?>'

	$('#addData').click(function() {
		$('#judul').html('Tambah Wisata')
		$('#dataWisata').modal('show');
	})

	function simpandata() {
		var form_data = new FormData();
		urlx = "wisata-add";

		var nama_wisata = $('#nama_wisata').val();
		var pusat_informasi = $('#pusat_informasi').val();
		var alamat = $('#alamat').val();
		var paket_wisata = $('#paket_wisata').val();
		var p3k = $("#p3k").prop("files")[0];
		var foto_wisata = $("#foto_wisata").prop("files")[0];

		form_data.append("nama_wisata", nama_wisata);
		form_data.append("foto_wisata", foto_wisata);
		form_data.append("pusat_informasi", pusat_informasi);
		form_data.append("alamat", alamat);
		form_data.append("paket_wisata", paket_wisata);
		form_data.append("p3k", p3k);

		if (idx != null) {
			form_data.append("path_p3k", path_p3k);
			urlx = "wisata-add/" + idx;
		}

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

	function editData(id, nama_wisata, alamat, pusat_informasi, p3k, foto_wisata, paket_wisata) {

		idx = id
		path_p3k = p3k

		$('#nama_wisata').val(nama_wisata)
		$('#alamat').val(alamat)
		$('#pusat_informasi').val(pusat_informasi)
		$('#paket_wisata').val(paket_wisata)
		document.getElementById('showGambarP3K').innerHTML = '<img src="' + base + 'assets/upload/wisata/' + p3k +
			'" width="120px"/>';
	
		document.getElementById('showGambarWisata').innerHTML = '<img src="' + base + 'assets/upload/wisata/' + foto_wisata +
			'" width="120px"/>';

		$('#judul').html("Edit Data")
		$('#dataWisata').modal('show')

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
						url: 'wisata-del/' + id,
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

	function tampilfotop3k() {
		var fileInput = document.getElementById('p3k');
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
						document.getElementById('showGambarP3K').innerHTML = '<img src="' + e.target.result +
							'" width="120px"/>';
					};
					reader.readAsDataURL(fileInput.files[0]);
				}
			}
		}
	}

	function tampilfotoWisata() {
		var fileInput = document.getElementById('foto_wisata');
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
						document.getElementById('showGambarWisata').innerHTML = '<img src="' + e.target.result +
							'" width="120px"/>';
					};
					reader.readAsDataURL(fileInput.files[0]);
				}
			}
		}
	}

</script>