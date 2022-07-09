<?php
class Kategori extends CI_Model {
    public function getData(){
        return $this->db->get('tb_kategori')->result();
    }

    public function simpan($kategori){
        return $this->db->insert('tb_kategori',array('kategori'=>$kategori));
    }

    public function update($id,$kategori){
        return $this->db->where(['id_kategori' => $id])->update('tb_kategori',array('kategori'=>$kategori));
    }

    public function delete($id){
        return $this->db->where(['id_kategori' => $id])->delete('tb_kategori');
    }
}