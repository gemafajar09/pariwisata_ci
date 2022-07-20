<?php
class B_peta extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Peta');
        $this->load->model('Wisata');
    }

    public function index() {
        $data['peta'] = $this->Peta->getAll();
        $data['wisata'] = $this->Wisata->getwisata();
        $this->template->b_template('backend/peta/index',$data);
    }

    public function simpan($id = null) {
        $data = array(
            'url' => $_POST['url'],
            'id_wisata' => $_POST['id_objek'],
        );
        if($id == null) {
            $simpan = $this->Peta->simpan($data);
        }else{
            $simpan = $this->Peta->update($data, $id);
        }
        echo json_encode(['pesan' => $simpan]);
    }

    public function delete($id) {
        $hapus = $this->Peta->delete($id);
        echo json_encode(['pesan' => $hapus]);
    }
}