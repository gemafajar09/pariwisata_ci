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

    public function find($id)
    {
        $petugas = $this->db->where('id_user', $id)->get('tb_petugas')->row_array();
        $status = $petugas['status'] == 0 ? 1 : 0;
        $this->db->query("UPDATE tb_user SET status = $status WHERE id_user = '$id'");
        return $this->db->query("UPDATE tb_petugas SET status = $status WHERE id_user = '$id'");
    }

    public function update($data, $id)
    {
        return $this->db->where(['id_petugas' => $id])->update('tb_petugas', $data);
    }

    public function delete($id)
    {
        $petugas = $this->db->get_Where('tb_petugas', ['id_user' => $id])->row_array();
        $petugas_id_user =  $this->db->get_Where('tb_petugas', ['id_user' => $id])->row();
        $id_user = $petugas_id_user->id_user;
        if (file_exists($petugas['foto'])) {
            unlink('assets/upload/petugas/' . $petugas['foto']);
        }
        if (file_exists($petugas['ijazah'])) {
            unlink('assets/upload/petugas/' . $petugas['ijazah']);
        }
        if (file_exists($petugas['kk'])) {
            unlink('assets/upload/petugas/' . $petugas['kk']);
        }
        $this->db->where('id_user', $id_user)->delete('tb_user');
        return $this->db->where('id_user', $petugas['id_user'])->delete('tb_petugas');
    }
}
