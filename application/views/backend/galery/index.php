<div class="pd-ltr-20 xs-pd-20-10">
	<div class="page-header">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Data Galery</li>
			</ol>
		</nav>
	</div>

	<div class="card">
		<div class="card-header">
			<div class="float-left">
				Data Galery
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
						<th>Foto</th>
						<th>Kategori</th>
						<th>Deskripsi</th>
						<th style="width:20%"></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($galery as $i => $a) : ?>
						<tr>
							<td><?= $a->id_galery ?></td>
							<td><img src="<?= base_url($a->foto) ?>" width="130px" alt=""></td>
							<td><?= $a->kategori ?></td>
							<td><?= $a->deskripsi ?></td>
							<td>
								<button onclick="editData('<?= $a->id_galery ?>','<?= $a->foto ?>','<?= $a->kategori ?>','<?= $a->deskripsi ?>')" style="border-radius:25px;background-color: #ff7b00;color:white;width:50px" type="button" class="btn btn-sm"><i class="fa fa-edit"></i></button>
								<button onclick="hapusData('<?= $a->id_galery ?>')" style="border-radius:25px;background-color: #ea003a;color:white;width:50px" type="button" class="btn btn-sm"><i class="fa fa-trash"></i></button>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="modal" id="dataGalery" tabindex="-1" role="dialog">
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
						<label for="">Foto</label>
						<input type="file" class="form-control" onchange="tampilfoto()" id="foto" name="foto">
						<div class="py-3 text-center" id="showGambar"></div>
					</div>
					<div class="form-group">
						<label for="">Kategori</label>
						<select name="kategori" id="kategori" class="form-control">
							<option value="">-PILIH-</option>
							<?php foreach ($kategori as $i => $a) : ?>
								<option value="<?= $a->id_kategori ?>"><?= $a->kategori ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="form-group">
						<label for="">Deskripsi</label>
						<textarea class=" form-control border-radius-0 w-100" placeholder="Enter text ..." id="deskripsi" name="deskripsi"></textarea>
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
	var base = '<?= base_url() ?>'
	var idx, urlx, foto_lama;

	$('#addData').click(function() {
		$('#judul').html('Tambah Galery')
		$('#dataGalery').modal('show');
	})

	function simpandata() {
		var form_data = new FormData();
		urls = "galery-add";

		var deskripsi = $('#deskripsi').val();
		var kategori = $('#kategori').val();
		var foto = $("#foto").prop("files")[0];

		form_data.append("foto", foto);
		form_data.append("kategori", kategori);
		form_data.append("deskripsi", deskripsi);

		if (idx != null) {
			form_data.append("id", idx);
			form_data.append("kategori", kategori);
			form_data.append("foto_lama", foto_lama);
			urls = "galery-add/" + idx;
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

	function editData(id, foto, kategori, deskripsi) {
		foto_lama = foto
		idx = id
		$('#deskripsi').val(deskripsi)
		$('#kategori').val(kategori)
		document.getElementById('showGambar').innerHTML = '<img src="' + base + '' + foto +
			'" width="120px"/>';

		$('#judul').html("Edit Data")
		$('#dataGalery').modal('show')
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
						url: 'galery-del/' + id,
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
</script>