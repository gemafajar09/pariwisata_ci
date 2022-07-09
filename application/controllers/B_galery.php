<?php
class B_galery extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Galery');
        $this->load->model('Kategori');
    }

    public function index() {
        $data['galery'] = $this->Galery->getAll();
        $data['kategori'] = $this->Kategori->getData();
        $this->template->b_template('backend/galery/index',$data);
    }

        public function simpan($id = null)
    {
        $rules = $this->Galery->rules();
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == FALSE) {
            echo json_encode(['errors' => $this->form_validation->error_array()]);
        }else{
            if(!isset($_POST['id'])) {

                if(!isset($_FILES['foto']['name']))
                {
                    echo json_encode(['pesan' => 'Maaf Pastikan Foto Telah Diinputkan','type' => 'error']);
                }else{
                    if(!file_exists('assets/upload/galery')){
                        mkdir('assets/upload/galery');
                    }
                    $nameFoto = fileUpload($_FILES['foto'],'assets/upload/galery/');
                    $filename = 'assets/upload/galery/'.$nameFoto;
                    $data = array(
                        'foto' => $filename,
                        'kategori' => $_POST['kategori'],
                        'deskripsi' => $_POST['deskripsi'],
                    );
                    $simpan = $this->Galery->simpan($data);
                    echo json_encode(['pesan' => $simpan,'type' => 'success']);
                }

            }else{
                if(!isset($_FILES['foto']['name']))
                {
                    $data = array(
                        'deskripsi' => $_POST['deskripsi'],
                    );
                }else{
                    $path = $_POST['foto_lama'];
                    if (file_exists($path)){
                        unlink($path);
                    }

                    $nameFoto = fileUpload($_FILES['foto'],'assets/upload/galery/');
                    $filename = 'assets/upload/galery/'.$nameFoto;
                    $data = array(
                        'foto' => $filename,
                        'kategori' => $_POST['kategori'],
                        'deskripsi' => $_POST['deskripsi'],
                    );
                }
                $edit = $this->Galery->update($data,$_POST['id']);
                echo json_encode(['pesan' => $edit, 'type' => 'success']);
            }
        }
    }

    // funcsi untuk hapus data
    public function delete($id)
    {
        $hapus = $this->Galery->delete($id);
        echo json_encode(['pesan' => $hapus]);
    }
}