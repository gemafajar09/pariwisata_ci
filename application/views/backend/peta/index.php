<div class="pd-ltr-20 xs-pd-20-10">
	<div class="page-header">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Data Peta</li>
			</ol>
		</nav>
	</div>

	<div class="card">
		<div class="card-header">
			<div class="float-left">
				Data Peta
			</div>
			<div class="float-right">
				<button style="border-radius:15px" class="btn btn-primary btn-sm" type="button" id="addData">Add Data</button>
			</div>
		</div>
		<div class="card-body">
			<table class="table" id="tables">
				<thead>
					<tr>
						<th style="width:10%">No</th>
						<th style="width:10%">URl</th>
						<th>Objek Wisata</th>
						<th style="width:20%"></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($peta as $i => $a): ?>
					<tr>
						<td><?= $i+1 ?></td>
						<td><a class="btn btn-info btn-sm" href="<?= $a->url ?>">Link</a></td>
						<td><?= $a->nama_wisata ?></td>
						<td>
							<button onclick="editData('<?= $a->id_peta ?>','<?= $a->url ?>','<?= $a->id_wisata ?>')"
								style="border-radius:25px;background-color: #ff7b00;color:white;width:50px"
								type="button" class="btn btn-sm"><i class="fa fa-edit"></i></button>
							<button onclick="hapusData('<?= $a->id_peta ?>')"
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

<div class="modal" id="dataPeta" tabindex="-1" role="dialog">
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
						<!-- <div class="col-md-12">
							<div class="form-group">
								<label for="">Latitude</label>
								<input type="text" class="form-control" placeholder="Ex : -1002132317" id="lat" name="lat"
									required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Longtitude</label>
								<input type="text" class="form-control" placeholder="Ex : 98726364552" id="lng" name="lng"
									required>
							</div>
						</div> -->
						<div class="col-md-12">
							<div class="form-group">
								<label for="">Url Maps</label>
								<input type="text" class="form-control" placeholder="Ex : http://maps.google.co.id" id="url" name="url"
									required>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="">Objek Wisata</label>
								<select name="id_objek" id="id_objek" class="form-control">
									<option value="">-PILIH-</option>
									<?php foreach($wisata as $a): ?>
										<option value="<?= $a->id_wisata ?>"><?= $a->nama_wisata ?></option>
									<?php endforeach ?>
								</select>
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
	var idx, urlx;

    $('#addData').click(function(){
        $('#judul').html('Tambah Data')
        $('#dataPeta').modal('show');
    })

	// function untuk tampilkan modal untuk tambah data
	function editData(id,url,id_objek) {
		idx = id
		// set judul pada title modal
		$('#judul').html("Edit Data")
        $('#url').val(url)
        $('#id_objek').val(id_objek)
		// perintah membuka modal
		$('#dataPeta').modal('show')
	}

	function simpandata()
	{
        urlx = 'peta-add'

        if(idx != null){
            urlx = 'peta-add/' + idx;
        }

		var url = $('#url').val()
        var id_objek = $('#id_objek').val()
        $.ajax({
            url: urlx,
            type: 'POST',
            dataType: 'JSON',
            data: {
				url: url,
				id_objek: id_objek,
			},
            success: function (res) {
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
						url: 'peta-del/' + id,
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
