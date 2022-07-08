<?php
class B_jabatan extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Jabatan');
    }

    public function index() {
        $data['jabatan'] = $this->Jabatan->getData();
        $this->template->b_template('backend/jabatan/index',$data);
    }

    public function simpan($id = null) {
        $jabatan = $_POST['jabatan'];
        if($id == null) {
            $simpan = $this->Jabatan->simpan($jabatan);
        }else{
            $simpan = $this->Jabatan->update($id,$jabatan);
        }
        echo json_encode(['pesan' => $simpan]);
    }

    public function delete($id) {
        $hapus = $this->Jabatan->delete($id);
        echo json_encode(['pesan' => $hapus]);
    }


}