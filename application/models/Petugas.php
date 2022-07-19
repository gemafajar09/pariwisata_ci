<?php

class Petugas extends CI_Model
{

    public function rules()
    {
        return [
            [
                'field' => 'nama',
                'label' => 'Name',
                'rules' => 'required|max_length[50]'
            ],
            [
                'field' => 'nik',
                'label' => 'Nik',
                'rules' => 'required|max_length[16]'
            ],
            [
                'field' => 'jabatan',
                'label' => 'Jabatan',
                'rules' => 'required'
            ],
            [
                'field' => 'alamat',
                'label' => 'Alamat',
                'rules' => 'required'
            ],
            [
                'field' => 'tgl_lahir',
                'label' => 'Tanggal Lahir',
                'rules' => 'required'
            ],
            [
                'field' => 'jenis_kelamin',
                'label' => 'Jenis Kelamin',
                'rules' => 'required'
            ],
            [
                'field' => 'nohp',
                'label' => 'No HP',
                'rules' => 'required'
            ],
            [
                'field' => 'agama',
                'label' => 'Agama',
                'rules' => 'required'
            ],
            [
                'field' => 'pendidikan',
                'label' => 'Pendidikan',
                'rules' => 'required'
            ],
            [
                'field' => 'objek_wisata',
                'label' => 'Objek Wisata',
                'rules' => 'required'
            ],
        ];
    }

    public function getData()
    {
        return $this->db->query("SELECT * FROM tb_petugas")->result();
    }

    public function simpan($data)
    {
        return $this->db->insert('tb_petugas', $data);
    }

    // public function update($data, $id)
    // {
    //     return $this->db->where(['id_pengelola' => $id])->update('tb_pengelola', $data);
    // }

    public function delete($id)
    {
        $user = $this->db->get_Where('tb_petugas', ['id_petugas' => $id])->row_array();
        if (file_exists($user['foto'])) {
            unlink($user['foto']);
        }
        // $this->db->where('id_petugas', $user['id_petugas'])->delete('tb_petugas');
        return $this->db->where('id_petugas', $user['id_petugas'])->delete('tb_petugas');
    }
}
