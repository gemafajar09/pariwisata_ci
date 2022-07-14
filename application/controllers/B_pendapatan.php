<?php
class B_pendapatan extends CI_Controller
{
    // fungsi untuk melihat pendapatan
    public function index()
    {
        $tiket = $this
            ->db
            ->query('SELECT * FROM tb_tiket a join tb_wisata b on a.id_wisata = b.id_wisata')
            ->result();

        $wisata = $this
            ->db
            ->get('tb_wisata')
            ->result();

        $total_tiket = $this->db->query('SELECT sum(jumlah) as j FROM tb_tiket')->result()[0];
        $total_harga_tiket = $this->db->query('SELECT sum(total) as h FROM tb_tiket')->result()[0];

        $this->template->b_template('backend/pendapatan/index', ['tiket' => $tiket, 'total_tiket' => $total_tiket, 'total_harga_tiket' => $total_harga_tiket, 'wisata' => $wisata]);
    }

    // fungsi untuk mencari data
    public function cari($id_wisata, $tgl)
    {
        // $id_wisata = $_POST['id_wisata'];
        // $tgl = $_POST['tgl'];

        $total_tiket = $this->db->query('SELECT sum(jumlah) as j FROM tb_tiket where id_wisata = ' . $id_wisata . ' OR dibuat = ' . $tgl)->result()[0];

        $total_pendapatan = $this->db->query('SELECT sum(total) as h FROM tb_tiket where id_wisata = ' . $id_wisata . ' OR dibuat = ' . $tgl)->result()[0];

        $tiket_filter = $this
            ->db
            ->query('SELECT * FROM tb_tiket a join tb_wisata b on a.id_wisata = b.id_wisata WHERE a.id_wisata = ' . $id_wisata . ' OR dibuat = ' . $tgl)
            ->result();

        $this->template->b_template('backend/pendapatan/cari',  ['tiket_filter' => $tiket_filter, 'total_tiket' => $total_tiket, 'total_pendapatan' => $total_pendapatan]);
    }
}
