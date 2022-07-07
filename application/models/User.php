<?php
class User extends CI_Model{
    public function simpan($data){
        $this->db->insert('tb_user', $data);
        return $this->db->insert_id();
    }

    public function getall(){
        return $this->db->get('tb_user')->result();
    }

    public function find($id){
        $user = $this->db->where('id_user', $id)->get('tb_user')->row_array();
        $status = $user['status'] == 0 ? 1 : 0;
        return $this->db->query("UPDATE tb_user SET status = $status WHERE id_user = '$id'");
    }
    
    public function updatePassword($id,$pass){
        return $this->db->query("UPDATE tb_user SET password_hash = '$pass' WHERE id_user = '$id'");
    }

    public function delete($id){
        $user = $this->db->get_Where('tb_operator',['id_user' => $id])->row_array();
        if (file_exists($user['foto'])){
            unlink($user['foto']);
        }
        $this->db->where('id_user',$id)->delete('tb_operator');
        return $this->db->where('id_user',$id)->delete('tb_user');
    }
}