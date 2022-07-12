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
                                    echo 'Pengelola wisata';
                                    elseif($isi->level == 4)
                                    echo 'Petugas wisata';
                                    elseif($isi->level == 5)
                                    echo 'calon petugas';
                                    else
                                    echo 'Wisatawan';
                                ?>
						</td>
						<td>
							<button onclick="unlockUser('<?= $isi->id_user ?>')"
								style="border-radius:25px;background-color:<?= $isi->status == 1 ? '#62e583' : '#c90032' ?> ;color:white;width:50px"
								type="button" class="btn btn-sm"><i
									class="fa fa-<?= $isi->status == 1 ? 'unlock' : 'lock' ?>"></i></button>
							<button onclick="editData('<?= $isi->id_user ?>')"
								style="border-radius:25px;background-color: #ff7b00;color:white;width:50px"
								type="button" class="btn btn-sm"><i class="fa fa-edit"></i></button>
							<button onclick="hapusData('<?= $isi->id_user ?>')"
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

<div class="modal" id="dataoperator" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content" style="border-radius:15px">
			<div class="modal-header">
				<h5 class="modal-title" id="judul"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="" method="post">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Password New</label>
								<input type="password" class="form-control" placeholder="***********" id="password" name="password"
									required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Repeat Password</label>
								<input type="password" class="form-control" placeholder="***********" id="password_new"
									name="password_new" required>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" onclick="simpandata()" class="btn btn-primary">Save changes</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script>
	var idx;
	// function untuk tampilkan modal untuk tambah data
	function editData(id) {
		idx = id
		// set judul pada title modal
		$('#judul').html("Ganti Password")
		// perintah membuka modal
		$('#dataoperator').modal('show')
	}

	function simpandata()
	{
		var password = $('#password');
		var password_new = $('#password_new');

		password.removeClass('is-valid is-invalid')
		password_new.removeClass('is-valid is-invalid')

		if(password.val() == password_new.val()) {
			password.addClass("is-valid");
			password_new.addClass("is-valid");
			$.ajax({
				url: 'user-pass/'+idx,
				type: 'POST',
				dataType: 'JSON',
				data: {password: password.val()},
				success: function (res) {
					if(res.pesan){
						window.location.reload();
					}
				}
			})
		}else{
			password.addClass("is-invalid");
  			password_new.addClass("is-invalid");
		}
	}

	function unlockUser(id){
		$.ajax({
			url: 'user-up/'+id,
			type: 'GET',
			dataType:'JSON',
			success:function(res){
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
						url: 'user-del/' + id,
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
