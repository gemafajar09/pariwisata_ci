<?php

class B_login extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view('backend/login/index');
    }

    public function login()
    {
        $this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');

        if($this->form_validation->run() != false){
            $username = $_POST['username'];
            $password = $_POST['password'];
			$user = $this->db->query("SELECT * FROM tb_user WHERE username = '$username'")->row_array();
            if(!isset($user))
            {
                $this->session->set_flashdata('pesan','Data tidak ditemukan');
			    redirect('b_login');
            }

            if($user['username'] == $username){
                if(password_verify($password,$user['password_hash'])){
                    $this->session->set_userdata($user['id_user']);
                    redirect('dashboard');
                }else{
                    $this->session->set_flashdata('pesan','Password Salah.');
			        redirect('b_login');
                }
            }else{
                $this->sssion->set_flashdata('pesan','Username Salah.');
			    redirect('b_login');
            }
		}else{
            $this->sssion->set_flashdata('pesan','Silahkan Periksa Kembali');
			redirect('b_login');
		}
    }

    public function logout()
    {
        $this->session->unset_userdata('id_user');
        $this->session->set_flashdata('pesan', 'Anda Telah Keluar.');
        redirect('b_login');
    }
}