<?php

class B_pengelola extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // panggil model pada folder models dimana data pada model berfunsi untuk melakukan CRUD
        $this->load->model('Pengelola');
        $this->load->model('User');
    }

    public function index() {
        // ambil data dari database melali model
        $data['pengelola'] = $this->Pengelola->getData();
        // $this->template adalah class tang terdapat pada libraries
        // sedangkan b_template adalah funcgsi untuk mengirim halaman content
        $this->template->b_template('backend/pengelola/index',$data);
    }

    public function simpan($id = null)
    {
        // rules adalah tahapan untuk pengecekan data sebelum masuk kedalam database
        $rules = $this->Pengelola->rules();
        // aksi untuk menjalanakan validasi untuk menjalankan rule yang telah dibuat pada model
        $this->form_validation->set_rules($rules);
        // penegecekan form validasi berguna untuk melihat apakah data yang dikirim dari halaman inputan sudah benar atau salah
        if ($this->form_validation->run() == FALSE) {
            echo json_encode(['errors' => $this->form_validation->error_array()]);
        }else{
            // cek jika id user kosong maka simpandata
            if(!isset($_POST['id'])) {
                // lakukan insert data keladalam tabel user
                $username = str_replace(' ', '',$_POST['nama']);
                $password = password_hash(12345,PASSWORD_DEFAULT);
                $level = 3;

                $dataUser = array(
                    'username' => $username,
                    'password_hash' => $password,
                    'level' => $level,
                );
                // kirim data kedalam model user
                $id_user = $this->User->simpan($dataUser);

                if(!isset($_FILES['foto']['name']))
                {
                    $filename = 'assets/src/images/user.png';
                }else{
                    if(!file_exists('assets/upload/pengelola')){
                        mkdir('assets/upload/pengelola');
                    }
                    // fungsi fileupload adalah fungsi untuk menyimpan gambar pada folder helper
                    $nameFoto = fileUpload($_FILES['foto'],'assets/upload/pengelola/');
                    $filename = 'assets/upload/pengelola/'.$nameFoto;
                }
                // tahapan dibawah berfungsi untuk menyimpan data kedalam bentuk array sebelum di kirim ke model
                $data = array(
                    'id_user' => $id_user,
                    'nama' => $_POST['nama'],
                    'alamat' => $_POST['alamat'],
                    'nik' => $_POST['nik'],
                    'foto' => $filename
                );
                // eksekusi data yang telah di inisialisasi kedalam array dan di oper kedalam model
                $simpan = $this->Pengelola->simpan($data);
                // perintah dibawah untuk mengirim pesan kepada server apakah data berhasil atau gagal dengan nila output boolean
                echo json_encode(['pesan' => $simpan]);

            // jika id user ada maka update data
            }else{
                // cek jika foto ada atau tidak ada
                if(!isset($_FILES['foto']['name']))
                {
                    $data = array(
                        'nama' => $_POST['nama'],
                        'alamat' => $_POST['alamat'],
                        'nik' => $_POST['nik']
                    );
                // jika foto ada maka simpan foto baru
                }else{
                    // ambil nama file lama
                    $path = $_POST['foto_lama'];
                    // cek file lama di dalam folder yang di deklarasikan
                    if (file_exists($path)){
                        // jika foto ada maka hapus file pada folder
                        unlink($path);
                    }

                    // simpan file baru ke folder yang ditentukan
                    $nameFoto = fileUpload($_FILES['foto'],'assets/upload/pengelola/');
                    $filename = 'assets/upload/pengelola/'.$nameFoto;
                    $data = array(
                        'nama' => $_POST['nama'],
                        'alamat' => $_POST['alamat'],
                        'nik' => $_POST['nik'],
                        'foto' => $filename
                    );
                }
                $edit = $this->Pengelola->update($data,$_POST['id']);
                echo json_encode(['pesan' => $edit]);
            }
        }
    }

    // funcsi untuk hapus data
    public function delete($id)
    {
        $hapus = $this->Pengelola->delete($id);
        echo json_encode(['pesan' => $hapus]);
    }
}