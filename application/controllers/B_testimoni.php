<?php
class B_testimoni extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Testimoni');
    }

    public function index() {
        $data['testimoni'] = $this->Testimoni->getAll();
        $this->template->b_template('backend/testimoni/index',$data);
    }

    public function update($id){
        if($_POST['status'] == 0){
            $nilai = 1;
        }else{
            $nilai = 0;
        }
        $data = array(
            'status' => $nilai,
        );
            
        $simpan = $this->Testimoni->update($id,$data);
        
        echo json_encode(['pesan' => $simpan]);
    }

    public function delete($id) {
        $hapus = $this->Testimoni->delete($id);
        echo json_encode(['pesan' => $hapus]);
    }
}