<?php
class B_testimoni extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Jabatan');
    }
}