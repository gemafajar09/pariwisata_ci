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
        $rules = $this->Wisata->rules();
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(['errors' => $this->form_validation->error_array()]);
        } else {
            if (!isset($_POST['id'])) {
                $foto_p3k = fileUpload($_FILES['p3k'], 'assets/upload/wisata/');
                $foto_mushola = fileUpload($_FILES['mushola'], 'assets/upload/wisata/');
                $foto_parkir = fileUpload($_FILES['tempat_parkir'], 'assets/upload/wisata/');
                $foto_wc = fileUpload($_FILES['wc'], 'assets/upload/wisata/');

                $data = array(
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
                $path_parkir = $_POST['path_parkir'];
                $path_wc = $_POST['path_wc'];
                $path_mushola = $_POST['path_mushola'];
                $path_p3k = $_POST['path_p3k'];

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
                $edit = $this->Wisata->update($data, $_POST['id']);
                echo json_encode(['pesan' => $edit]);
            }
        }
    }
}
