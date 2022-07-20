<style>
	@media (min-width:1025px) {
		.sliderx {
			height: 600px;
		}
	}

	@media (min-width:1281px) {
		.sliderx {
			height: 600px;
		}
	}

</style>
<section id="home" style="margin-top:4%">
	<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img class="d-block sliderx w-100"
					src="https://www.handalselaras.com/wp-content/uploads/2020/12/Tips-Wisata-Bali-Feature-Image-1030x579.jpg"
					alt="First slide">
			</div>
			<div class="carousel-item">
				<img class="d-block sliderx w-100" src="<?= base_url('assets/src/images/banner-img.png') ?>"
					alt="Second slide">
			</div>
			<div class="carousel-item">
				<img class="d-block sliderx w-100" src="<?= base_url('assets/src/images/banner-img.png') ?>"
					alt="Third slide">
			</div>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
</section>

<section id="pariwisata">
	<div class="container mt-5">
		<center>
			<h2>Priwisata</h2>
		</center>
		<hr>
		<div class="row">
			<?php
			if($pariwisata != null):
			foreach ($pariwisata as $v) :
		?>

				<div class="col-md-6 p-3">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-md-5">
									<img src="<?= base_url() ?>assets/upload/wisata/<?= $v->foto_wisata ?>" alt="" style="width:100%; height:100%">
								</div>
								<div class="col-md-7">
									<h3><?= $v->nama_wisata ?></h3>
									<?= substr($v->pusat_informasi,0,200) ?> ....
									<br>
									<br>
									<a href="<?= base_url('detail-wisata/'.$v->id_wisata) ?>" class="btn btn-sm btn-success ml-3" style="float:right">Lihat Detail</a>
									<!-- <a href="https://www.google.com/maps/@<?= $v->lat ?>,<?= $v->lng ?>z " class="btn btn-sm btn-info ml-3" style="float:right" target="_blank">Lihat Rute</a> -->
								</div>
							</div>
						</div>
					</div>
				</div>

			<?php 
			endforeach;
			else :
			?>
			<center class="mx-auto">
				<lottie-player src="https://assets9.lottiefiles.com/packages/lf20_qyb2cbhe.json"
					background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay>
				</lottie-player>
			</center>
			<?php endif ?>

		</div>
	</div>
</section>

<section id="galery">
	<div class="container mt-5">
		<center>
			<h2>Galery</h2>
		</center>
		<hr>
		<div class="row">
			<?php 
			if($galeri != null):
			foreach ($galeri as $isi) : ?>
			<div class="col-md-4 p-3">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-md-12">
								<img src="<?= base_url() ?><?= $isi->foto  ?>" alt="" style="width:100%">
							</div>
							<div class="col-md-12 mt-3">
								<?= $isi->deskripsi  ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php 
			endforeach;
			?>
			<div class="ml-5 mr-5 mt-3">
				<a href="detail-galery/"
					style="border-radius:25px;background-color: #4da823; font-size:18px; height: 40px; color:white; width:100%;"
					type="button" class="btn btn-sm">Lihat Semua Galeri</a>
			</div>
			<?php
			else :
			?>
			<center class="mx-auto">
				<lottie-player src="https://assets9.lottiefiles.com/packages/lf20_qyb2cbhe.json"
					background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay>
				</lottie-player>
			</center>
			<?php endif ?>
		</div>
	</div>
</section>

<section id="berita">
	<div class="container mt-5">
		<center>
			<h2>Berita</h2>
		</center>
		<hr>
		<div class="row">
			<?php 
			if($berita != null) :
			foreach ($berita as $isi) : ?>
			<div class="col-md-6 p-3">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-md-4">
								<img src="<?= base_url('assets/upload/berita/' . $isi->foto) ?>" alt=""
									style="width:100%">
							</div>
							<div class="col-md-8">
								<?= $isi->isi_berita ?>
								<br>
								<br>
								<a href="detail-berita/<?= $isi->id_berita ?>" class="btn btn-sm btn-info ml-3"
									style="float:right">Selengkapnya >></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php 
				endforeach;
				else :
			?>
			<center class="mx-auto">
				<lottie-player src="https://assets9.lottiefiles.com/packages/lf20_qyb2cbhe.json"
					background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay>
				</lottie-player>
			</center>
			<?php endif ?>
		</div>
	</div>
</section>

<section id="testimoni" class="mb-5 mt-6">
	<div class="container">
		<center>
			<h2>Testimoni</h2>
		</center>
		<hr>
		<div class="row">
			<div class="owl-carousel">
				<?php 
					if($testimoni != null): 
					foreach($testimoni as $ax): ?>
					<div class="card">
						<div class="card-body">
							<center>
								<img src="https://icon-library.com/images/user-png-icon/user-png-icon-16.jpg"
									style="width:100px; height:100px" class="rounded-circle" alt="Cinque Terre">
							</center>
							<br>
							<p>
								<?= $ax->nama ?><br>
								<i style="font-size:10px"><?= $ax->email ?></i>
							</p>
							<p>
								<?= $ax->komentar ?>
							</p>
						</div>
					</div>
				<?php 
					endforeach;
					else :
				?>
				<div>
					<center class="mx-auto">
						<lottie-player src="https://assets9.lottiefiles.com/packages/lf20_qyb2cbhe.json"
							background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay>
						</lottie-player>
					</center>
					
				</div>
				<?php endif ?>
			</div>
		</div>
		<br>
		<div class="row py-4">
			<div class="col-md-8 mx-auto">
				<center>
					<h3>Silahkan Tinggalkan Pesan</h3>
				</center>
				<div class="card">
					<div class="card-body">
						<form action="">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Nama</label>
										<input type="text" class="form-control" placeholder="Nama" id="nama" name="nama" value="<?= isset($_SESSION['nama']) ?>" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Email</label>
										<input type="email" class="form-control" placeholder="Nama" id="email" name="email"
											required>
									</div>
								</div>
								<div class="col-md-12">
									<label for="">Komentar</label>
									<textarea name="komentar" id="komentar" class="form-control" cols="20" rows="10"></textarea>
								</div>
								<button onclick="simpandata()" style="margin-top:5px; margin-left:5px; margin-right:5px" class="btn btn-block btn-primary" type="button">Kirim</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="footer">
	<div class="navbar navbar-inverse bg-dark fixed-bottom">
		<div class="container">
			<p style="color:#fff">
				Aplikasi Pariwisata
			</p>
		</div>
	</div>
</section>

<script>

	function simpandata()
	{
		var nama = $('#nama').val()
        var email = $('#email').val()
        var komentar = $('#komentar').val()
        $.ajax({
            url: 'testimoni-add',
            type: 'POST',
            dataType: 'JSON',
            data: {
				nama: nama,
				email: email,
				komentar: komentar,
			},
            success: function (res) {
                if(res.pesan){
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
						url: 'peta-del/' + id,
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
</script>
