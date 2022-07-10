<?php
class Wisata extends CI_Model
{
    public function getData()
    {
        return $this->db->get('tb_wisata')->result();
    }

    public function simpan($data)
    {
        $this->db->insert('tb_wisata', $data);
        return $this->db->insert_id();
    }

    public function rules()
    {
        return [
            [
                'field' => 'nama_wisata',
                'label' => 'Nama_Wisata',
                'rules' => 'required'
            ],
            [
                'field' => 'alamat',
                'label' => 'Alamat',
                'rules' => 'required'
            ],
            [
                'field' => 'pusat_informasi',
                'label' => 'Pusat_Informasi',
                'rules' => 'required'
            ],
            [
                'field' => 'luas_mushola',
                'label' => 'Luas_Mushola',
                'rules' => 'required'
            ],
            [
                'field' => 'luas_tempat_parkir',
                'label' => 'Luas_Tempat_Parkir',
                'rules' => 'required'
            ],
            [
                'field' => 'jumlah_wc',
                'label' => 'Jumlah_WC',
                'rules' => 'required'
            ],
        ];
    }

    public function update($data,$id)
    {
        return $this->db->where(['id_wisata' => $id])->update('tb_wisata',$data);
    }
}
