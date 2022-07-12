<script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/js/fontawesome.min.js"></script>

<script>
    $(document).ready(function() {
        $('.carousel').carousel()
    })

    function loginx()
    {
        $('#logins').modal('show');
    }

    function registerx()
    {
        $('#register-petugas').modal('show');
    }
</script>