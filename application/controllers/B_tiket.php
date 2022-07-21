<?php
class B_tiket extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tiket');
    }

    public function index()
    {
        $wisata = $this
            ->db
            ->get('tb_wisata')
            ->result();

        $tiket = $this->Tiket->getData();
        $this->template->b_template('backend/tiket/index', ['wisata' => $wisata, 'tiket' => $tiket]);
    }

    public function tiket()
    {
        $data['wisata'] = $this
            ->db
            ->get('tb_wisata')
            ->result();

        $data['tiket'] = $this->db->query("SELECT * FROM tb_tiket a join tb_wisata b join tb_user c ON a.id_wisata = b.id_wisata AND a.id_user = c.id_user")->result();
        $this->template->b_template('backend/tiket/index', $data);
    }

    public function simpan($id = null)
    {
        $rules = $this->Tiket->rules();
        $this->form_validation->set_rules($rules);

        $date = date("Y-m-d");

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(['errors' => $this->form_validation->error_array()]);
        } else {
            // simpan data
            if (!isset($id)) {

                $data = array(
                    'id_user' => 3, // akun level pengelola wisata
                    'id_wisata' => $_POST['id_wisata'],
                    'harga_tiket' => $_POST['harga_tiket'],
                    'jumlah' => $_POST['jumlah_tiket'],
                    'total' => $_POST['total'],
                    'harga_parkir' => $_POST['harga_parkir'],
                    'keterangan' => $_POST['keterangan'],
                    'dibuat' => $date
                );

                $simpan = $this->Tiket->simpan($data);
                echo json_encode(['pesan' => $simpan]);

                // jika id user ada maka update data
            } else {
                $data = array(
                    'id_wisata' => $_POST['id_wisata'],
                    'harga_tiket' => $_POST['harga_tiket'],
                    'jumlah' => $_POST['jumlah_tiket'],
                    'total' => $_POST['total'],
                    'harga_parkir' => $_POST['harga_parkir'],
                    'keterangan' => $_POST['keterangan'],
                    'dibuat' => $date
                );
                $edit = $this->Tiket->update($data, $id);
                echo json_encode(['pesan' => $edit]);
            }
        }
    }

    public function delete($id)
    {
        $hapus = $this->Tiket->delete($id);
        echo json_encode(['pesan' => $hapus]);
    }
}
