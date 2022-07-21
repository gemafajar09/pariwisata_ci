<div class="container rounded bg-white mt-5 mb-5 pt-10">
    <div class="row">

        <div class="col-md-3">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                <span class="font-weight-bold"><?= $profile['nama'] ?></span>
            </div>
        </div>
        <div class="col-md-5">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <label class="labels">Nama</label>
                        <input type="text" id="namax" class="form-control" placeholder="Nama" value="<?= $profile['nama'] ?>">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label class="labels">Alamat</label>
                        <textarea id="alamatx" class="form-control"><?= $profile['alamat'] ?></textarea>
                    </div>
                </div>
                <div class="mt-5 text-center">
                    <button class="btn btn-primary profile-button btn-block" onclick="updateProfile('<?= $profile['id_user'] ?>','<?= $profile['level'] ?>')" type="button">Save Profile</button>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Ganti Password</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label class="labels">Password</label>
                        <input type="password" id="passwordx" class="form-control" placeholder="******" value="">
                    </div>
                    <div class="col-md-6">
                        <label class="labels">Ulangi Password</label>
                        <input type="password" id="password1x" class="form-control" value="" placeholder="******">
                    </div>
                </div>
                <div class="mt-5 text-center">
                    <button onclick="updatePass('<?= $profile['id_user'] ?>', '<?= $profile['level'] ?>')" class="btn btn-primary profile-button btn-block" type="button">Save Password</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function updateProfile(id, level) {
        var form_data = new FormData();

        var namax = $('#namax').val()
        var emailx = $('#emailx').val()
        var nohpx = $('#nohpx').val()
        var alamatx = $('#alamatx').val()

        form_data.append("namax", namax);
        form_data.append("emailx", emailx);
        form_data.append("nohpx", nohpx);
        form_data.append("alamatx", alamatx);

        $.ajax({
            url: "<?= base_url('b_profile-update') ?>/" + id + "/" + level,
            type: 'post',
            dataType: 'JSON',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            success: function(res) {
                if (res.pesan) {
                    window.location.reload();
                }
            }
        });
    }

    function updatePass(id, level) {
        var form_data = new FormData();
        
        var password = $('#passwordx').val()
        var password1 = $('#password1x').val()

        form_data.append("passwordx", password);
        form_data.append("password1x", password1);

        if (password == password1) {
            $.ajax({
                url: "<?= base_url('b_pass-update') ?>/" + id + "/" + level,
                type: 'post',
                dataType: 'JSON',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                success: function(res) {
                    if (res.pesan) {
                        window.location.reload();
                    }
                }
            })
        } else {
            alert("Pastikan Password Sama!")
        }
    }
</script>