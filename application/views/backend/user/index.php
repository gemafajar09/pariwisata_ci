<div class="pd-ltr-20 xs-pd-20-10">
	<div class="page-header">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Data Pengguna</li>
			</ol>
		</nav>
	</div>

	<div class="card">
		<div class="card-header">
			<div class="float-left">
				Data Pengguna
			</div>
			<div class="float-right">
				<!-- <button style="border-radius:15px" class="btn btn-primary btn-sm" type="button" id="addData">Add Data</button> -->
			</div>
		</div>
		<div class="card-body">
			<table class="table" id="tables">
				<thead>
					<tr>
						<th>No</th>
						<th>Username</th>
						<th>Password</th>
						<th>Level</th>
						<th style="width:20%"></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($user as $i => $isi): ?>
					<tr>
						<td><?= $i+1 ?></td>
						<td><?= $isi->username ?></td>
						<td><?= $isi->status != 0 ? '***********' : 'Password Default <b style="color:red">12345</b>' ?>
						</td>
						<td>
							<?php
                                    if($isi->level == 1)
                                    echo 'Admin';
                                    elseif($isi->level == 2)
                                    echo 'Operator';
                                    elseif($isi->level == 3)
                                    echo 'petugas wisata';
                                    elseif($isi->level == 4)
                                    echo 'pengelola wisata';
                                    elseif($isi->level == 5)
                                    echo 'calon petugas';
                                    else
                                    echo 'Wisatawan';
                                ?>
						</td>
						<td>
							<button onclick="unlockUser()"
								style="border-radius:25px;background-color:<?= $isi->status == 1 ? '#62e583' : '#c90032' ?> ;color:white;width:50px"
								type="button" class="btn btn-sm"><i class="fa fa-<?= $isi->status == 1 ? 'unlock' : 'lock' ?>"></i></button>
							<button onclick="editData()"
								style="border-radius:25px;background-color: #ff7b00;color:white;width:50px"
								type="button" class="btn btn-sm"><i class="fa fa-edit"></i></button>
							<button onclick="hapusData()"
								style="border-radius:25px;background-color: #ea003a;color:white;width:50px"
								type="button" class="btn btn-sm"><i class="fa fa-trash"></i></button>
						</td>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>
