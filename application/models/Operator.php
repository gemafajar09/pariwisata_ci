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
            ],
			[
				'field' => 'foto', 
				'label' => 'Foto', 
				'rules' => 'required'
            ],
		];
    }
}