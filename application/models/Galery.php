<?php
class Galery extends CI_Model {
    public function rules()
	{
        return [
			[
				'field' => 'deskripsi', 
				'label' => 'Deskripsi', 
				'rules' => 'required'
			],
		];
    }

    public function getAll(){
        return $this->db->query("SELECT * FROM tb_galery")->result();
    }

        public function simpan($data)
    {
        return $this->db->insert('tb_galery',$data);
    }

    public function update($data,$id)
    {
        return $this->db->where(['id_galery' => $id])->update('tb_galery',$data);
    }

    public function delete($id){
        $galery = $this->db->get_Where('tb_galery',['id_galery' => $id])->row_array();
        if (file_exists($galery['foto'])){
            unlink($galery['foto']);
        }
        return $this->db->where('id_galery',$id)->delete('tb_galery');
    }
}