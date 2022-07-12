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
        $data['wisata'] = $this->Wisata->getData();
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
                $foto_p3k = fileUpload($_FILES['p3k'], 'assets/upload/wisata/');
                $foto_mushola = fileUpload($_FILES['mushola'], 'assets/upload/wisata/');
                $foto_parkir = fileUpload($_FILES['tempat_parkir'], 'assets/upload/wisata/');
                $foto_wc = fileUpload($_FILES['wc'], 'assets/upload/wisata/');

                $data = array(
                    'id_user' => $id_user,
                    'nama_wisata' => $_POST['nama_wisata'],
                    'alamat' => $_POST['alamat'],
                    'pusat_informasi' => $_POST['pusat_informasi'],
                    'p3k' =>  $foto_p3k,
                    'mushola' =>  $foto_mushola,
                    'luas_mushola' => $_POST['luas_mushola'],
                    'tempat_parkir' =>  $foto_parkir,
                    'luas_tempat_parkir' => $_POST['luas_tempat_parkir'],
                    'wc' =>  $foto_wc,
                    'jumlah_wc' => $_POST['jumlah_wc'],
                );

                $simpan = $this->Wisata->simpan($data);
                echo json_encode(['pesan' => $simpan]);
            } else {
                if (!isset($_FILES['p3k']['name']) || !isset($_FILES['mushola']['name']) || !isset($_FILES['tempat_parkir']['name']) || !isset($_FILES['wc']['name']) ){
                    $data = array(
                        'id_user' => $id_user,
                        'nama_wisata' => $_POST['nama_wisata'],
                        'alamat' => $_POST['alamat'],
                        'pusat_informasi' => $_POST['pusat_informasi'],
                        'luas_mushola' => $_POST['luas_mushola'],
                        'luas_tempat_parkir' => $_POST['luas_tempat_parkir'],
                        'jumlah_wc' => $_POST['jumlah_wc'],
                    );
                } else {
                    $path_parkir = "assets/upload/wisata/" . $_POST['path_parkir'];
                    $path_wc = "assets/upload/wisata/" . $_POST['path_wc'];
                    $path_mushola = "assets/upload/wisata/" . $_POST['path_mushola'];
                    $path_p3k = "assets/upload/wisata/" . $_POST['path_p3k'];

                    if (file_exists($path_parkir, $path_wc, $path_mushola, $path_p3k)) {
                        unlink($path_parkir);
                        unlink($path_wc);
                        unlink($path_mushola);
                        unlink($path_p3k);
                    }

                    $filename_p3k = fileUpload($_FILES['p3k'], 'assets/upload/wisata/');
                    $filename_mushola = fileUpload($_FILES['mushola'], 'assets/upload/wisata/');
                    $filename_parkir = fileUpload($_FILES['tempat_parkir'], 'assets/upload/wisata/');
                    $filename_wc = fileUpload($_FILES['wc'], 'assets/upload/wisata/');

                    $data = array(
                        'id_user' => $id_user,
                        'nama_wisata' => $_POST['nama_wisata'],
                        'alamat' => $_POST['alamat'],
                        'pusat_informasi' => $_POST['pusat_informasi'],
                        'p3k' =>  $filename_p3k,
                        'mushola' =>  $filename_mushola,
                        'luas_mushola' => $_POST['luas_mushola'],
                        'tempat_parkir' =>  $filename_parkir,
                        'luas_tempat_parkir' => $_POST['luas_tempat_parkir'],
                        'wc' =>  $filename_wc,
                        'jumlah_wc' => $_POST['jumlah_wc'],
                    );
                }
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
