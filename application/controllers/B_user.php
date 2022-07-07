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

    public function unlock($id) {
        $user = $this->User->find($id);
        echo json_encode(['pesan' => $user]);
    }

    public function update($id){
        $pass = password_hash($_POST['password'],PASSWORD_DEFAULT);
        $user = $this->User->updatePassword($id,$pass);
        echo json_encode(['pesan' => $user]);
    }

    public function delete($id){
        $hapus = $this->User->delete($id);
        echo json_encode(['pesan' => $hapus]);
    }
}