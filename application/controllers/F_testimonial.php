<?php
class F_testimonial extends CI_Controller {
    public function __construct() {
        parent::__construct();
        
        $this->load->model('Testimoni');
    }

    public function simpan($id = null) {
        $data = array(
            'nama' => $_POST['nama'],
            'email' => $_POST['email'],
            'komentar' => $_POST['komentar'],
            'tanggal' => date('Y-m-d'),
            'status' => 0
        );
        if($id == null) {
            $simpan = $this->Testimoni->simpan($data);
        }else{
            $simpan = $this->Testimoni->update($id,$data);
        }
        echo json_encode(['pesan' => $simpan]);
    }

    public function delete($id) {
        $hapus = $this->Testimoni->delete($id);
        echo json_encode(['pesan' => $hapus]);
    }
}