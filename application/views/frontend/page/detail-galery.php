<section id="breadcrumbs" class="breadcrumbs">
	<div class="container">

		<ol>
			<li><a href="index.html">Home</a></li>
			<li>Galery</li>
		</ol>

	</div>
</section>

<section id="galery">
	<div class="px-5 mt-5">
		<center>
			<h2>Galery</h2>
		</center>
		<hr>
		<div>
			<div class="my-4">
				<a href="javascript:history.back()" style="border-radius:25px;background-color: #f2ba11; font-size:18px; height: 40px; color:white;" type="button" class="btn btn-sm">< Kembali</a>
			</div>
		</div>
		<div class="row">
			<?php foreach ($data as $isi) : ?>
				<div class="col-md-3 p-3">
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
</section>
