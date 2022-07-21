<?php

class B_login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('backend/login/index');
    }

    public function login()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() != false) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = $this->db->query("SELECT * FROM tb_user WHERE username = '$username'")->row_array();
            if (!isset($user)) {
                $this->session->set_flashdata(['pesan', 'Data tidak ditemukan', 'type' => 'error']);
                redirect('home');
            }

            if ($user['username'] == $username) {
                if (password_verify($password, $user['password_hash'])) {
                    $level = $user['level'];
                    $id_user = $user['id_user'];
                    if ($level == 1) {
                        if ($user['status'] == 1) {
                            $data = array(
                                'id_user' => $user['id_user'],
                                'level' => $user['level'],
                                'nama' => 'ADMINISTRATOR',
                                'foto' => 'assets/src/images/user.png'
                            );
                        } else {
                            $this->session->set_flashdata(['pesan' => 'Silahkan Tunggu Sampai diverifikasi Administrator', 'type' => 'error']);
                        }
                    } elseif ($level == 2) {
                        $users = $this->db->query("SELECT * FROM tb_operator WHERE id_user = '$id_user'")->row_array();
                        if ($user['status'] == 1) {
                            $data = array(
                                'id_user' => $user['id_user'],
                                'level' => $user['level'],
                                'nama' => $users['nama'],
                                'foto' => $users['foto']
                            );
                        } else {
                            $this->session->set_flashdata(['pesan' => 'Silahkan Tunggu Sampai diverifikasi Administrator', 'type' => 'error']);
                        }
                    } elseif ($level == 3) {
                        $users = $this->db->query("SELECT * FROM tb_pengelola WHERE id_user = '$id_user'")->row_array();
                        if ($user['status'] == 1) {
                            $data = array(
                                'id_user' => $user['id_user'],
                                'level' => $user['level'],
                                'nama' => $users['nama'],
                                'foto' => $users['foto']
                            );
                        } else {
                            $this->session->set_flashdata(['pesan' => 'Silahkan Tunggu Sampai diverifikasi Administrator', 'type' => 'error']);
                        }
                    } elseif ($level == 4) {
                        $users = $this->db->query("SELECT * FROM tb_petugas WHERE id_user = '$id_user'")->row_array();
                        $data = array(
                            'id_user' => $user['id_user'],
                            'level' => $user['level'],
                            'nama' => $users['nama'],
                            'foto' => $users['foto'],
                            'status' => $users['status'],
                        );
                    } elseif ($level == 5) {
                        $users = $this->db->query("SELECT * FROM tb_wisatawan WHERE id_user = '$id_user'")->row_array();
                        $data = array(
                            'id_user' => $user['id_user'],
                            'level' => $user['level'],
                            'nama' => $users['nama']
                        );
                        $this->session->set_userdata($data);
                        redirect('/');
                    }
                    $this->session->set_userdata($data);
                    redirect('dashboard');
                } else {
                    $this->session->set_flashdata(['pesan' => 'Password Salah.', 'type' => 'error']);
                    redirect('home');
                }
            } else {
                $this->session->set_flashdata(['pesan' => 'Username Salah.', 'type' => 'error']);
                redirect('home');
            }
        } else {
            $this->session->set_flashdata(['pesan' => 'Silahkan Periksa Kembali', 'type' => 'error']);
            redirect('home');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('id_user');
        session_destroy();
        $this->session->set_flashdata(['pesan' => 'Anda Telah Keluar.', 'type' => 'success']);
        redirect('home');
    }

    public function logoutx()
    {
        session_destroy();
        echo json_encode(['pesan' => 'Anda Telah Keluar.', 'type' => 'success']);
    }

    public function profile($id, $level)
    {
        if ($level == 2) {
            $data['profile'] = $this->db->query("SELECT * FROM tb_operator a join tb_user b on a.id_user = b.id_user where a.id_user = $id")->row_array();
        } elseif ($level == 3) {
            $data['profile'] = $this->db->query("SELECT * FROM tb_pengelola a join tb_user b on a.id_user = b.id_user where a.id_user = $id")->row_array();
        } elseif ($level == 4) {
            $data['profile'] = $this->db->query("SELECT * FROM tb_petugas a join tb_user b on a.id_user = b.id_user where a.id_user = $id")->row_array();
        }
        $this->template->b_template('backend/login/profile', $data);
    }

    public function profile_update($id, $level)
    {
        // var_dump($id); die();

        $data = array(
            'nama' => $_POST['namax'],
            'alamat' => $_POST['alamatx'],
        );

        if ($level == 2) {
            $simpan = $this->db->update('tb_operator', $data, ['id_user' => $id]);
        } elseif ($level == 3) {
            $simpan = $this->db->update('tb_pengelola', $data, ['id_user' => $id]);
        } elseif ($level == 4) {
            $simpan = $this->db->update('tb_petugas', $data, ['id_user' => $id]);
        }

        echo json_encode(['pesan' => $simpan]);
    }

    public function passwordUpdate($id, $level)
    {
        $data = array(
            'password_hash' => password_hash($_POST['passwordx'], PASSWORD_DEFAULT),
        );
        $simpan = $this->db->where(['id_user', $id])->update('tb_user', $data);
        echo json_encode(['pesan' => $simpan]);
    }
}
