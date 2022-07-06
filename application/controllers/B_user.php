<?php

class B_user extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('User');
    }

    public function index() {
        $data['user'] = $this->User->getall();
        $this->template->b_template('backend/user/index',$data);
    }
}