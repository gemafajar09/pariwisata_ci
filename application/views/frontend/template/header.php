<?php
if (isset($_SESSION['pesan'])) {
	echo "<script>
            swal('" . $_SESSION['type'] . "', '" . $_SESSION['pesan'] . "', '" . $_SESSION['type'] . "');
        </script>";
}

$jabatan = $this
	->db
	->query('SELECT * FROM tb_jabatan')
	->result();

$wisata = $this
	->db
	->query('SELECT * FROM tb_wisata')
	->result();
?>

<nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light">
	<a class="navbar-brand" href="#">
		<img src="<?= base_url() ?>assets/src/images/priwisata1.png" width="100" height="50" class="d-inline-block align-top" alt="">
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNav" style="margin-left:30%">
		<ul class="navbar-nav">
			<li class="nav-item active">
				<a class="nav-link" href="<?= base_url('home') ?>#home">Home</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?= base_url('home') ?>#pariwisata">Pariwisata</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?= base_url('home') ?>#galery">Galery</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?= base_url('home') ?>#berita">Berita</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?= base_url('home') ?>#testimoni">Testimoni</a>
			</li>
			<?php 
				if(isset($_SESSION['id_user']) && $_SESSION['level'] == 5):
			?>

			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button" href="#">Selamat Datang <b style="color:red"><?= $_SESSION['nama'] ?></b></a>
				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item" href="<?= base_url('profile/'.$_SESSION['id_user']) ?>">Profile</a>
					<a class="dropdown-item" role="button" onclick="logoutx()" href="#">Logout</a>
				</div>
			</li>
			
			<?php else :?>

			<li class="nav-item">
				<a class="nav-link" role="button" onclick="loginx()" href="#">Login</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button" href="#">Register</a>
				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item" role="button" onclick="registerw()" href="#">Wisatawan</a>
					<a class="dropdown-item" role="button" onclick="registerx()" href="#">Petugas Wisata</a>
				</div>
			</li>
			<?php endif ?>
		</ul>
	</div>
</nav>


<!-- Modal Login -->
<div class="modal" tabindex="-1" id="logins" role="dialog">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content" style="border-radius:15px">
			<div class="modal-body">
				<form action="<?= base_url('login_admin') ?>" method="post">
					<center>
						Login
					</center>
					<hr>
					<div class="form-group">
						<label for="">Username</label>
						<input type="text" class="form-control" placeholder="Username" name="username" id="username" required autocomplete="off">
					</div>
					<div class="form-group">
						<label for="">Password</label>
						<input type="password" class="form-control" placeholder="********" name="password" id="password" required autocomplete="off">
					</div>
					<div align="right">
						<button style="width:40%" type="submit" class="btn btn-primary btn-sm">Login</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Modal Register Wisatawan -->
<div class="modal" tabindex="-1" id="register-wisatawan" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content" style="border-radius:15px">
			<div class="modal-body">
				<form action="" method="post">
					<center>
						Register
					</center>
					<hr>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Nama</label>
								<input type="text" class="form-control" placeholder="Masukkan Nama" name="nama_add" id="nama_add" required autocomplete="off">
							</div>
							<div class="form-group">
								<label for="">Username</label>
								<input type="text" class="form-control" placeholder="Masukkan Username" name="username_add" id="username_add" required autocomplete="off">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Email</label>
								<input type="email" class="form-control" placeholder="ahmadsabari@gmail.com" name="email_add" id="email_add" required autocomplete="off">
							</div>
							<div class="form-group">
								<label for="">No. Telpon</label>
								<input type="number" class="form-control" placeholder="0852xxxxxx" name="nohp_add" id="nohp_add" required autocomplete="off">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="">Password</label>
						<input type="password" class="form-control" placeholder="********" name="password_add" id="password_add" required autocomplete="off">
					</div>
					<div class="form-group">
						<label for="">Alamat</label>
						<textarea name="alamat_add" id="alamat_add" class="form-control"></textarea>
					</div>
					<div align="center">
						<button type="button" onclick="simpanWisatawan()" class="btn btn-primary mt-2" style="width:300px">Daftar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Modal Register Petugas Wisata -->
<div class="modal" tabindex="-1" id="register-petugas" role="dialog">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				Daftar Petugas Wisata
			</div>
			<div class="modal-body">
				<form action="" method="post">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="">Nama</label>
								<input type="text" class="form-control" placeholder="" name="nama" id="nama">
							</div>

							<div class="form-group">
								<label for="">NIK</label>
								<input type="number" class="form-control" placeholder="" name="nik" id="nik">
							</div>

							<div class="form-group">
								<label for="">KK</label>
								<input type="file" class="form-control" placeholder="" onchange="tampilKK()" name="kk" id="kk">
								<div class="py-3 text-center" id="showKK">
								</div>
							</div>
							<div class="form-group">
								<label for="">Foto</label>
								<input type="file" class="form-control" placeholder="" onchange="tampilFoto()" name="foto" id="foto">
								<div class="py-3 text-center" id="showFoto">
								</div>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label for="">Tgl Lahir</label>
								<input type="date" class="form-control" placeholder="" name="tgl_lahir" id="tgl_lahir">
							</div>
							<div class="form-group">
								<label for="">Jenis Kelamin</label>
								<select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
									<option value="">-PILIH-</option>
									<option value="Laki-Laki">Laki-Laki</option>
									<option value="Perempuan">Perempuan</option>
								</select>
							</div>
							<div class="form-group">
								<label for="">No. Hp</label>
								<input type="number" class="form-control" placeholder="" name="nohp" id="nohp">
							</div>
							<div class="form-group">
								<label for="">Objek WIsata</label>
								<select name="objek_wisata" id="objek_wisata" class="form-control">
									<option value="">-PILIH-</option>
									<?php foreach ($wisata as $b) : ?>
										<option value="<?= $b->id_wisata ?>"><?= $b->nama_wisata ?></option>
									<?php endforeach ?>
								</select>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label for="">Jabatan</label>
								<select name="jabatan" id="jabatan" class="form-control">
									<option value="">-PILIH-</option>
									<?php foreach ($jabatan as $a) : ?>
										<option value="<?= $a->id_jabatan ?>"><?= $a->jabatan ?></option>
									<?php endforeach ?>
								</select>
							</div>
							<div class="form-group">
								<label for="">Agama</label>
								<select name="agama" id="agama" class="form-control">
									<option value="">-PILIH-</option>
									<option value="Islam">Islam</option>
									<option value="Kristen">Kristen</option>
									<option value="Katolik">Katolik</option>
									<option value="Hindu">Hindu</option>
									<option value="Buddha">Buddha</option>
									<option value="Konghucu">Konghucu</option>
								</select>
							</div>
							<div class="form-group">
								<label for="">Pendidikan</label>
								<select name="pendidikan" id="pendidikan" class="form-control">
									<option value="">-PILIH-</option>
									<option value="SD">SD</option>
									<option value="SMP">SMP</option>
									<option value="SMA">SMA</option>
									<option value="Sarjana">Sarjana</option>
								</select>
							</div>
							<div class="form-group">
								<label for="">Ijazah</label>
								<input type="file" class="form-control" placeholder="" onchange="tampilIjazah()" name="ijazah" id="ijazah">
								<div class="py-3 text-center" id="showIjazah">
								</div>
							</div>

						</div>

						<div class="col-md-8">
							<div class="form-group">
								<label for="">Alamat</label>
								<textarea name="alamat" id="alamat" class="form-control"></textarea>
							</div>
						</div>
						<div class="co-md-4">
							<button type="button" onclick="simpanData()" class="btn btn-primary mt-5" style="width:300px">Simpan</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
	function simpanWisatawan() {
		var form_data = new FormData();
		var urls = 'register-wisatawan'

		var nama_add = $('#nama_add').val();
		var username_add = $('#username_add').val();
		var email_add = $('#email_add').val();
		var nohp_add = $('#nohp_add').val();
		var password_add = $('#password_add').val();
		var alamat_add = $('#alamat_add').val();

		form_data.append("nama_add", nama_add);
		form_data.append("username_add", username_add);
		form_data.append("email_add", email_add);
		form_data.append("nohp_add", nohp_add);
		form_data.append("password_add", password_add);
		form_data.append("alamat_add", alamat_add);

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

	function simpanData() {
		var form_data = new FormData();
		urlx = 'register-petugas'

		var nama = $('#nama').val();
		var nik = $('#nik').val();
		var jabatan = $('#jabatan').val();
		var foto = $("#foto").prop("files")[0];
		var alamat = $('#alamat').val();
		var tgl_lahir = $('#tgl_lahir').val();
		var ijazah = $("#ijazah").prop("files")[0];
		var jenis_kelamin = $('#jenis_kelamin').val();
		var nohp = $('#nohp').val();
		var kk = $("#kk").prop("files")[0];
		var agama = $('#agama').val();
		var pendidikan = $('#pendidikan').val();
		var objek_wisata = $('#objek_wisata').val();

		form_data.append("nama", nama);
		form_data.append("nik", nik);
		form_data.append("jabatan", jabatan);
		form_data.append("foto", foto);
		form_data.append("alamat", alamat);
		form_data.append("tgl_lahir", tgl_lahir);
		form_data.append("ijazah", ijazah);
		form_data.append("jenis_kelamin", jenis_kelamin);
		form_data.append("nohp", nohp);
		form_data.append("kk", kk);
		form_data.append("agama", agama);
		form_data.append("pendidikan", pendidikan);
		form_data.append("objek_wisata", objek_wisata);

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

	function tampilIjazah() {
		var fileInput = document.getElementById('ijazah');
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
						document.getElementById('showIjazah').innerHTML = '<img src="' + e.target.result +
							'" width="120px"/>';
					};
					reader.readAsDataURL(fileInput.files[0]);
				}
			}
		}
	}

	function tampilFoto() {
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
					reader.onload = function(e) {
						document.getElementById('showFoto').innerHTML = '<img src="' + e.target.result +
							'" width="120px"/>';
					};
					reader.readAsDataURL(fileInput.files[0]);
				}
			}
		}
	}

	function tampilKK() {
		var fileInput = document.getElementById('kk');
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
						document.getElementById('showKK').innerHTML = '<img src="' + e.target.result +
							'" width="120px"/>';
					};
					reader.readAsDataURL(fileInput.files[0]);
				}
			}
		}
	}

	function logoutx() {
		swal({
				title: "Yakin Ingin Keluar",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					$.ajax({
						url: '<?= base_url('logout') ?>',
						type: 'GET',
						dataType: 'json',
						success: function(res) {
							if (res.pesan) {
								window.location="<?= base_url('/') ?>";
							}
						}
					})
				} else {
					swal("Hapus Data Dibatalkan!");
				}
			});

	}
</script>