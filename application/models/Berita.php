<?php
class Berita extends CI_Model
{

    public function rules()
    {
        return [
            [
                'field' => 'judul',
                'label' => 'Judul',
                'rules' => 'required'
            ],
            [
                'field' => 'isi_berita',
                'label' => 'isi_berita',
                'rules' => 'required'
            ],
            [
                'field' => 'penulis',
                'label' => 'Penulis',
                'rules' => 'required'
            ],
            [
                'field' => 'tgl_publish',
                'label' => 'Tgl_Publish',
                'rules' => 'required'
            ]
        ];
    }

    public function getData()
    {
        return $this->db->get('tb_berita')->result();
    }

    public function simpan($data)
    {
        return $this->db->insert('tb_berita', $data);
    }

    public function update($data, $id)
    {
        return $this->db->where(['id_operator' => $id])->update('tb_operator', $data);
    }

    public function delete($id)
    {
        return $this->db->where(['id_operator' => $id])->delete('tb_operator');
    }
}
