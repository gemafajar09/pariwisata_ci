<div class="pd-ltr-20 xs-pd-20-10">
	<div class="page-header">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Data Kategori</li>
			</ol>
		</nav>
	</div>

	<div class="card">
		<div class="card-header">
			<div class="float-left">
				Data Kategori
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
						<th>Kategori</th>
						<th style="width:20%"></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($kategori as $i => $isi): ?>
					<tr>
						<td><?= $i+1 ?></td>
						<td><?= $isi->kategori ?></td>
						<td>
							<button onclick="editData('<?= $isi->id_kategori ?>','<?= $isi->kategori ?>')"
								style="border-radius:25px;background-color: #ff7b00;color:white;width:50px"
								type="button" class="btn btn-sm"><i class="fa fa-edit"></i></button>
							<button onclick="hapusData('<?= $isi->id_kategori ?>')"
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

<div class="modal" id="datakategori" tabindex="-1" role="dialog">
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
                    <div class="form-group">
                        <label for="">Kategori</label>
                        <input type="text" class="form-control" placeholder="kategori" id="kategori" name="kategori"
                            required>
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
	var idx,urlx;

    $('#addData').click(function(){
        $('#judul').html('Tambah Kategori')
        $('#datakategori').modal('show');
    })

	// function untuk tampilkan modal untuk tambah data
	function editData(id,kategori) {
		idx = id
		// set judul pada title modal
		$('#judul').html("Edit Kategori")
        $('#kategori').val(kategori)
		// perintah membuka modal
		$('#datakategori').modal('show')
	}

	function simpandata()
	{
        urlx = 'kategori-add'

        if(idx != null){
            urlx = 'kategori-add/' + idx;
        }
        
		var kategori = $('#kategori').val()
        $.ajax({
            url: urlx,
            type: 'POST',
            dataType: 'JSON',
            data: {kategori: kategori},
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
						url: 'kategori-del/' + id,
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
