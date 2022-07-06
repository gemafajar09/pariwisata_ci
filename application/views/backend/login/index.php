<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/fontawesome.min.css">
</head>
<body>
    <script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/js/fontawesome.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php
        if(isset($_SESSION['pesan']))
        {
            echo "<script>
                swal('".$_SESSION['type']."', '".$_SESSION['pesan']."', '".$_SESSION['type']."');
            </script>";
        }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto" style="margin-top:15%">
                <div class="card" style="border-radius:15px;border: 1px solid rgb(45 223 174 / 76%);">
                    <div class="card-body">
                        <form action="<?= base_url('login_admin') ?>" method="post">
                            <center><h4>Login</h4></center>
                            <hr>
                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" class="form-control" placeholder="Username" name="username" id="username" required autocomplete="off" >
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" class="form-control" placeholder="********" name="password" id="password" required autocomplete="off" >
                            </div>
                            <div align="right">
                                <button style="width:40%" type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>