<style>
	.brand-logo a{
		background: white;
	}
</style>
<div class="right-sidebar">
		<div class="sidebar-title">
			<h3 class="weight-600 font-16 text-blue">
				Layout Settings
				<span class="btn-block font-weight-400 font-12">User Interface Settings</span>
			</h3>
			<div class="close-sidebar" data-toggle="right-sidebar-close">
				<i class="icon-copy ion-close-round"></i>
			</div>
		</div>
		<div class="right-sidebar-body customscroll">
			<div class="right-sidebar-body-content">
				<h4 class="weight-600 font-18 pb-10">Header Background</h4>
				<div class="sidebar-btn-group pb-30 mb-10">
					<a href="javascript:void(0);" class="btn btn-outline-primary header-white active">White</a>
					<a href="javascript:void(0);" class="btn btn-outline-primary header-dark">Dark</a>
				</div>

				<h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
				<div class="sidebar-btn-group pb-30 mb-10">
					<a href="javascript:void(0);" class="btn btn-outline-primary sidebar-light ">White</a>
					<a href="javascript:void(0);" class="btn btn-outline-primary sidebar-dark active">Dark</a>
				</div>

				<h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
				<div class="sidebar-radio-group pb-10 mb-10">
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-1" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-1" checked="">
						<label class="custom-control-label" for="sidebaricon-1"><i class="fa fa-angle-down"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-2" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-2">
						<label class="custom-control-label" for="sidebaricon-2"><i class="ion-plus-round"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-3" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-3">
						<label class="custom-control-label" for="sidebaricon-3"><i class="fa fa-angle-double-right"></i></label>
					</div>
				</div>

				<h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
				<div class="sidebar-radio-group pb-30 mb-10">
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-1" name="menu-list-icon" class="custom-control-input" value="icon-list-style-1" checked="">
						<label class="custom-control-label" for="sidebariconlist-1"><i class="ion-minus-round"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-2" name="menu-list-icon" class="custom-control-input" value="icon-list-style-2">
						<label class="custom-control-label" for="sidebariconlist-2"><i class="fa fa-circle-o" aria-hidden="true"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-3" name="menu-list-icon" class="custom-control-input" value="icon-list-style-3">
						<label class="custom-control-label" for="sidebariconlist-3"><i class="dw dw-check"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-4" name="menu-list-icon" class="custom-control-input" value="icon-list-style-4" checked="">
						<label class="custom-control-label" for="sidebariconlist-4"><i class="icon-copy dw dw-next-2"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-5" name="menu-list-icon" class="custom-control-input" value="icon-list-style-5">
						<label class="custom-control-label" for="sidebariconlist-5"><i class="dw dw-fast-forward-1"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-6" name="menu-list-icon" class="custom-control-input" value="icon-list-style-6">
						<label class="custom-control-label" for="sidebariconlist-6"><i class="dw dw-next"></i></label>
					</div>
				</div>

				<div class="reset-options pt-30 text-center">
					<button class="btn btn-danger" id="reset-settings">Reset Settings</button>
				</div>
			</div>
		</div>
	</div>

	<div class="left-side-bar">
		<div class="brand-logo">
			<a href="index.html">
				<img src="<?= base_url() ?>assets/src/images/priwisata1.png" alt="" class="dark-logo">
				<img src="<?= base_url() ?>assets/src/images/priwisata1.png" alt="" class="light-logo">
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					<li class="dropdown">
						<a href="<?= base_url('dashboard') ?>" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-house-1"></span><span class="mtext">Home</span>
						</a>
					</li>
					<!-- Administrator -->
					<?php if($_SESSION['level'] == 1): ?>
						<li class="dropdown">
							<a href="<?= base_url('user') ?>" class="dropdown-toggle no-arrow">
								<span class="micon dw dw-user"></span><span class="mtext">Akun Pengguna</span>
							</a>
						</li>
						<li class="dropdown">
							<a href="<?= base_url('operator') ?>" class="dropdown-toggle no-arrow">
								<span class="micon dw dw-user"></span><span class="mtext">Operator Dinas Wisata</span>
							</a>
						</li>
						<li class="dropdown">
							<a href="<?= base_url('pengelola') ?>" class="dropdown-toggle no-arrow">
								<span class="micon dw dw-user"></span><span class="mtext">Daftar Pengelola Wisata</span>
							</a>
						</li>
						<li class="dropdown">
							<a href="<?= base_url('jabatan') ?>" class="dropdown-toggle no-arrow">
								<span class="micon dw dw-file"></span><span class="mtext">Jabatan</span>
							</a>
						</li>
						<li class="dropdown">
							<a href="<?= base_url('banner') ?>" class="dropdown-toggle no-arrow">
								<span class="micon dw dw-image"></span><span class="mtext">Banner</span>
							</a>
						</li>
					<?php endif ?>

					<!-- operator dinas -->
					<?php if($_SESSION['level'] == 2): ?>
						<li class="dropdown">
							<a href="<?= base_url('galery') ?>" class="dropdown-toggle no-arrow">
								<span class="micon dw dw-image"></span><span class="mtext">Galery</span>
							</a>
						</li>
						<li class="dropdown">
							<a href="<?= base_url('peta') ?>" class="dropdown-toggle no-arrow">
								<span class="micon dw dw-map"></span><span class="mtext">Peta</span>
							</a>
						</li>
						<li class="dropdown">
							<a href="<?= base_url('berita') ?>" class="dropdown-toggle no-arrow">
								<span class="micon dw dw-file"></span><span class="mtext">Berita</span>
							</a>
						</li>
						<li class="dropdown">
							<a href="<?= base_url('surat') ?>" class="dropdown-toggle no-arrow">
								<span class="micon dw dw-file"></span><span class="mtext">Surat Rekomendasi</span>
							</a>
						</li>
						<li class="dropdown">
							<a href="<?= base_url('testimoni') ?>" class="dropdown-toggle no-arrow">
								<span class="micon dw dw-chat"></span><span class="mtext">Testimoni</span>
							</a>
						</li>
						<li class="dropdown">
							<a href="<?= base_url('kategori') ?>" class="dropdown-toggle no-arrow">
								<span class="micon dw dw-file"></span><span class="mtext">Kategori</span>
							</a>
						</li>
						<li class="dropdown">
							<a href="<?= base_url('wisata') ?>" class="dropdown-toggle no-arrow">
								<span class="micon dw dw-island"></span><span class="mtext">Objek Wisata</span>
							</a>
						</li>
					<?php endif ?>

					<!-- pengelola wisata -->
					<?php if($_SESSION['level'] == 3): ?>
						<li class="dropdown">
							<a href="<?= base_url('pendapatan') ?>" class="dropdown-toggle no-arrow">
								<span class="micon dw dw-money"></span><span class="mtext">Pendapatan Wisata</span>
							</a>
						</li>
						<li class="dropdown">
							<a href="<?= base_url('formulir-petugas') ?>" class="dropdown-toggle no-arrow">
								<span class="micon dw dw-file"></span><span class="mtext">Formulir Pendaftaran</span>
							</a>
						</li>
						<li class="dropdown">
							<a href="<?= base_url('petugas') ?>" class="dropdown-toggle no-arrow">
								<span class="micon dw dw-user"></span><span class="mtext">Data Petugas Wisata</span>
							</a>
						</li>
						<li class="dropdown">
							<a href="<?= base_url('jabatan') ?>" class="dropdown-toggle no-arrow">
								<span class="micon dw dw-file"></span><span class="mtext">Jabatan</span>
							</a>
						</li>
						<!-- <li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle no-arrow">
								<span class="micon dw dw-user"></span><span class="mtext">Seleksi Calon Petugas</span>
							</a>
						</li> -->
					<?php endif ?>

					<!-- petugas wisata -->
					<?php if($_SESSION['level'] == 4): ?>
						<?php if($_SESSION['status'] == 1): ?>
						<li class="dropdown">
							<a href="<?= base_url('tiket') ?>" class="dropdown-toggle no-arrow">
								<span class="micon dw dw-ticket"></span><span class="mtext">Daftar Tiket Wisata</span>
							</a>
						</li>
						<?php endif ?>
						<!-- <li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle no-arrow">
								<span class="micon dw dw-ticket"></span><span class="mtext">Detail Profile</span>
							</a>
						</li> -->
					<?php endif ?>

					<!-- calon petugas -->
					<?php if($_SESSION['level'] == 5): ?>
						<li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle no-arrow">
								<span class="micon dw dw-ticket"></span><span class="mtext">Seleksi Calon Petugas</span>
							</a>
						</li>
						<li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle no-arrow">
								<span class="micon dw dw-ticket"></span><span class="mtext">Daftar Calon Petugas</span>
							</a>
						</li>
					<?php endif ?>

					
				</ul>
			</div>
		</div>
	</div>
	<div class="mobile-menu-overlay"></div>