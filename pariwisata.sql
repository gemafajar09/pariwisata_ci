-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jul 2022 pada 09.42
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pariwisata`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `phinxlog`
--

CREATE TABLE `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `phinxlog`
--

INSERT INTO `phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20220706195305, 'User', '2022-07-07 03:48:05', '2022-07-07 03:48:05', 0),
(20220706195803, 'Operator', '2022-07-07 03:48:05', '2022-07-07 03:48:05', 0),
(20220707072530, 'Berita', '2022-07-08 09:39:34', '2022-07-08 09:39:35', 0),
(20220707085139, 'Wisata', '2022-07-07 04:06:25', '2022-07-07 04:06:25', 0),
(20220707090208, 'Pengelola', '2022-07-07 04:06:25', '2022-07-07 04:06:25', 0),
(20220707090534, 'Kategori', '2022-07-07 04:06:25', '2022-07-07 04:06:25', 0),
(20220707153644, 'Jabatan', '2022-07-07 10:38:58', '2022-07-07 10:38:58', 0),
(20220707162317, 'Peta', '2022-07-07 11:25:10', '2022-07-07 11:25:10', 0),
(20220708154553, 'Galery', '2022-07-08 10:47:00', '2022-07-08 10:47:00', 0),
(20220712074449, 'Tiket', '2022-07-18 03:07:13', '2022-07-18 03:07:13', 0),
(20220712081404, 'Petugas', '2022-07-20 03:55:31', '2022-07-20 03:55:31', 0),
(20220718080445, 'Testimoni', '2022-07-20 03:55:31', '2022-07-20 03:55:31', 0),
(20220719094227, 'Surat', '2022-07-20 03:55:31', '2022-07-20 03:55:31', 0),
(20220720075248, 'Banner', '2022-07-20 03:55:49', '2022-07-20 03:55:49', 0),
(20220720095638, 'Wisatawan', '2022-07-20 05:52:55', '2022-07-20 05:52:55', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_banner`
--

CREATE TABLE `tb_banner` (
  `id_banner` int(11) NOT NULL,
  `banner` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_banner`
--

INSERT INTO `tb_banner` (`id_banner`, `banner`) VALUES
(1, 'assets/upload/banner/Banner-Tour-Pelangi-Holiday-35564.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_berita`
--

CREATE TABLE `tb_berita` (
  `id_berita` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi_berita` text NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `tgl_publish` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_berita`
--

INSERT INTO `tb_berita` (`id_berita`, `judul`, `isi_berita`, `penulis`, `foto`, `tgl_publish`) VALUES
(3, 'Pengacara Jelaskan Argumen soal Brigadir Yoshua Dibunuh di Magelang', 'Surabaya - Pihak keluarga Brigadir Nofriansyah Yoshua Hutabarat atau Brigadir J menduga telah terjadi pembunuhan berencana terhadap Brigadir Yoshua. Pengacara keluarga Brigadir Yoshua menduga pembunuhan itu terjadi di Magelang atau Jakarta.<br>Dilansir detikNews, pengacara keluarga Brigadir Yoshua, Kamaruddin Simanjuntak menunjukkan sambil menjelaskan apa yang disebutnya sebagai bukti luka-luka di tubuh Brigadir Yoshua. Dia mengatakan foto-foto luka di tubuh Brigadir Yoshua itu telah diserahkan ke Bareskrim Polri sebagai bukti laporan.<br><br>Adapun tindak pidana ini diduga terjadi pada tanggal 8 Juli 2022 sekira atau antara pukul 10.00 pagi hari sampai pukul 17.00. Locus delicti-nya adalah kemungkinan besar antara Magelang dan Jakarta. Itu alternatif pertama, alternatif kedua locus delicti-nya di rumah Kadiv Propam Polri atau rumah dinas di Duren Tiga, Kawasan Pancoran, Jakarta Selatan, ujar Kamaruddin di Bareskrim Polri, Senin (18/7).<br><br><span>Baca artikel detikjatim, Pengacara Jelaskan Argumen soal Brigadir Yoshua Dibunuh di Magelang', 'gema fajar', '63890e0fp3K-29691.jpg', '2022-07-20 13:34:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_galery`
--

CREATE TABLE `tb_galery` (
  `id_galery` int(11) NOT NULL,
  `foto` text NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_galery`
--

INSERT INTO `tb_galery` (`id_galery`, `foto`, `kategori`, `deskripsi`) VALUES
(2, 'assets/upload/galery/Masjid_Al_Hakim_oleh_Denas-13922.jpg', '1', 'mesjid al hakim');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `jabatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`id_jabatan`, `jabatan`) VALUES
(2, 'Operator Dinas'),
(3, 'Petugas Wisata');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Wisata');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_operator`
--

CREATE TABLE `tb_operator` (
  `id_operator` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_operator`
--

INSERT INTO `tb_operator` (`id_operator`, `nama`, `nik`, `jabatan`, `alamat`, `foto`, `id_user`) VALUES
(11, 'Operator', '123456789', '2', '-', 'assets/src/images/user.png', 22);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengelola`
--

CREATE TABLE `tb_pengelola` (
  `id_pengelola` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `nik` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_pengelola`
--

INSERT INTO `tb_pengelola` (`id_pengelola`, `id_user`, `nama`, `alamat`, `nik`, `foto`) VALUES
(1, 20, 'pengelola', 'padang', '1371111306970013', 'assets/upload/pengelola/chat-img1-78271.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_peta`
--

CREATE TABLE `tb_peta` (
  `id_peta` int(11) NOT NULL,
  `url` text NOT NULL,
  `id_wisata` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_peta`
--

INSERT INTO `tb_peta` (`id_peta`, `url`, `id_wisata`) VALUES
(2, 'https://www.google.com/maps/place/Padang+Beach/@-0.9295501,100.3412018,15z/data=!3m1!4b1!4m5!3m4!1s0x2fd4b93318fd31bf:0x15db501c7239061f!8m2!3d-0.9295716!4d100.3499566', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nik` int(11) NOT NULL,
  `jabatan` int(11) NOT NULL,
  `foto` text NOT NULL,
  `alamat` text NOT NULL,
  `tgl_lahir` date NOT NULL,
  `ijazah` text NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `kk` varchar(255) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `pendidikan` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_wisata` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_petugas`
--

INSERT INTO `tb_petugas` (`id_petugas`, `nama`, `nik`, `jabatan`, `foto`, `alamat`, `tgl_lahir`, `ijazah`, `jenis_kelamin`, `no_hp`, `kk`, `agama`, `pendidikan`, `id_user`, `id_wisata`, `status`) VALUES
(6, 'petugas', 30, 3, 'default.png', 'padang', '1973-10-27', 'default.png', 'Perempuan', '11', 'default.png', 'Katolik', 'Sarjana', 31, 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_surat`
--

CREATE TABLE `tb_surat` (
  `id_surat` int(11) NOT NULL,
  `surat` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_wisata` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_testimoni`
--

CREATE TABLE `tb_testimoni` (
  `id_testimoni` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `komentar` text NOT NULL,
  `tanggal` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tiket`
--

CREATE TABLE `tb_tiket` (
  `id_tiket` int(11) NOT NULL,
  `id_wisata` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `harga_tiket` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `harga_parkir` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `dibuat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password_hash`, `status`, `level`) VALUES
(10, 'admin', '$2y$10$Ezg1B8nbilLwxt4kagrwsemZBFbthOg3adTaDSrIyo07Q0cMVk7K6', 1, 1),
(20, 'pengelola', '$2y$10$5o7fXs/zutY88fjcP3jIrOWohRkY.WnVWliYd0wkOVzgPfLN6oBmC', 1, 3),
(22, 'operator', '$2y$10$Q8c1g2pn6b41OF2ilfmaZeROVYUmTiYrxeLXMseze.iDOJtfEjf3.', 1, 2),
(31, 'petugas', '$2y$10$Wr9kmCfqT0oH.E9OgkOkJ.244tqLBsxAw.LFICtqZNhH0gieebpla', 1, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_wisata`
--

CREATE TABLE `tb_wisata` (
  `id_wisata` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_wisata` varchar(255) NOT NULL,
  `foto_wisata` text NOT NULL,
  `alamat` text NOT NULL,
  `pusat_informasi` text NOT NULL,
  `p3k` text NOT NULL,
  `mushola` text NOT NULL,
  `luas_mushola` text NOT NULL,
  `tempat_parkir` text NOT NULL,
  `luas_tempat_parkir` text NOT NULL,
  `wc` text NOT NULL,
  `jumlah_wc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_wisata`
--

INSERT INTO `tb_wisata` (`id_wisata`, `id_user`, `nama_wisata`, `foto_wisata`, `alamat`, `pusat_informasi`, `p3k`, `mushola`, `luas_mushola`, `tempat_parkir`, `luas_tempat_parkir`, `wc`, `jumlah_wc`) VALUES
(2, 22, 'pantai padang', 'Pantai-Padang-06020.jpg', 'Lubuk begalung, marapalam', 'Pantai Padang merupakan salahsatu destinasi wisata favorit di Kota Padang. Terlebih setelah Pemerintah Kota Padang memoles dengan berbagai peningkatan dari segala sisi. Mulai dari kebersihan, kerapian, kenyamanan hingga melengkapi sarana dan prasarana fasilitas umum. Jika sebelumnya, warga kota Padang saja sedikit enggan berlibur ke destinasi ini, sekarang siapapun yang datang ke Kota Padang akan merasa sangat rugi jika tidak menyempatkan diri datang ke Pantai Padang.\r\n\r\nSaat ini wajah Pantai Padang memang semakin mempesona. Bersih dan tertata rapi. Para pedagang disediakan lokasi berjualan di sejumlah titik. Sepanjang bahu jalan trotoar diperlebar sehingga cukup memanjakan pejalan kaki ataupun anak-anak yang bermain. Parkir kendaraan juga sudah disediakan area khusus. Namun saat pengunjung memblundak, aturan parkir sedikit dilonggarkan dengan boleh parkir dipinggir jalan tapi tetap dengan pengaturan oleh juru parkir.\r\nMeskipun bibir Pantai Padang semakin tergerus air laut, tapi dikarenakan bersih dari berbagai sampah tetap saja sangat nyaman bagi pengunjung untuk bermain pasir, mandi, bahkan ada juga yang surfing di waktu tertentu saat besar ombak memadai.\r\n\r\nDan yang semakin memanjakan para pengunjung, Di kawasan Pantai Padang juga sudah muncul beberapa objek wisata baru, seperti Monumen IORA yang sering dmanfaatkan untuk spot foto. Kemudian ada Monumen Merpati Perdamaian yang berada ditengah-tengah kerumunan cafe payung dibibir pantai tempat menikmati berbagai macam kuliner yang lezat. Tepat disekitar monumen, tersedia area bermain anak lengkap dengan berbagai jenis jasa permainan dengan harga terjangkau. Bagian ini sedikit terpisah oleh muara yang membelahnya dari Pantai Padang dengan jembatan sebagai pengikat. Dan kemudian dikenal dengan nama Muaro Lasak. Terbaru, muncul Pantai Purus dengan teras yang besar dan lega dipinggir pantai. Teras ini juga nantinya berfungsi sebagai media untuk beragam acara ataupun event seperti salahsatunya Festival Siti Nurbaya.\r\n\r\nSelain di cafe-cafe payung yang mengelilingi monumen Merpati Perdamaian, pengunjung juga bisa berkuliner di jejeran cafe yang memanjang di seberang bibir pantai dengan latar belakang Danau Cimpago . Bukan hanya cafe, juga terdapat toko-toko yang menjual berbagai macam barang mulai dari baju, aksesoris hingga cendera mata.\r\n\r\nKetika cuaca cerah, Pantai Padang termasuk tempat yang ideal untuk menyaksikan matahari terbenam diufuk barat dengan bias merahnya yang indah. Jalan beraspal Pantai Padang juga sering dijadikan lokasi berbagai event hingga rute balap sepeda Tour de Singkarak.\r\n\r\nSingkat kata, jangan lewatkan icon Kota Padang ini jika berkunjung ke Kota Padang yang juga merupakan ibukota Provinsi Sumatera Barat. Dan sangat dekat dengan objek wisata lainnya, sebut saja Gunung Padang dan Kawasan Kota tua dengan Jembatan Siti Nurbaya nya...', '63890e0fp3K-14770.jpg', 'Masjid_Al_Hakim_oleh_Denas-39167.jpg', '4', 'Screenshot_2018-06-16-18-04-10-68062.png', '80', '49169-kamar-mandi-unik-instagramatdekorasiterbaru-59671.jpg', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_wisatawan`
--

CREATE TABLE `tb_wisatawan` (
  `id_wisatawan` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `nohp` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `phinxlog`
--
ALTER TABLE `phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Indeks untuk tabel `tb_banner`
--
ALTER TABLE `tb_banner`
  ADD PRIMARY KEY (`id_banner`);

--
-- Indeks untuk tabel `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indeks untuk tabel `tb_galery`
--
ALTER TABLE `tb_galery`
  ADD PRIMARY KEY (`id_galery`);

--
-- Indeks untuk tabel `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tb_operator`
--
ALTER TABLE `tb_operator`
  ADD PRIMARY KEY (`id_operator`);

--
-- Indeks untuk tabel `tb_pengelola`
--
ALTER TABLE `tb_pengelola`
  ADD PRIMARY KEY (`id_pengelola`);

--
-- Indeks untuk tabel `tb_peta`
--
ALTER TABLE `tb_peta`
  ADD PRIMARY KEY (`id_peta`);

--
-- Indeks untuk tabel `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `tb_surat`
--
ALTER TABLE `tb_surat`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indeks untuk tabel `tb_testimoni`
--
ALTER TABLE `tb_testimoni`
  ADD PRIMARY KEY (`id_testimoni`);

--
-- Indeks untuk tabel `tb_tiket`
--
ALTER TABLE `tb_tiket`
  ADD PRIMARY KEY (`id_tiket`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `tb_wisata`
--
ALTER TABLE `tb_wisata`
  ADD PRIMARY KEY (`id_wisata`);

--
-- Indeks untuk tabel `tb_wisatawan`
--
ALTER TABLE `tb_wisatawan`
  ADD PRIMARY KEY (`id_wisatawan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_banner`
--
ALTER TABLE `tb_banner`
  MODIFY `id_banner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_berita`
--
ALTER TABLE `tb_berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_galery`
--
ALTER TABLE `tb_galery`
  MODIFY `id_galery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_operator`
--
ALTER TABLE `tb_operator`
  MODIFY `id_operator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_pengelola`
--
ALTER TABLE `tb_pengelola`
  MODIFY `id_pengelola` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_peta`
--
ALTER TABLE `tb_peta`
  MODIFY `id_peta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_petugas`
--
ALTER TABLE `tb_petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_surat`
--
ALTER TABLE `tb_surat`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_testimoni`
--
ALTER TABLE `tb_testimoni`
  MODIFY `id_testimoni` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_tiket`
--
ALTER TABLE `tb_tiket`
  MODIFY `id_tiket` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `tb_wisata`
--
ALTER TABLE `tb_wisata`
  MODIFY `id_wisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_wisatawan`
--
ALTER TABLE `tb_wisatawan`
  MODIFY `id_wisatawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
