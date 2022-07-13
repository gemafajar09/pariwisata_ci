<div class="pd-ltr-20 xs-pd-20-10">
	<div class="min-height-200px">
		<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
			<center>
				<h3>Selamat Datang Dihalaman
				<?php if ($_SESSION['level'] == 1) : ?>
					Administrator</h3>
				<?php elseif ($_SESSION['level'] == 2) : ?>
					Operator Dinas</h3>
				<?php elseif ($_SESSION['level'] == 3) : ?>
					Pengelola Wisata</h3>
				<?php elseif ($_SESSION['level'] == 4) : ?>
					Petugas Wisata</h3>
				<?php endif ?>
			</center>
		</div>
	</div>
</div>