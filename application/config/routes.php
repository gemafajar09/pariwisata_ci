<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'F_home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// backend
$route['b_login']['get'] = 'B_login/index';
$route['login_admin']['post'] = 'B_login/login';
$route['logout_admin']['get'] = 'B_login/logout';

$route['dashboard']['get'] = 'B_home/index';

// operator
$route['operator']['get'] = 'B_operator/index';
$route['operator-add']['post'] = 'B_operator/simpan';
$route['operator-add/(:num)']['post'] = 'B_operator/simpan/$1';
$route['operator-delete/(:num)']['get'] = 'B_operator/delete/$1';

// pengelola
$route['pengelola']['get'] = 'B_pengelola/index';
$route['pengelola-add']['post'] = 'B_pengelola/simpan';
$route['pengelola-add/(:num)']['post'] = 'B_pengelola/simpan/$1';
$route['pengelola-delete/(:num)']['get'] = 'B_pengelola/delete/$1';

// user
$route['user']['get'] = 'B_user/index';
$route['user-up/(:num)']['get'] = 'B_user/unlock/$1';
$route['user-pass/(:num)']['post'] = 'B_user/update/$1';
$route['user-del/(:num)']['get'] = 'B_user/delete/$1';
$route['user-add/(:num)']['post'] = 'B_user/simpan/$1';

// galery
$route['galery']['get'] = 'B_galery/index';
$route['galery-add']['post'] = 'B_galery/simpan';
$route['galery-add/(:num)']['post'] = 'B_galery/simpan/$1';
$route['galery-del/(:num)']['get'] = 'B_galery/delete/$1';

// peta
$route['peta']['get'] = 'B_peta/index';
$route['peta-add']['post'] = 'B_peta/simpan';
$route['peta-add/(:num)']['post'] = 'B_peta/simpan/$1';
$route['peta-del/(:num)']['get'] = 'B_peta/delete/$1';

// testimoni
$route['testimoni']['get'] = 'B_testimoni/index';
$route['testimoni-del/(:num)']['get'] = 'B_testimoni/delete/$1';
$route['testimoni-lock/(:num)']['post'] = 'B_testimoni/update/$1';

// Berita
$route['berita']['get'] = 'B_berita/index';
$route['tambah-berita']['get'] = 'B_berita/tambahBerita';
$route['berita-add']['post'] = 'B_berita/simpan';
$route['berita-add/(:num)']['post'] = 'B_berita/simpan/$1';
$route['berita-del/(:num)']['get'] = 'B_berita/delete/$1';

// jabatan
$route['jabatan']['get'] = 'B_jabatan/index';
$route['jabatan-add']['post'] = 'B_jabatan/simpan';
$route['jabatan-add/(:num)']['post'] = 'B_jabatan/simpan/$1';
$route['jabatan-del/(:num)']['get'] = 'B_jabatan/delete/$1';

// Wisata
$route['wisata']['get'] = 'B_wisata/index';
$route['wisata-add']['post'] = 'B_wisata/simpan';
$route['wisata-add/(:num)']['post'] = 'B_wisata/simpan/$1';
$route['wisata-del/(:num)']['get'] = 'B_wisata/delete/$1';

// kategori
$route['kategori']['get'] = 'B_kategori/index';
$route['kategori-add']['post'] = 'B_kategori/simpan';
$route['kategori-add/(:num)']['post'] = 'B_kategori/simpan/$1';
$route['kategori-del/(:num)']['get'] = 'B_kategori/delete/$1';

// tiket
$route['tiket']['get'] = 'B_tiket/index';
$route['tiket-add']['post'] = 'B_tiket/simpan';
$route['tiket-add/(:num)']['post'] = 'B_tiket/simpan/$1';
$route['tiket-del/(:num)']['get'] = 'B_tiket/delete/$1';

// frontend
$route['home']['get'] = 'F_home/index';
$route['detail-wisata/(:num)']['get'] = 'F_home/detailWisata/$1';
$route['detail-berita/(:num)']['get'] = 'F_home/detail/$1';
$route['detail-galery']['get'] = 'F_home/detailGalery';

// pendapatan
$route['pendapatan']['get'] = 'B_pendapatan/index';
$route['cari-pendapatan/(:num)/(:any)']['get'] = 'B_pendapatan/cari/$1/$2';

// register
$route['register-petugas']['post'] = 'F_register/simpan';

// testimonial
$route['testimoni-add']['post'] = 'F_testimonial/simpan';

