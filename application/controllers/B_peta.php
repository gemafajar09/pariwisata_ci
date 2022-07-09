<?php
class B_peta extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Peta');
    }

    public function index() {
        $data['peta'] = $this->Peta->getAll();
        $this->template->b_template('backend/peta/index',$data);
    }

    public function simpan($id = null) {
        $data = array(
            'lat' => $_POST['lat'],
            'lng' => $_POST['lng'],
            'id_wisata' => $_POST['id_objek'],
        );
        if($id == null) {
            $simpan = $this->Peta->simpan($data);
        }else{
            $simpan = $this->Peta->update($id,$data);
        }
        echo json_encode(['pesan' => $simpan]);
    }

    public function delete($id) {
        $hapus = $this->Peta->delete($id);
        echo json_encode(['pesan' => $hapus]);
    }
}