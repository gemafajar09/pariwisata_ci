<?php

class F_home extends CI_Controller
{

    public function index()
    {
        $berita = $this->db->get('tb_berita')->result();
        $this->template->f_template('frontend/page/home', ['data' => $berita]);
    }

    public function detail($id)
    {
        $berita = $this
            ->db
            // ->select('id')
            ->where('id_berita', $id)
            ->get('tb_berita')
            ->result();
        $this->template->f_template('frontend/page/detail-berita', ['data' => $berita]);
    }
}
