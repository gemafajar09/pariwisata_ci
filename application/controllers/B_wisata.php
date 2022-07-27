<?php 

class B_wisata extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Wisata');
    }

    public function index()
    {
        $data['wisata'] = $this->Wisata->getwisata();
        $this->template->b_template('backend/wisata/index', $data);
    }

    public function simpan($id = null)
    {
        // ambil data session user
        $id_user = $this->session->userdata('id_user');

        $rules = $this->Wisata->rules();
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(['errors' => $this->form_validation->error_array()]);
        } else {
            if (!isset($id)) {
                $foto_p3k = isset($_FILES['p3k']) ? fileUpload($_FILES['p3k'], 'assets/upload/wisata/') : 'default.png';
                $foto_wisata = isset($_FILES['foto_wisata']) ? fileUpload($_FILES['foto_wisata'], 'assets/upload/wisata/') : 'default.png';

                $data = array(
                    'id_user' => $id_user,
                    'nama_wisata' => $_POST['nama_wisata'],
                    'foto_wisata' => $foto_wisata,
                    'alamat' => $_POST['alamat'],
                    'pusat_informasi' => $_POST['pusat_informasi'],
                    'p3k' =>  $foto_p3k,
                    'paket_wisata' => $_POST['paket_wisata'],
                );

                $simpan = $this->Wisata->simpan($data);
                echo json_encode(['pesan' => $simpan]);
            } else {
                $data['id_user'] = $id_user;
                $data['nama_wisata'] =  $_POST['nama_wisata'];
                if(isset($_FILES['foto_wisata']))
                {
                    $data['foto_wisata'] = fileUpload($_FILES['foto_wisata'], 'assets/upload/wisata/');
                }
                $data['alamat'] =  $_POST['alamat'];
                $data['pusat_informasi'] =  $_POST['pusat_informasi'];
                if(isset($_FILES['p3k']))
                {
                    $data['p3k'] = fileUpload($_FILES['p3k'], 'assets/upload/wisata/');
                }
                $data['paket_wisata'] = $_POST['paket_wisata'];


                $edit = $this->Wisata->update($data, $id);
                echo json_encode(['pesan' => $edit]);
            }
        }
    }

    public function delete($id)
    {
        $hapus = $this->Wisata->delete($id);
        echo json_encode(['pesan' => $hapus]);
    }
}
