<?php
class AuthModel extends Model {
    public function tableFill()
    {
        return '';
    }

    public function fieldFill()
    {
        return '';
    }

    public function primaryKey()
    {
        return '';
    }

    // Xử lý login
    public function handleLogin($username, $password) {
        $queryGet = $this->handleGetWithRole($username);
        
        if (!empty($queryGet)):
            $passwordHash = $queryGet['password'];
            $userId = $queryGet['id'];
            $statusAccount = $queryGet['status'];
            $groupId = $queryGet['group_id'];

            if (password_verify($password, $passwordHash)):
                $loginToken = sha1(uniqid().time());

                if ($groupId === 1):
                    $dataToken = [
                        'admin_id' => $userId,
                        'token' => $loginToken,
                        'create_at' => date('Y-m-d H:i:s')
                    ];
                    
                    $tableName = 'admins';
                endif;
                
                if ($groupId === 2):
                    $dataToken = [
                        'candidate_id' => $userId,
                        'token' => $loginToken,
                        'create_at' => date('Y-m-d H:i:s')
                    ];

                    $tableName = 'candidates';
                endif;

                if ($statusAccount === 1):
                    $insertTokenStatus = $this->db->table('login_token')->insert($dataToken);
                    if ($insertTokenStatus):
                        // Lưu login token vào session
                        Session::data('login_token', $loginToken);
                        // Lưu thông tin người đăng nhập
                        $this->handleSaveUserData($tableName, $userId);

                        return true;
                    endif;
                endif;

                if ($statusAccount === 0):
                    Session::flash('msg', 'Vui lòng kích hoạt tài khoản tại Gmail bạn dùng để đăng ký tài khoản');
                    Session::flash('msg_type', 'danger');
                endif;
            else:
                Session::flash('msg', 'Mật khẩu chưa chính xác');
                Session::flash('msg_type', 'danger');
            endif;
        else:
            Session::flash('msg', 'Email chưa chính xác');
            Session::flash('msg_type', 'danger');
        endif;

        return false;
    }

    // Xử lý check: admin, candidates
    public function handleGetWithRole($username) {
        $queryGetAdmin = $this->db->table('admins')
            ->select('id, email, password, status, group_id')
            ->where('email', '=', $username)
            ->first();
            
        $queryGetCandidate = $this->db->table('candidates')
            ->select('id, email, password, status, group_id')
            ->where('email', '=', $username)
            ->first();

        if (!empty($queryGetAdmin)):
            return $queryGetAdmin;
        endif;

        if (!empty($queryGetCandidate)):
            return $queryGetCandidate;
        endif;

        return false;
    }

    // Xử lý lưu data login vào session
    public function handleSaveUserData($role = '', $userId = '') {
        $userData = $this->db->table($role)
            ->where('id', '=', $userId)
            ->first();

        Session::data('user_data', $userData);
    }
  

    // Xử lý register
    public function handleRegister() {
        $activeToken = sha1(uniqid().time());
        $groupId = 2;
        $dataInsert = [
            'fullname' => $_POST['fullname'],
            'email' => $_POST['email'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            'active_token' => $activeToken,
            'group_id' => $groupId,
            'create_at' => date('Y-m-d H:i:s')
        ];

        $insertStatus = $this->db->table('candidates')->insert($dataInsert);
        if ($insertStatus):
            // Tạo link active
            $linkActive = _WEB_ROOT.'/active?token='.$activeToken;
            // Thiết lập mail
            $subject = ucwords($_POST['fullname']).' ơi. Bạn vui lòng kích hoạt tài khoản';
            $content = 'Chào bạn: '.ucwords($_POST['fullname']).'<br>';
            $content .= 'Vui lòng click vào link dưới đây để kích hoạt tài khoản của bạn: <br>';
            $content .= $linkActive.'<br>';
            $content .= 'Trân trọng!';

            $sendStatus = Mailer::sendMail($_POST['email'], $subject, $content);

            if ($sendStatus):
                Session::flash('msg', 'Đăng ký thành công. Email kích hoạt đã được gửi đến bạn!');
                Session::flash('msg_type', 'success');
                return true;
            else:
                Session::flash('msg', 'Hệ thống đang gặp sự cố');
                Session::flash('msg_type', 'danger');
            endif;
        else:
            Session::flash('msg', 'Hệ thống đang gặp sự cố');
            Session::flash('msg_type', 'danger');
        endif;

        return false;
    }


    public function handleActiveAccount($token) {
        if (!empty($token)):
            // Truy vấn sql để so sánh
            $tokenQuery = $this->db->table('candidates')
                ->select('id')
                ->where('active_token', '=', $token)
                ->first();

            if (!empty($tokenQuery)):
                $userId = $tokenQuery['id'];
                $dataUpdate = [
                    'status' => 1,
                    'active_token' => null
                ];
                $updateStatus = $this->db->table('candidates')->update($dataUpdate, "id = $userId");
                if ($updateStatus):
                    return true;
                endif;    
            endif;
        endif;

        return false;
    }

    public function handleLogout($userId, $groupId) {
        if (!empty($groupId) && $groupId === 1):
            $queryDelete = $this->db->table('login_token')
            ->where('admin_id', '=', $userId)
            ->delete();
        else:
            $queryDelete = $this->db->table('login_token')
            ->where('candidate_id', '=', $userId)
            ->delete();
        endif;
        
        if ($queryDelete):
            Session::delete('login_token');
            Session::delete('user_data');

            return true;
        endif;

        return false;
    }
}