<?php
class Template{
    protected $_ci;
    
    public function __construct(){
        $this->_ci = &get_instance();
    }
    
    public function b_template($content, $data = NULL){

        $data['link'] = $this->_ci->load->view('backend/template/link', $data, TRUE);
        $data['header'] = $this->_ci->load->view('backend/template/header', $data, TRUE);
        $data['sidebar'] = $this->_ci->load->view('backend/template/sidebar', $data, TRUE);
        $data['content'] = $this->_ci->load->view($content, $data, TRUE);
        $data['script'] = $this->_ci->load->view('backend/template/script', $data, TRUE);
        
        $this->_ci->load->view('backend/index', $data);
    }

    public function f_template($content, $data = NULL){

        $data['link'] = $this->_ci->load->view('frontend/template/link', $data, TRUE);
        $data['header'] = $this->_ci->load->view('frontend/template/header', $data, TRUE);
        $data['content'] = $this->_ci->load->view($content, $data, TRUE);
        $data['script'] = $this->_ci->load->view('frontend/template/script', $data, TRUE);
        
        $this->_ci->load->view('frontend/index', $data);
    }
}