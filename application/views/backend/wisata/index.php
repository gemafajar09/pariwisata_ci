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
						<!-- <th>Nama Pengelola</th> -->
						<th>Nama Wisata</th>
						<th>Alamat</th>
						<th>Pusat Info</th>
						<th>P3k</th>
						<th>Mushola</th>
						<th>Luas Mushola</th>
						<th>Tempat Parkir</th>
						<th>Luas Tempat Parkir</th>
						<th>Wc</th>
						<th>Jmlh WC</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($wisata as $i => $isi) : ?>
						<tr>
							<td><?= $i + 1 ?></td>
							<!-- <td><?= $isi->nama ?></td> -->
							<td><?= $isi->nama_wisata ?></td>
							<td><?= $isi->alamat ?></td>
							<td><?= substr($isi->pusat_informasi,0,50) ?></td>
							<td><img src="<?= base_url('assets/upload/wisata/' . $isi->p3k) ?>" width="130px" alt="">
							<td><img src="<?= base_url('assets/upload/wisata/' . $isi->mushola) ?>" width="130px" alt="">
							<td><?= $isi->luas_mushola ?> m<sup>2</sup</td>
							<td><img src="<?= base_url('assets/upload/wisata/' . $isi->tempat_parkir) ?>" width="130px" alt="">
							<td><?= $isi->luas_tempat_parkir ?> m<sup>2</sup</td>
							<td><img src="<?= base_url('assets/upload/wisata/' . $isi->wc) ?>" width="130px" alt="">
							<td><?= $isi->jumlah_wc ?></td>
							<td>
								<button onclick="editData(
									'<?= $isi->id_wisata ?>',
									'<?= $isi->nama_wisata ?>',
									'<?= $isi->alamat ?>',
									`<?= $isi->pusat_informasi ?>`,
									'<?= $isi->p3k ?>',
									'<?= $isi->mushola ?>',
									'<?= $isi->luas_mushola ?>',
									'<?= $isi->tempat_parkir ?>',
									'<?= $isi->luas_tempat_parkir ?>',
									'<?= $isi->wc ?>',
									'<?= $isi->foto_wisata ?>',
									'<?= $isi->jumlah_wc ?>')" style="border-radius:25px;background-color: #ff7b00;color:white;width:50px" type="button" class="btn btn-sm"><i class="fa fa-edit"></i></button>
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
								<label for="">Mushola</label>
								<input type="file" class="form-control" onchange="tampilfotomushola()" id="mushola" name="mushola">
								<div class="py-3 text-center" id="showGambarMushola">
								</div>
							</div>
							<div class="form-group">
								<label for="">Tempat Parkir</label>
								<input type="file" class="form-control" onchange="tampilfotoparkir()" id="tempat_parkir" name="tempat_parkir">
								<div class="py-3 text-center" id="showGambarParkir">
								</div>
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
							<div class="form-group">
								<label for="">Luas Mushola (m<sup>2</sup>)</label>
								<input type="number" class="form-control" placeholder="Ex: 400" id="luas_mushola" name="luas_mushola" required>
							</div>
							<div class="form-group">
								<label for="">Luas Tempat Parkir (m<sup>2</sup>)</label>
								<input type="number" class="form-control" placeholder="Ex: 900" id="luas_tempat_parkir" name="luas_tempat_parkir" required>
							</div>
							<div class="form-group">
								<label for="">WC</label>
								<input type="file" class="form-control" onchange="tampilfotowc()" id="wc" name="wc">
								<div class="py-3 text-center" id="showGambarWc">
								</div>
							</div>
							<div class="form-group">
								<label for="">Jumlah WC</label>
								<input type="number" class="form-control" placeholder="Ex: 10" id="jumlah_wc" name="jumlah_wc" required>
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
		var jumlah_wc = $('#jumlah_wc').val();
		var luas_mushola = $('#luas_mushola').val();
		var luas_tempat_parkir = $('#luas_tempat_parkir').val();
		var tempat_parkir = $("#tempat_parkir").prop("files")[0];
		var mushola = $("#mushola").prop("files")[0];
		var p3k = $("#p3k").prop("files")[0];
		var foto_wisata = $("#foto_wisata").prop("files")[0];
		var wc = $("#wc").prop("files")[0];

		form_data.append("nama_wisata", nama_wisata);
		form_data.append("foto_wisata", foto_wisata);
		form_data.append("pusat_informasi", pusat_informasi);
		form_data.append("alamat", alamat);
		form_data.append("jumlah_wc", jumlah_wc);
		form_data.append("luas_tempat_parkir", luas_tempat_parkir);
		form_data.append("luas_mushola", luas_mushola);
		form_data.append("tempat_parkir", tempat_parkir);
		form_data.append("mushola", mushola);
		form_data.append("p3k", p3k);
		form_data.append("wc", wc);

		if (idx != null) {
			// form_data.append("id_wisata", id);
			form_data.append("path_parkir", path_parkir);
			form_data.append("path_wc", path_wc);
			form_data.append("path_mushola", path_mushola);
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

	function editData(id, nama_wisata, alamat, pusat_informasi, p3k, mushola, luas_mushola, tempat_parkir, luas_tempat_parkir, wc, foto_wisata, jumlah_wc) {

		idx = id
		path_p3k = p3k
		path_wc = wc
		path_parkir = tempat_parkir
		path_mushola = mushola

		$('#nama_wisata').val(nama_wisata)
		$('#alamat').val(alamat)
		$('#pusat_informasi').val(pusat_informasi)
		$('#luas_tempat_parkir').val(luas_tempat_parkir)
		$('#luas_mushola').val(luas_mushola)
		$('#jumlah_wc').val(jumlah_wc)
		document.getElementById('showGambarP3K').innerHTML = '<img src="' + base + 'assets/upload/wisata/' + p3k +
			'" width="120px"/>';
		document.getElementById('showGambarMushola').innerHTML = '<img src="' + base + 'assets/upload/wisata/' + mushola +
			'" width="120px"/>';
		document.getElementById('showGambarParkir').innerHTML = '<img src="' + base + 'assets/upload/wisata/' + tempat_parkir +
			'" width="120px"/>';
		document.getElementById('showGambarWc').innerHTML = '<img src="' + base + 'assets/upload/wisata/' + wc +
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

	function tampilfotoparkir() {
		var fileInput = document.getElementById('tempat_parkir');
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
						document.getElementById('showGambarParkir').innerHTML = '<img src="' + e.target.result +
							'" width="120px"/>';
					};
					reader.readAsDataURL(fileInput.files[0]);
				}
			}
		}
	}

	function tampilfotomushola() {
		var fileInput = document.getElementById('mushola');
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
						document.getElementById('showGambarMushola').innerHTML = '<img src="' + e.target.result +
							'" width="120px"/>';
					};
					reader.readAsDataURL(fileInput.files[0]);
				}
			}
		}
	}

	function tampilfotowc() {
		var fileInput = document.getElementById('wc');
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
						document.getElementById('showGambarWc').innerHTML = '<img src="' + e.target.result +
							'" width="120px"/>';
					};
					reader.readAsDataURL(fileInput.files[0]);
				}
			}
		}
	}
</script>