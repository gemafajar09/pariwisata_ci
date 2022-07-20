<?php
class B_banner extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Banner');
    }

    public function index() {
        $data['banner'] = $this->Banner->getAll();
        $this->template->b_template('backend/banner/index',$data);
    }

        public function simpan($id = null)
    {
        
            if(!isset($id)) {

                if(!isset($_FILES['banner']['name']))
                {
                    echo json_encode(['pesan' => 'Maaf Pastikan Foto Telah Diinputkan','type' => 'error']);
                }else{
                    if(!file_exists('assets/upload/banner')){
                        mkdir('assets/upload/banner');
                    }
                    $nameFoto = fileUpload($_FILES['banner'],'assets/upload/banner/');
                    $filename = 'assets/upload/banner/'.$nameFoto;
                    $data = array(
                        'banner' => $filename,
                    );
                    $simpan = $this->Banner->simpan($data);
                    echo json_encode(['pesan' => $simpan,'type' => 'success']);
                }

            }else{
                if(!isset($_FILES['banner']['name']))
                {
                    $data['banner'] = $_POST['banner_lama'];
                    $edit = $this->Banner->update($data,$id);
                }else{
                    $path = $_POST['banner_lama'];
                    if (file_exists($path)){
                        unlink($path);
                    }

                    $namebanner = fileUpload($_FILES['banner'],'assets/upload/banner/');
                    $filename = 'assets/upload/banner/'.$namebanner;
                    $data['banner'] = $filename;
                    $edit = $this->Banner->update($data,$id);
                }
                echo json_encode(['pesan' => $edit, 'type' => 'success']);
            }
        
    }

    // funcsi untuk hapus data
    public function delete($id)
    {
        $hapus = $this->Banner->delete($id);
        echo json_encode(['pesan' => $hapus]);
    }
}