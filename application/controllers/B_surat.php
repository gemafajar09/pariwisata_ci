<?php
class B_surat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Wisata');
        $this->load->model('Surat');
    }

    public function index()
    {
        // $data['surat'] = $this->Surat->getAll();
        $data['wisata'] = $this->Wisata->getData();
        $data['surat'] = $this->db->query('SELECT * FROM tb_surat a JOIN tb_wisata b on a.id_wisata = b.id_wisata')->result();
        $this->template->b_template('backend/surat/index', $data);
    }

    public function simpan($id = null)
    {
        $user_sesion = $this->session->userdata('id_user');

        $surat = fileUpload($_FILES['surat'], 'assets/upload/surat/');
        $date = date("Y-m-d");

        $data = array(
            'surat' => $surat,
            'id_user' => $user_sesion,
            'id_wisata' => $_POST['objek_wisata'],
            'tanggal' => $date
        );
        if($id == null) {
            $simpan = $this->Surat->simpan($data);
        }else{
            $simpan = $this->Surat->update($data, $id);
        }
        echo json_encode(['pesan' => $simpan]);
    }

    public function download($id) {
        $download = $this->Surat->download($id);
        echo json_encode(['pesan' => $download]);
    }
    
    public function delete($id) {
        $hapus = $this->Surat->delete($id);
        echo json_encode(['pesan' => $hapus]);
    }

}
