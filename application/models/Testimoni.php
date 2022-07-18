<?php
class Testimoni extends CI_Model {
    public function rules()
	{
        return [
			[
				'field' => 'nama', 
				'label' => 'Nama', 
				'rules' => 'required'
			],
			[
				'field' => 'email', 
				'label' => 'Email', 
				'rules' => 'required'
			],
			[
				'field' => 'komentar', 
				'label' => 'Komentar', 
				'rules' => 'required'
			],
		];
    }

    public function getAll(){
        return $this->db->query("SELECT * FROM tb_testimoni")->result();
    }

        public function simpan($data)
    {
        return $this->db->insert('tb_testimoni',$data);
    }

    public function update($id,$data)
    {
        return $this->db->where(['id_testimoni' => $id])->update('tb_testimoni',$data);
    }

    public function delete($id){
        return $this->db->where('id_testimoni',$id)->delete('tb_testimoni');
    }
}