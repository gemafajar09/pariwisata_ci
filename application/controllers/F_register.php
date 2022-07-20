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
            $name_foto = fileUpload($_FILES['foto'], 'assets/upload/petugas/');

            // fungsi fileupload adalah fungsi untuk menyimpan gambar pada folder petugas
            $name_kk = fileUpload($_FILES['kk'], 'assets/upload/petugas/');

            // fungsi fileupload adalah fungsi untuk menyimpan gambar pada folder petugas
            $name_ijazah = fileUpload($_FILES['ijazah'], 'assets/upload/petugas/');

            $data_petugas = array(
                'nama' => $_POST['nama'],
                'nik' => $_POST['nik'],
                'jabatan' => $_POST['jabatan'],
                'foto' => $name_foto,
                'alamat' => $_POST['alamat'],
                'tgl_lahir' => $_POST['tgl_lahir'],
                'ijazah' => $name_ijazah,
                'jenis_kelamin' => $_POST['jenis_kelamin'],
                'no_hp' => $_POST['nohp'],
                'kk' => $name_kk,
                'agama' => $_POST['agama'],
                'pendidikan' => $_POST['pendidikan'],
                'id_user' => $id_user,
                'id_wisata' => $_POST['objek_wisata'],
            );

            $simpan_petugas = $this->Petugas->simpan($data_petugas);


            echo json_encode(['pesan' => $simpan_petugas, 'user' => $id_user]);
        }
    }

    public function simpanWisatawan($id = null)
    {
        $user = array(
            'username' =>  $_POST['username_add'],
            'password_hash' => password_hash($_POST['password_add'], PASSWORD_DEFAULT),
            'status' => 0,
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

        $simpan = $this->User->simpan($user);
        $simpan = $this->Wisatawan->simpan($wisatawan);

        echo json_encode(['pesan' => $simpan]);
    }
}
