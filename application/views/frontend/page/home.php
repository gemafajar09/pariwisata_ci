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
<section id="home">
	<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img class="d-block sliderx w-100" src="https://www.handalselaras.com/wp-content/uploads/2020/12/Tips-Wisata-Bali-Feature-Image-1030x579.jpg" alt="First slide">
			</div>
			<div class="carousel-item">
				<img class="d-block sliderx w-100" src="<?= base_url('assets/src/images/banner-img.png') ?>" alt="Second slide">
			</div>
			<div class="carousel-item">
				<img class="d-block sliderx w-100" src="<?= base_url('assets/src/images/banner-img.png') ?>" alt="Third slide">
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
			foreach ($pariwisata as $v) :
			?>
				<div class="col-md-6 p-3">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-md-4">
									<img src="<?= base_url() ?>assets/src/images/priwisata1.png" alt="" style="width:100%">
								</div>
								<div class="col-md-8">
									<h3><?= $v->nama_wisata ?></h3>
									Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore necessitatibus non aperiam consectetur illum obcaecati, quos officia cupiditate tempora facere unde temporibus tempore! Cupiditate corrupti reiciendis a modi odio error!
									<br>
									<br>
									<a href="<?= base_url('detail-wisata/'.$v->id_wisata) ?>" class="btn btn-sm btn-success ml-3" style="float:right">Lihat Detail</a>
									<a href="https://www.google.com/maps/@<?= $v->lat ?>,<?= $v->lng ?>z " class="btn btn-sm btn-info ml-3" style="float:right" target="_blank">Lihat Rute</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach ?>
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
			<?php foreach ($galeri as $isi) : ?>
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
			<?php endforeach ?>
		</div>
	</div>
	<div class="ml-5 mr-5 mt-3">
		<a href="detail-galery/" style="border-radius:25px;background-color: #4da823; font-size:18px; height: 40px; color:white; width:100%;" type="button" class="btn btn-sm">Lihat Semua Galeri</a>
	</div>
</section>

<section id="berita">
	<div class="container mt-5">
		<center>
			<h2>Berita</h2>
		</center>
		<hr>
		<div class="row">
			<?php foreach ($data as $isi) : ?>
				<div class="col-md-6 p-3">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-md-4">
									<img src="<?= base_url('assets/upload/berita/' . $isi->foto) ?>" alt="" style="width:100%">
								</div>
								<div class="col-md-8">
									<?= $isi->isi_berita ?>
									<br>
									<br>
									<a href="detail-berita/<?= $isi->id_berita ?>" class="btn btn-sm btn-info ml-3" style="float:right">Selengkapnya >></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach ?>
		</div>
	</div>
</section>
