<?php

class F_home extends CI_Controller {

    public function index() {
        $this->template->f_template('frontend/page/home');
    }
}