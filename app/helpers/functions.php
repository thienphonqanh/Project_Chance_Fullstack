<?php
function isLogin() {
    if (!empty(Session::data('login_token'))):
        $token = Session::data('login_token');
    endif;

    if (!empty($token)):
        return true;
    endif;

    return false;
}

function isUser() {
    if (!empty(Session::data('user_data')['group_id'])):
        $groupId = Session::data('user_data')['group_id'];
    endif;

    if (!empty($groupId) && $groupId === 5):
        return true;
    endif;

    return false;
}
?>