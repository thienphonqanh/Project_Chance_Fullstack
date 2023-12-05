<?php
class Profile extends Controller
{
    private $profileModel;
    private $data = [];

    public function __construct()
    {
        $this->profileModel = $this->model('ProfileModel', 'user');
    }

    public function changePassword()
    {
        $request = new Request();
        $userId = getIdUserLogin();

        if ($request->isPost()) :
            $request->rules([
                'old_password' => 'required',
                'new_password' => 'required|min:8|special',
                'confirm_new_password' => 'required|match:new_password'
            ]);

            $request->message([
                'old_password.required' => 'Mật khẩu cũ không được để trống',
                'new_password.required' => 'Mật khẩu mới không được để trống',
                'new_password.min' => 'Mật khẩu phải lớn hơn 7 ký tự',
                'new_password.special' => 'Mật khẩu phải có ít nhất 1 ký tự hoa và 1 ký tự đặc biệt',
                'confirm_new_password.required' => 'Mật khẩu không được để trống',
                'confirm_new_password.match' => 'Mật khẩu không trùng khớp',
            ]);

            $validate = $request->validate();

            if ($validate && !empty($userId)) :
                $result = $this->profileModel->handleChangePassword($userId);

                if ($result) :
                    Session::flash('msg', 'Thay đổi mật khẩu thành công');
                    Session::flash('msg_type', 'success');
                endif;
            else :
                Session::flash('msg', 'Vui lòng kiểm tra toàn bộ dữ liệu');
                Session::flash('msg_type', 'danger');
            endif;
        endif;


        $this->data['body'] = 'client/profile/changepassword';
        $this->data['dataView']['msg'] = Session::flash('msg');
        $this->data['dataView']['msgType'] = Session::flash('msg_type');
        $this->data['dataView']['errors'] = Session::flash('chance_session_errors');
        $this->data['dataView']['old'] = Session::flash('chance_session_old');
        $this->render('layouts/main.layout', $this->data, 'client');
    }
}
