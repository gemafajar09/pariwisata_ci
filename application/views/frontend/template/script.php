<script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/js/fontawesome.min.js"></script>
<script src="<?= base_url() ?>assets/owl/owl.carousel.min.js"></script>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    $(document).ready(function() {
        $('.carousel').carousel()
        $(".owl-carousel").owlCarousel({
        // loop:true,
        margin:10,
        nav:true,
        /* here you can set the settings for responsive items */
        responsive:{
            0:{
                items:2
            },
            768:{
                items:4
            }
        }
    });
    })

    function loginx()
    {
        $('#logins').modal('show');
    }

    function registerx()
    {
        $('#register-petugas').modal('show');
    }
    function registerw()
    {
        $('#register-wisatawan').modal('show');
    }
</script>