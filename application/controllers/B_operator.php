<?php

class B_operator extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->template->b_template('backend/operator/index');
    }

    public function simpan()
    {
        $this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('nik','Nik','required');
		$this->form_validation->set_rules('jabatan','Jabatan','required');
		$this->form_validation->set_rules('alamat','Alamat','required');
		$this->form_validation->set_rules('foto','Foto','required');
    }
}