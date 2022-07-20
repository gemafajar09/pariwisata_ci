<?php
class Peta extends CI_Model {
    public function rules()
	{
        return [
			[
				'field' => 'url', 
				'label' => 'Url', 
				'rules' => 'required'
			],
			[
				'field' => 'id_wisata', 
				'label' => 'Objek Wisata', 
				'rules' => 'required'
			],
		];
    }

    public function getAll(){
        return $this->db->query("SELECT * FROM tb_peta a JOIN tb_wisata b ON a.id_wisata=b.id_wisata")->result();
    }

        public function simpan($data)
    {
        return $this->db->insert('tb_peta',$data);
    }

    public function update($data,$id)
    {
        return $this->db->where(['id_peta' => $id])->update('tb_peta',$data);
    }

    public function delete($id){
        return $this->db->where('id_peta',$id)->delete('tb_peta');
    }
}