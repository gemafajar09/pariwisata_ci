<?php
class Jabatan extends CI_Model {
    public function getData(){
        return $this->db->get('tb_jabatan')->result();
    }

    public function simpan($jabatan){
        return $this->db->insert('tb_jabatan',array('jabatan'=>$jabatan));
    }

    public function update($id,$jabatan){
        return $this->db->where(['id_jabatan' => $id])->update('tb_jabatan',array('jabatan'=>$jabatan));
    }

    public function delete($id){
        return $this->db->where(['id_jabatan' => $id])->delete('tb_jabatan');
    }
}