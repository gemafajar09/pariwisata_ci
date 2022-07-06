<?php
    if(isset($_SESSION['pesan']))
    {
        echo "<script>
            swal('".$_SESSION['type']."', '".$_SESSION['pesan']."', '".$_SESSION['type']."');
        </script>";
    }
?>