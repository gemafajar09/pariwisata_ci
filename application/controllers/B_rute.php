<?php
class B_rute extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Jabatan');
    }
}