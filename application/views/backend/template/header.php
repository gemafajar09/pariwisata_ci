	<!-- <div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><img src="<?= base_url() ?>assets/vendors/images/deskapp-logo.svg" alt=""></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Loading...
			</div>
		</div>
	</div> -->

	<div class="header">
		<div class="header-left">
			<div class="menu-icon dw dw-menu"></div>
			<div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
		</div>
		<div class="header-right">
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon">
							<img src="<?= base_url() ?><?= $_SESSION['foto'] ?>" alt="" width="52px" height="52px">
						</span>
						<span class="user-name"><?= $_SESSION['nama'] ?></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						<?php if($_SESSION['level'] != 1): ?>
						<a class="dropdown-item" href="<?= base_url('b_profile/'.$_SESSION['id_user']."/".$_SESSION['level']) ?>"><i class="dw dw-user1"></i> Profile</a>
						<?php endif ?>
						<a class="dropdown-item" href="<?= base_url('logout_admin') ?>"><i class="dw dw-logout"></i> Log Out</a>
					</div>
				</div>
			</div>
		</div>
	</div>