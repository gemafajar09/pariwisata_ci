<?php
class Tiket extends CI_Model {
    public function getData() {
        return $this->db->query("SELECT * FROM tb_tiket a join tb_wisata b ON a.id_wisata = b.id_wisata")->result();
    }

    public function simpan($data)
    {
        return $this->db->insert('tb_tiket',$data);
    }

    public function update($data,$id)
    {
        return $this->db->where(['id_tiket' => $id])->update('tb_tiket',$data);
    }

    public function delete($id){
        return $this->db->where(['id_tiket' => $id])->delete('tb_tiket');
    }

    public function rules() {
        return [
			[
				'field' => 'id_wisata', 
				'label' => 'Id Wisata', 
				'rules' => 'required'
			],
			[
				'field' => 'harga_tiket', 
				'label' => 'Harga Tiket', 
				'rules' => 'required'
			],
			[
				'field' => 'jumlah_tiket', 
				'label' => 'Jumlah Tiket', 
				'rules' => 'required'
            ],
            [
				'field' => 'total', 
				'label' => 'Total', 
				'rules' => 'required'
            ],
            [
				'field' => 'harga_parkir', 
				'label' => 'Harga Parkir', 
				'rules' => 'required'
            ],
            [
				'field' => 'keterangan', 
				'label' => 'Keterangan', 
				'rules' => 'required'
            ],
		];
    }
}
