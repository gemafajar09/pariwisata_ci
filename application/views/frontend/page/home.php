<style>
@media (min-width:1025px) {
    .sliderx{
        height:600px;
    }
}
@media (min-width:1281px) {
    .sliderx{
        height:600px;
    }
}
</style>
<section>
	<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img class="d-block sliderx w-100"
					src="<?= base_url('assets/src/images/banner-img.png') ?>" alt="First slide">
			</div>
			<div class="carousel-item">
				<img class="d-block sliderx w-100"
					src="<?= base_url('assets/src/images/banner-img.png') ?>" alt="Second slide">
			</div>
			<div class="carousel-item">
				<img class="d-block sliderx w-100"
					src="<?= base_url('assets/src/images/banner-img.png') ?>" alt="Third slide">
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

<section>
    <div class="container mt-5">
        <h3>Priwisata</h3>
        <hr>
        <div class="row">
            <?php
                for($i = 0; $i < 9; $i++) :
            ?>
                <div class="col-md-4 p-3">
                    <div class="card">
                        <div class="card-body">
                            <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto repellendus neque excepturi sequi inventore ut quaerat cum totam velit! Rem laboriosam ipsa odio eius illo? Aliquam autem voluptate beatae atque?</h5>
                        </div>
                    </div>
                </div>
            <?php endfor ?>
        </div>
    </div>
    
</section>
