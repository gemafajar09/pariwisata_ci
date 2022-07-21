<?php

class F_register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Petugas');
        $this->load->model('Wisatawan');
        $this->load->model('User');
    }

    public function simpanPetugas()
    {
        // rules adalah tahapan untuk pengecekan data sebelum masuk kedalam database
        $rules = $this->Petugas->rules();
        // aksi untuk menjalanakan validasi untuk menjalankan rule yang telah dibuat pada model
        $this->form_validation->set_rules($rules);
        // penegecekan form validasi berguna untuk melihat apakah data yang dikirim dari halaman inputan sudah benar atau salah
        if ($this->form_validation->run() == FALSE) {
            echo json_encode(['errors' => $this->form_validation->error_array()]);
        } else {
            $username = str_replace(' ', '', $_POST['nama']);
            $password = password_hash(12345, PASSWORD_DEFAULT);
            $status = 0;
            $level = 4;

            $data_user = array(
                'username' => $username,
                'password_hash' => $password,
                'status' => $status,
                'level' => $level,
            );

            // data user logiknya masih error
            $id_user = $this->User->simpan($data_user);


            // fungsi fileupload adalah fungsi untuk menyimpan gambar pada folder petugas
            if ($_POST['foto'] = 'undefined') {
                $data['foto'] = 'default.png';
            } else {
                $data['foto'] = fileUpload($_FILES['foto'], 'assets/upload/petugas/');
            }
            if ($_POST['kk'] = 'undefined') {
                $data['kk'] = 'default.png';
            } else {
                $data['kk'] = fileUpload($_FILES['kk'], 'assets/upload/petugas/');
            }
            if ($_POST['ijazah'] = 'undefined') {
                $data['ijazah'] = 'default.png';
            } else {
                $data['ijazah'] = fileUpload($_FILES['ijazah'], 'assets/upload/petugas/');
            }
            $data['nama'] = $_POST['nama'];
            $data['nik'] = $_POST['nik'];
            $data['jabatan'] = $_POST['jabatan'];
            $data['alamat'] = $_POST['alamat'];
            $data['tgl_lahir'] = $_POST['tgl_lahir'];
            $data['jenis_kelamin'] = $_POST['jenis_kelamin'];
            $data['no_hp'] = $_POST['nohp'];
            $data['agama'] = $_POST['agama'];
            $data['pendidikan'] = $_POST['pendidikan'];
            $data['id_user'] = $id_user;
            $data['id_wisata'] = $_POST['objek_wisata'];


            $simpan_petugas = $this->Petugas->simpan($data);


            echo json_encode(['pesan' => $simpan_petugas, 'user' => $id_user]);
        }
    }

    public function simpanWisatawan($id = null)
    {
        $user = array(
            'username' =>  $_POST['username_add'],
            'password_hash' => password_hash($_POST['password_add'], PASSWORD_DEFAULT),
            'status' => 1,
            'level' => 5,
        );

        $id_user = $this->User->simpan($user);

        $wisatawan = array(
            'nama' =>  $_POST['nama_add'],
            'email' =>  $_POST['email_add'],
            'alamat' =>  $_POST['alamat_add'],
            'nohp' => $_POST['nohp_add'],
            'id_user' => $id_user,
        );

        $simpan = $this->Wisatawan->simpan($wisatawan);

        echo json_encode(['pesan' => $simpan]);
    }
}
