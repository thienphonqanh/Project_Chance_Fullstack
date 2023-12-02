<?php 
class ProfileModel extends Model {
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

    public function handleChangePassword($userId) {
        $checkOldPass = $this->db->table('candidates')
            ->select('password')
            ->where('id', '=', $userId)
            ->first();
        
        if (password_verify($_POST['old_password'], $checkOldPass['password'])):
            if (!password_verify($_POST['new_password'], $checkOldPass['password'])):
                $dataUpdate = [
                    'password' => password_hash($_POST['new_password'], PASSWORD_DEFAULT)
                ];  

                $updateStatus = $this->db->table('candidates')
                    ->where('id', '=', $userId)
                    ->update($dataUpdate);
                
                if ($updateStatus):
                    return true;
                endif;
            else:
                Session::flash('msg', 'Bạn đang dùng mật khẩu này');
                Session::flash('msg_type', 'danger');
            endif;
        else:
            Session::flash('msg', 'Mật khẩu cũ chưa chính xác');
            Session::flash('msg_type', 'danger');
        endif;

        return false;
    }

}