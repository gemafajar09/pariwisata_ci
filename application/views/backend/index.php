<?php
    $this->template->cek_login();
?>
<!DOCTYPE html>
<html>

<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>DeskApp - Bootstrap Admin Dashboard HTML Template</title>

	<?= $link ?>
</head>

<body>
	<?= $alert ?>
	<?= $script ?>
	<?= $header ?>
	<?= $sidebar ?>

	<div class="main-container">
		<?= $content ?>
	</div>
</body>

</html>
