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

	<?php
		$level = $_SESSION['level'];
		$id_user = $_SESSION['id_user'];
		if($level == 1)
		{
			$dataUser = array(
			'nama' => 'ADMINISTRATOR',
			'foto' => 'assets/src/images/user.png'
			);
		}elseif($level == 2){
			$user = $this->db->query("SELECT * FROM tb_operator WHERE id_user = '$id_user'")->row_array();
			$dataUser = array(
			'nama' => $user['nama'],
			'foto' => $user['foto']
			);
		}
	?>

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
							<img src="<?= base_url() ?><?= $dataUser['foto'] ?>" alt="">
						</span>
						<span class="user-name"><?= $dataUser['nama'] ?></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						<a class="dropdown-item" href="profile.html"><i class="dw dw-user1"></i> Profile</a>
						<a class="dropdown-item" href="profile.html"><i class="dw dw-settings2"></i> Setting</a>
						<a class="dropdown-item" href="<?= base_url('logout_admin') ?>"><i class="dw dw-logout"></i> Log Out</a>
					</div>
				</div>
			</div>
		</div>
	</div>