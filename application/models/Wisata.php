<?php
class Wisata extends CI_Model
{   
    public function getwisata()
    {
        return $this->db->query("SELECT * FROM tb_wisata")->result();
    }

    public function getData()
    {
        return $this->db->query("SELECT * FROM tb_wisata a JOIN tb_pengelola b ON a.id_user = b.id_user")->result();
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

    public function delete($id){
        $wisata = $this->db->get_Where('tb_wisata',['id_wisata' => $id])->row_array();
        if (file_exists($wisata['p3k'])){
            unlink($wisata['p3k']);
        }
        if (file_exists($wisata['mushola'])){
            unlink($wisata['mushola']);
        }
        if (file_exists($wisata['tempat_parkir'])){
            unlink($wisata['tempat_parkir']);
        }
        if (file_exists($wisata['wc'])){
            unlink($wisata['wc']);
        }
         return $this->db->where('id_wisata',$wisata['id_wisata'])->delete('tb_wisata');
    }
}
