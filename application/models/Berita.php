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
                'label' => 'penulis',
                'rules' => 'required'
            ],
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
        return $this->db->where(['id_berita' => $id])->update('tb_berita', $data);
    }

    public function delete($id)
    {
        return $this->db->where(['id_berita' => $id])->delete('tb_berita');
    }
}
