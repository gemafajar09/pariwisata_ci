<?php
class Surat extends CI_Model
{
    public function getAll()
    {
        return $this->db->query("SELECT * FROM tb_surat")->result();
    }

    public function simpan($data)
    {
        return $this->db->insert('tb_surat', $data);
    }

    public function update($id, $data)
    {
        return $this->db->where(['id_surat' => $id])->update('tb_surat', $data);
    }

    public function download($id)
    {
        $surat = $this->db->get_Where('tb_surat', ['id_surat' => $id])->row_array();

        $this->load->helper('download');
        $path = file_get_contents(base_url() . "assets/upload/surat/" . $surat['surat']); // get file name
        $name = $surat['surat']; // new name for your file
        force_download($name, $path);
    }

    public function delete($id)
    {
        $surat = $this->db->get_Where('tb_surat', ['id_surat' => $id])->row_array();
        unlink('assets/upload/surat/' . $surat['surat']);
        return $this->db->where('id_surat', $id)->delete('tb_surat');
    }
}
