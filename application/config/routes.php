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

// frontend
$route['home']['get'] = 'F_home/index';
