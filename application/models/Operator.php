<?php
class Operator extends CI_Model {
    
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
				'field' => 'jabatan', 
				'label' => 'Jabatan', 
				'rules' => 'required'
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
        return $this->db->get('tb_operator')->result();
    }

    public function simpan($data)
    {
        return $this->db->insert('tb_operator',$data);
    }

    public function update($data,$id)
    {
        return $this->db->where(['id_operator' => $id])->update('tb_operator',$data);
    }

    public function delete($id){
        return $this->db->where(['id_operator' => $id])->delete('tb_operator');
    }
}