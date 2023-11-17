<?php
$routes['default_controller'] = 'authcontroller';
$routes['admin'] = 'dashboard/dashboard';
// Đường dẫn ảo -> đường dẫn thật
$routes['tin-tuc/.+-(\d+).html'] = 'news/category/$1';


?>