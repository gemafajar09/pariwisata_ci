<?php
class User extends CI_Model{
    public function simpan($data){
        $this->db->insert('tb_user', $data);
        return $this->db->insert_id();
    }

    public function getall(){
        return $this->db->get('tb_user')->result();
    }
}