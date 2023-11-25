<?php

// Đường dẫn ảo -> đường dẫn thật
$routes['default_controller'] = '';
$routes['/'] = 'client/home';
$routes['trang-chu'] = 'client/home';
$routes['admin'] = 'admin/dashboard';


// Route Auth
$routes['dang-nhap'] = 'auth/login';
$routes['dang-ky'] = 'auth/register';
$routes['dang-xuat'] = 'auth/logout';
$routes['active'] = 'auth/active';


/*
    Route trang Client
*/
$routes['tim-viec-lam'] = 'client/job';
$routes['chi-tiet-viec-lam'] = 'client/job/detail';
$routes['cam-nang'] = 'client/handbook';
$routes['cam-nang/la-ban-su-nghiep'] = 'client/handbook/firstPage';
$routes['cam-nang/tram-sac-ky-nang'] = 'client/handbook/secondPage';
$routes['cam-nang/toa-do-nhan-tai'] = 'client/handbook/thirdPage';
$routes['cam-nang/ki-ot-vui-ve'] = 'client/handbook/fourthPage';
$routes['lien-he'] = 'client/contact';


/*
    Route trang Admin
*/
// Dashboard - Nhóm người dùng
$routes['groups'] = 'admin/group';
$routes['groups/nhan-su'] = 'admin/group/getPersonnel';
$routes['groups/ung-vien'] = 'admin/group/getCandidate';
$routes['groups/ung-vien/thong-tin'] = 'admin/group/viewProfileCandidate';
$routes['groups/ung-vien/chinh-sua'] = 'admin/group/updateProfileCandidate';
$routes['groups/ung-vien/trang-thai'] = 'admin/group/changeStatusAccountCandidate';
$routes['groups/ung-vien/xoa'] = 'admin/group/deleteCandidate';
$routes['groups/nhan-su/thong-tin'] = 'admin/group/viewProfilePersonnel';
$routes['groups/nhan-su/chinh-sua'] = 'admin/group/updateProfilePersonnel';
$routes['groups/nhan-su/trang-thai'] = 'admin/group/changeStatusAccountPersonnel';
$routes['groups/nhan-su/xoa'] = 'admin/group/deletePersonnel';
