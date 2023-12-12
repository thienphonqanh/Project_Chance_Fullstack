<?php

// Đường dẫn ảo -> đường dẫn thật
$routes['default_controller'] = '';
// $routes['/'] = 'client/home';
$routes['trang-chu'] = 'client/home';
$routes['admin'] = 'admin/dashboard';


// Route Auth
$routes['dang-nhap'] = 'auth/login';
$routes['dang-ky'] = 'auth/register';
$routes['dang-xuat'] = 'auth/logout';
$routes['active'] = 'auth/active';
$routes['forgot'] = 'auth/forgot';
$routes['check'] = 'auth/check';
$routes['reset'] = 'auth/reset';


/*
    Route trang Client
*/
$routes['tim-viec-lam'] = 'client/job';
$routes['chi-tiet-viec-lam'] = 'client/job/detail';
$routes['chi-tiet-viec-lam/{jobTitle}-(\d+)'] = 'client/job/detail&id=$1';
$routes['chi-tiet-bai-viet'] = 'client/handbook/detail';
$routes['chi-tiet-bai-viet/{handbookTitle}-(\d+)'] = 'client/handbook/detail&id=$1';


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


// Dashboard - Quản lý việc làm
$routes['jobs'] = 'admin/job';
$routes['jobs/danh-sach'] = 'admin/job/getListJob';
$routes['jobs/danh-sach/thong-tin'] = 'admin/job/viewJob';
$routes['jobs/danh-sach/trang-thai'] = 'admin/job/changeStatus';
$routes['jobs/danh-sach/chinh-sua'] = 'admin/job/updateJob';
$routes['jobs/danh-sach/xoa'] = 'admin/job/delete';
$routes['jobs/them-moi'] = 'admin/job/addJob';

// Dashboard - Quản lý tin tức nghề nghiệp
$routes['handbooks'] = 'admin/handbook';
$routes['handbooks/danh-sach'] = 'admin/handbook/getListHandbook';
$routes['handbooks/them-moi'] = 'admin/handbook/addHandbook';
$routes['handbooks/danh-sach/thong-tin'] = 'admin/handbook/viewHandbook';
$routes['handbooks/danh-sach/chinh-sua'] = 'admin/handbook/updateHandbook';
$routes['handbooks/danh-sach/xoa'] = 'admin/handbook/delete';
$routes['admin/handbook/getCategory'] = 'admin/handbook/getCategory';
$routes['admin/handbook/getSubCategory'] = 'admin/handbook/getSubCategory';

// Dashboard - Quản lý liên hệ
$routes['contacts'] = 'admin/contact';
$routes['contacts/danh-sach'] = 'admin/contact/getListContact';

/*
    Route trang user
*/
// Trang người dùng
$routes['doi-mat-khau'] = 'client/profile/changePassword';
$routes['thong-tin-ca-nhan'] = 'client/profile/personalInformation';
$routes['thong-tin-ca-nhan/chinh-sua'] = 'client/profile/editPersonalInformation';
$routes['ung-tuyen'] = 'client/job/recruitment';
