<?php
    if(isset($_SESSION['pesan']))
    {
        echo "<script>
            swal('".$_SESSION['type']."', '".$_SESSION['pesan']."', '".$_SESSION['type']."');
        </script>";
    }
?>

<nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light">
	<a class="navbar-brand" href="#">
		<img src="<?= base_url() ?>assets/src/images/priwisata1.png" width="100" height="50"
			class="d-inline-block align-top" alt="">
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
		aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNav" style="margin-left:30%">
		<ul class="navbar-nav">
			<li class="nav-item active">
				<a class="nav-link" href="#home">Home</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#pariwisata">Pariwisata</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#galery">Galery</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#berita">Berita</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#testimoni">Testimoni</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#faq">Faq</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" role="button" onclick="loginx()" href="#">Login</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
					aria-haspopup="true" aria-expanded="false" role="button" href="#">Register</a>
				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item" href="#">Wisatawan</a>
					<a class="dropdown-item" role="button" onclick="registerx()" href="#">Petugas Wisata</a>
				</div>
			</li>
		</ul>
	</div>
</nav>

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
						<input type="text" class="form-control" placeholder="Username" name="username" id="username" required
							autocomplete="off">
					</div>
					<div class="form-group">
						<label for="">Password</label>
						<input type="password" class="form-control" placeholder="********" name="password" id="password" required
							autocomplete="off">
					</div>
					<div align="right">
						<button style="width:40%" type="submit" class="btn btn-primary btn-sm">Login</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

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
								<input type="text" class="form-control" placeholder="" name="nama">
							</div>
							
							<div class="form-group">
								<label for="">NIK</label>
								<input type="number" class="form-control" placeholder="" name="nik">
							</div>
							
							<div class="form-group">
								<label for="">KK</label>
								<input type="file" class="form-control" placeholder="" name="kk">
							</div>
							<div class="form-group">
								<label for="">Foto</label>
								<input type="file" class="form-control" placeholder="" name="foto">
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label for="">Tgl Lahir</label>
								<input type="date" class="form-control" placeholder="" name="tgl_lahir">
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
								<input type="number" class="form-control" placeholder="" name="nohp">
							</div>
							<div class="form-group">
								<label for="">Objek WIsata</label>
								<select name="objek_wisata" id="objek_wisata" class="form-control">
									<option value="">-PILIH-</option>
								</select>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label for="">Jabatan</label>
								<select name="jabatan" id="jabatan" class="form-control">
									<option value="">-PILIH-</option>
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
								<input type="file" class="form-control" placeholder="" name="ijazah">
							</div>
							
						</div>

						<div class="col-md-8">
							<div class="form-group">
								<label for="">Alamat</label>
								<textarea name="alamat" class="form-control"></textarea>
							</div>
						</div>
						<div class="co-md-4">
							<button type="submit" class="btn btn-primary mt-5" style="width:300px">Simpan</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
