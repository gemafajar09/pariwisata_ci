<?php

class F_home extends CI_Controller
{

    public function index()
    {
        $data['berita'] = $this->db->get('tb_berita')->result();
        $data['galeri'] = $this->db->query('SELECT * FROM tb_galery limit 6')->result();
        $data['banner1'] = $this->db->query('SELECT * FROM tb_banner LIMIT 1')->row_array();
        $data['banner'] = $this->db->query('SELECT * FROM tb_banner')->result();

        $data['testimoni'] = $this->db->query('SELECT * FROM tb_testimoni where status = 1')->result();
        $data['pariwisata'] = $this->db->query("SELECT * FROM tb_wisata")->result();
        $this->template->f_template('frontend/page/home', $data);

    }

    public function detail($id)
    {
        $berita = $this
            ->db
            ->where('id_berita', $id)
            ->get('tb_berita')
            ->result();
        $this->template->f_template('frontend/page/detail-berita', ['data' => $berita]);
    }

    public function detailGalery()
    {
        $galeri = $this->db->get('tb_galery')->result();
        $this->template->f_template('frontend/page/detail-galery', ['data' => $galeri]);
    }

	public function detailWisata($id)
	{
		$data['wisata'] = $this->db->query("SELECT * FROM tb_wisata a left join tb_peta b on a.id_wisata=b.id_wisata WHERE a.id_wisata = $id")->row_array();
        $this->template->f_template('frontend/page/detail-wisata', $data);
	}
}
