<?php

class F_home extends CI_Controller
{

    public function index()
    {
        $berita = $this->db->get('tb_berita')->result();
        $galeri = $this->db->query('SELECT * FROM tb_galery limit 6')->result();

        $testimoni = $this->db->query('SELECT * FROM tb_testimoni')->result();
        $this->template->f_template('frontend/page/home', ['data' => $berita, 'galeri' => $galeri, 'testimoni' => $testimoni]);

		    $pariwisata = $this->db->join('tb_peta', 'tb_peta.id_wisata = tb_wisata.id_wisata')->get('tb_wisata')->result();
        $this->template->f_template('frontend/page/home', ['data' => $berita, 'galeri' => $galeri, 'pariwisata' => $pariwisata]);

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
		$wisata = $this->db->join('tb_peta', 'tb_peta.id_wisata = tb_wisata.id_wisata')->where('tb_wisata.id_wisata', $id)->get('tb_wisata')->result();
        $this->template->f_template('frontend/page/detail-wisata', ['data' => $wisata]);
	}
}
