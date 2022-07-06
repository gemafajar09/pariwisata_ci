<?php
class B_home extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->template->b_template('backend/page/home');
    }
}