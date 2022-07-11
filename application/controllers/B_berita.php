<?php

class B_berita extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Berita');
    }

    public function index()
    {
        $data['berita'] = $this->Berita->getData();
        $this->template->b_template('backend/berita/index', $data);
    }

    public  function tambahBerita()
    {
        $this->template->b_template('backend/berita/tambah-berita');
    }

    public function simpan($id = null)
    {
        date_default_timezone_set("Asia/Bangkok");
        $date = date('Y-m-d H:i:s');

        $rules = $this->Berita->rules();
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == FALSE) {

            echo json_encode(['errors' => $this->form_validation->error_array()]);
        } else {
            if (!isset($_POST['id'])) {
                $filename = fileUpload($_FILES['foto'], 'assets/upload/berita/');

                $data = array(
                    'judul' => $_POST['judul'],
                    'isi_berita' => $_POST['isi_berita'],
                    'penulis' => $_POST['penulis'],
                    'foto' => $filename,
                    'tgl_publish' => $date
                );

                $simpan = $this->Berita->simpan($data);
                echo json_encode(['pesan' => $simpan]);
            } else {

                if ($_POST['foto'] == 'undefined') {
                    $data = array(
                        'judul' => $_POST['judul'],
                        'isi_berita' => $_POST['isi_berita'],
                        'penulis' => $_POST['penulis'],
                        'tgl_publish' => $date
                    );
                } else {

                    $path = "assets/upload/berita/" . $_POST['foto_lama'];
                    if (file_exists($path)) {
                        unlink($path);
                    }

                    $filename = fileUpload($_FILES['foto'], 'assets/upload/berita/');
                    $data = array(
                        'judul' => $_POST['judul'],
                        'isi_berita' => $_POST['isi_berita'],
                        'foto' => $filename,
                        'penulis' => $_POST['penulis'],
                        'tgl_publish' => $date
                    );
                }
                $edit = $this->Berita->update($data, $_POST['id']);
                echo json_encode(['pesan' => $edit]);
            }
        }
    }

    public function delete($id)
    {
        $hapus = $this->Berita->delete($id);
        echo json_encode(['pesan' => $hapus]);
    }
}
