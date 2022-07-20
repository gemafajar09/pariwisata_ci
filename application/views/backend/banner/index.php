<div class="pd-ltr-20 xs-pd-20-10">
	<div class="page-header">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Data Banner</li>
			</ol>
		</nav>
	</div>

	<div class="card">
		<div class="card-header">
			<div class="float-left">
				Data Banner
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
						<th>Banner</th>
						<th style="width:20%"></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($banner as $i => $a) : ?>
						<tr>
							<td><?= $a->id_banner ?></td>
							<td><img src="<?= base_url($a->banner) ?>" width="130px" alt=""></td>
							<td>
								<button onclick="editData('<?= $a->id_banner ?>','<?= $a->banner ?>')" style="border-radius:25px;background-color: #ff7b00;color:white;width:50px" type="button" class="btn btn-sm"><i class="fa fa-edit"></i></button>
								<button onclick="hapusData('<?= $a->id_banner ?>')" style="border-radius:25px;background-color: #ea003a;color:white;width:50px" type="button" class="btn btn-sm"><i class="fa fa-trash"></i></button>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="modal" id="databanner" tabindex="-1" role="dialog">
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
						<input type="file" class="form-control" onchange="tampilfoto()" id="banner" name="banner">
						<div class="py-3 text-center" id="showGambar"></div>
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
	var idx, urlx, banner_lama;

	$('#addData').click(function() {
		$('#judul').html('Tambah Banner')
		$('#databanner').modal('show');
	})

	function simpandata() {
		var form_data = new FormData();
		urls = "banner-add";

		var banner = $("#banner").prop("files")[0];

		form_data.append("banner", banner);

		if (idx != null) {
			form_data.append("banner_lama", banner_lama);
			urls = "banner-add/" + idx;
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

	function editData(id, foto) {
		banner_lama = foto
		idx = id
		document.getElementById('showGambar').innerHTML = '<img src="' + base + '' + foto +
			'" width="120px"/>';

		$('#judul').html("Edit Data")
		$('#databanner').modal('show')
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
						url: 'banner-del/' + id,
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