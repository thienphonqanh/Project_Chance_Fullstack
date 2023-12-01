<?php
function isLogin()
{
    if (!empty(Session::data('login_token'))) :
        $token = Session::data('login_token');
    endif;

    if (!empty($token)) :
        return true;
    endif;

    return false;
}

function isUser()
{
    if (!empty(Session::data('user_data')['group_id'])) :
        $groupId = Session::data('user_data')['group_id'];
    endif;

    if (!empty($groupId) && $groupId === 2) :
        return true;
    endif;

    return false;
}

function getUserData()
{
    if (!empty(Session::data('user_data'))) :
        return Session::data('user_data');
    endif;

    return false;
}

function getNameUserLogin()
{
    if (getUserData() && !empty(getUserData()['fullname'])) :
        return getUserData()['fullname'];
    endif;

    return false;
}

function getAvatarUserLogin()
{
    if (getUserData() && !empty(getUserData()['thumbnail'])) :
        return getUserData()['thumbnail'];
    endif;

    return false;
}

function getModule()
{
    if (!empty($_SERVER['PATH_INFO'])) :
        $path = trim($_SERVER['PATH_INFO'], '/');
        $path = explode('/', $path);
    endif;

    if (!empty($path)) :
        $path = array_filter($path);

        $module = $path[0];
    endif;

    return $module;
}

function handleActiveLink($module = '')
{
    if (empty($_SERVER['PATH_INFO'])) :
        $_SERVER['PATH_INFO'] = 'trang-chu';
    endif;

    if (ltrim($_SERVER['PATH_INFO'], '/') === $module) :
        return true;
    endif;

    return false;
}

function handleActiveSidebar($module = '', $action = '')
{
    if (!empty($_SERVER['PATH_INFO'])) :
        $path = trim($_SERVER['PATH_INFO'], '/');
        $path = explode('/', $path);
    endif;

    if (!empty($path)) :
        $path = array_filter($path);

        if (count($path) > 1) :
            if (empty($action)) :
                if ($path[0] === $module) :
                    return true;
                endif;
            else :
                if ($path[0] === $module && $path[1] === $action) :
                    return true;
                endif;
            endif;
        else :
            if (!empty($module)) :
                if ($path[0] === $module) :
                    return true;
                endif;
            endif;
        endif;

    endif;

    return false;
}

// Format lại time
function getDateTimeFormat($strDate, $format)
{
    $dateObject = date_create($strDate);
    if (!empty($dateObject)) :
        return date_format($dateObject, $format);
    endif;

    return false;
}

function getIdInURL($module = '') {
    $pattern ='/'.$module.'\/.+-(.+)/i';

    $url = $_SERVER['PATH_INFO'];

    // Kiểm tra xem URL có khớp với mẫu hay không
    if (preg_match($pattern, $url, $matches)) {
        // $matches[1] chứa giá trị ID
        $id = $matches[1];
    } 

    return $id;
}