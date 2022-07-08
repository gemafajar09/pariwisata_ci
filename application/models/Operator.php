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
        return $this->db->query("SELECT * FROM tb_operator a JOIN tb_jabatan b ON a.jabatan = b.id_jabatan")->result();
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
        $user = $this->db->get_Where('tb_operator',['id_operator' => $id])->row_array();
        if (file_exists($user['foto'])){
            unlink($user['foto']);
        }
        $this->db->where('id_user',$user['id_user'])->delete('tb_operator');
        return $this->db->where('id_user',$user['id_user'])->delete('tb_user');
    }
}