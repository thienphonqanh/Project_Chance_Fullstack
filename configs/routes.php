<?php

// Đường dẫn ảo -> đường dẫn thật
$routes['default_controller'] = '';
$routes['tin-tuc/.+-(\d+).html'] = 'news/category/$1';
$routes['/'] = 'client/home';
$routes['trang-chu'] = 'client/home';
$routes['admin'] = 'admin/dashboard';

// Route Auth
$routes['dang-nhap'] = 'auth/login';
$routes['dang-ky'] = 'auth/register';
$routes['dang-xuat'] = 'auth/logout';

// Route trang client
$routes['tim-viec-lam'] = 'client/job';
$routes['cam-nang'] = 'client/handbook';
$routes['cam-nang/la-ban-su-nghiep'] = 'client/handbook/firstPage';
$routes['cam-nang/tram-sac-ky-nang'] = 'client/handbook/secondPage';
$routes['cam-nang/toa-do-nhan-tai'] = 'client/handbook/thirdPage';
$routes['cam-nang/ki-ot-vui-ve'] = 'client/handbook/fourthPage';
$routes['lien-he'] = 'client/contact';

// Route trang Admin
$routes['groups'] = 'admin/group';
$routes['groups/nhan-su'] = 'admin/group/getPersonnel';


?>