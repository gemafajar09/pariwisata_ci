<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'B_login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['b_login']['get'] = 'B_login/index';
$route['login_admin']['post'] = 'B_login/login';
$route['logout_admin']['get'] = 'B_login/logout';

$route['dashboard']['get'] = 'B_home/index';


// frontend
$route['home']['get'] = 'F_home/index';
