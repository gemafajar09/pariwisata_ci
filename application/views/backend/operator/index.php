<div class="row">
	<div class="container">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Data Operator Dinas Pariwisata</li>
			</ol>
		</nav>
		<div class="card">
			<div class="card-header">
				<div class="float-left">
					Data Operator Dinas Pariwisata
				</div>
				<div class="float-right">
					<button class="btn btn-primary btn-sm" type="button" id="addData">Add Data</button>
				</div>
			</div>
			<div class="card-body">
				<table class="table" id="tables">
					<thead>
						<tr>
							<th>No</th>
							<th>Foto</th>
							<th>Nama</th>
							<th>Nik</th>
							<th>Alamat</th>
							<th>Alamat</th>
							<th>No</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
</div>

<div class="modal" id="dataoperator" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document" >
		<div class="modal-content"  style="border-radius:15px">
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
                                <label for="">Nama</label>
                                <input type="text" class="form-control" placeholder="Nama" id="nama" name="nama" required>
                            </div>
                            <div class="form-group">
                                <label for="">Foto</label>
                                <input type="file" class="form-control" id="file" name="file" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nik</label>
                                <input type="number" class="form-control" placeholder="EX: 123331233312" id="nik" name="nik" required>
                            </div>    
                            <div class="form-group">
                                <label for="">Jabatan</label>
                                <select name="jabatan" id="jabatan" class="form-control" required>
                                    <option value="">-PILIH-</option>
                                </select>
                            </div>    
                        </div>
                        <div class="col-md-12">
                            <div class="from-group">
                                <label for="">Alamat</label>
                                <textarea name="alamat" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
		</div>
	</div>
</div>


<script>
    $('#addData').click(function() {
        $('#judul').html("Tambah Data")
        $('#dataoperator').modal('show')
    })
</script>