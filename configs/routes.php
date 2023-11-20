<?php
$routes['default_controller'] = 'authcontroller';
$routes['trang-chu'] = 'client/home';
$routes['admin'] = 'admin/dashboard';
// Đường dẫn ảo -> đường dẫn thật
$routes['tin-tuc/.+-(\d+).html'] = 'news/category/$1';

$routes['dang-nhap'] = 'auth/login';
$routes['dang-ky'] = 'auth/register';
$routes['dang-xuat'] = 'auth/logout';
$routes['tim-viec-lam'] = 'client/job';
$routes['groups'] = 'admin/group';
$routes['groups/nhan-su'] = 'admin/group/getPersonnel';


?>