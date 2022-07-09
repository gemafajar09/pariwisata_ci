<?php
class Pengelola extends CI_Model {
    
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
				'field' => 'alamat', 
				'label' => 'Alamat', 
				'rules' => 'required'
            ]
		];
    }

    public function getData()
    {
        return $this->db->query("SELECT * FROM tb_pengelola")->result();
    }

    public function simpan($data)
    {
        return $this->db->insert('tb_pengelola',$data);
    }

    public function update($data,$id)
    {
        return $this->db->where(['id_pengelola' => $id])->update('tb_pengelola',$data);
    }

    public function delete($id){
        $user = $this->db->get_Where('tb_pengelola',['id_pengelola' => $id])->row_array();
        if (file_exists($user['foto'])){
            unlink($user['foto']);
        }
        $this->db->where('id_user',$user['id_user'])->delete('tb_pengelola');
        return $this->db->where('id_user',$user['id_user'])->delete('tb_user');
    }
}