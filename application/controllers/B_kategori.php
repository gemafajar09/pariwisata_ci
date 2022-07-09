<?php
class B_kategori extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Kategori');
    }

    public function index() {
        $data['kategori'] = $this->Kategori->getData();
        $this->template->b_template('backend/kategori/index',$data);
    }

    public function simpan($id = null) {
        $kategori = $_POST['kategori'];
        if($id == null) {
            $simpan = $this->Kategori->simpan($kategori);
        }else{
            $simpan = $this->Kategori->update($id,$kategori);
        }
        echo json_encode(['pesan' => $simpan]);
    }

    public function delete($id) {
        $hapus = $this->Kategori->delete($id);
        echo json_encode(['pesan' => $hapus]);
    }


}