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
				<li class="breadcrumb-item active" aria-current="page">Data Pengelola Wisata</li>
			</ol>
		</nav>
	</div>
	
	<div class="card">
		<div class="card-header">
			<div class="float-left">
				Data Pengelola Wisata
			</div>
			<div class="float-right">
				<button style="border-radius:15px" class="btn btn-primary btn-sm" type="button" id="addData">Add
					Data</button>
			</div>
		</div>
		<div class="card-body">
			<table class="table" id="tables">
				<thead>
					<tr>
						<th>No</th>
						<th>Foto</th>
						<th>Nama</th>
						<th>Nik</th>
						<th>Alamat</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($pengelola as $i => $isi): ?>
					<tr>
						<td><?= $i+1 ?></td>
						<td><img src="<?= base_url($isi->foto) ?>" width="130px" alt="">
						</td>
						<td><?= $isi->nama ?></td>
						<td><?= $isi->nik ?></td>
						<td><?= $isi->alamat ?></td>
						<td>
							<button
								onclick="editData('<?= $isi->id_pengelola ?>','<?= $isi->nama ?>','<?= $isi->nik ?>','<?= $isi->foto ?>','<?= $isi->alamat ?>')"
								style="border-radius:25px;background-color: #ff7b00;color:white;width:50px"
								type="button" class="btn btn-sm"><i class="fa fa-edit"></i></button>
							<button onclick="hapusData('<?= $isi->id_pengelola ?>')"
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

<div class="modal" id="datapengelola" tabindex="-1" role="dialog">
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
                        <label for="">Nama</label>
                        <input type="text" class="form-control" placeholder="Nama" id="nama" name="nama"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="">Foto</label>
                        <input type="file" class="form-control" onchange="tampilfoto()" id="foto" name="foto">
                        <div class="py-3 text-center" id="showGambar"></div>
                    </div>
                    <div class="form-group">
                        <label for="">Nik</label>
                        <input type="number" class="form-control" placeholder="EX: 123331233312" id="nik"
                            name="nik" required>
                    </div>
                    <div class="from-group">
                        <label for="">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control"></textarea>
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
	// inisialisasi variable global unutk menampung data ketika edit data
	var id, urls, foto_lama;

	// function untuk tampilkan modal untuk tambah data
	$('#addData').click(function () {
		// set judul pada title modal
		$('#judul').html("Tambah Data")
		// perintah membuka modal
		$('#datapengelola').modal('show')
	})

	// aksi simpan dan edit data yang akan dikirimkan ke controller
	function simpandata() {
		var form_data = new FormData();
		urls = "pengelola-add";

		var nama = $('#nama').val();
		var nik = $('#nik').val();
		var alamat = $('#alamat').val();
		var foto = $("#foto").prop("files")[0];

		form_data.append("foto", foto);
		form_data.append("nama", nama);
		form_data.append("nik", nik);
		form_data.append("alamat", alamat);

		if (id != null) {
			form_data.append("id", id);
			form_data.append("foto_lama", foto_lama);
			urls = "pengelola-add/" + id;
		}

		$.ajax({
			url: urls,
			dataType: 'JSON',
			cache: false,
			contentType: false,
			processData: false,
			data: form_data,
			type: 'post',
			success: function (res) {
				if (res.pesan) {
					window.location.reload();
				}
			}
		});
	}

	function editData(idx, nama, nik, foto, alamat) {
		foto_lama = foto
		id = idx
		$('#nama').val(nama)
		$('#nik').val(nik)
		$('#alamat').val(alamat)
		document.getElementById('showGambar').innerHTML = '<img src="' + base + '' + foto +
			'" width="120px"/>';

		$('#judul').html("Edit Data")
		$('#datapengelola').modal('show')
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
						url: 'pengelola-delete/' + id,
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
					reader.onload = function (e) {
						document.getElementById('showGambar').innerHTML = '<img src="' + e.target.result +
							'" width="120px"/>';
					};
					reader.readAsDataURL(fileInput.files[0]);
				}
			}
		}
	}

</script>
