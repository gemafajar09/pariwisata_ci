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
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<p>Modal body text goes here.</p>
			</div>
		</div>
	</div>
</div>
