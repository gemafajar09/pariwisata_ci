<?php
class Banner extends CI_Model {

    public function getAll(){
        return $this->db->query("SELECT * FROM tb_banner")->result();
    }

        public function simpan($data)
    {
        return $this->db->insert('tb_banner',$data);
    }

    public function update($data,$id)
    {
        return $this->db->where(['id_banner' => $id])->update('tb_banner',$data);
    }

    public function delete($id){
        $banner = $this->db->get_Where('tb_banner',['id_banner' => $id])->row_array();
        if (file_exists($banner['foto'])){
            unlink($banner['foto']);
        }
        return $this->db->where('id_banner',$id)->delete('tb_banner');
    }
}