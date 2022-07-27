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
                'field' => 'paket_wisata',
                'label' => 'Paket Wisata',
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
        if (file_exists($wisata['foto_wisata'])){
            unlink($wisata['foto_wisata']);
        }
         return $this->db->where('id_wisata',$wisata['id_wisata'])->delete('tb_wisata');
    }
}
