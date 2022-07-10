<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'B_login';
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

// user
$route['user']['get'] = 'B_user/index';
$route['user-up/(:num)']['get'] = 'B_user/unlock/$1';
$route['user-pass/(:num)']['post'] = 'B_user/update/$1';
$route['user-del/(:num)']['get'] = 'B_user/delete/$1';

$route['user-add/(:num)']['post'] = 'B_user/simpan/$1';

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


// frontend
$route['home']['get'] = 'F_home/index';
