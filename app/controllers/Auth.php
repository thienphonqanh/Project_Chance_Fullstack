<?php
class Auth extends Controller
{
    private $authModel;
    private $data = [];

    public function __construct()
    {
        $this->authModel = $this->model('AuthModel');
    }

    // Xử lý login
    public function login()
    {
        $request = new Request();
        $response = new Response();

        if (isLogin()) :
            $response->redirect('trang-chu');
        endif;

        if ($request->isPost()) : // Kiểm tra post
            $request->rules([
                'email' => 'required',
                'password' => 'required',
            ]);

            $request->message([
                'email.required' => 'Email không được để trống',
                'password.required' => 'Mật khẩu không được để trống',
            ]);

            $validate = $request->validate();

            if ($validate) :
                $data = $request->getFields();

                if (!empty($data)) :
                    $username = $data['email'];
                    $password = $data['password'];

                    $result = $this->authModel->handleLogin($username, $password);

                    if ($result) :
                        $response->redirect('trang-chu');
                    else :
                        $response->redirect('dang-nhap');
                    endif;
                endif;
            else :
                Session::flash('msg', 'Vui lòng nhập tất cả dữ liệu');
                Session::flash('msg_type', 'danger');
            endif;

        endif;

        $this->data['body'] = 'auth/login';
        $this->data['title'] = 'Đăng nhập Chance';
        $this->data['msg'] = Session::flash('msg');
        $this->data['msgType'] = Session::flash('msg_type');
        $this->data['dataView']['errors'] = Session::flash('chance_session_errors');
        $this->data['dataView']['old'] = Session::flash('chance_session_old');
        $this->render('layouts/auth', $this->data, '');
    }

    // Xử lý login
    public function employerLogin()
    {
    $request = new Request();
    $response = new Response();

    if (isLogin()) :
        $response->redirect('ntd');
    endif;

    if ($request->isPost()) : // Kiểm tra post
        $request->rules([
            'email' => 'required',
            'password' => 'required',
        ]);

        $request->message([
            'email.required' => 'Email không được để trống',
            'password.required' => 'Mật khẩu không được để trống',
        ]);

        $validate = $request->validate();

        if ($validate) :
            $data = $request->getFields();

            if (!empty($data)) :
                $username = $data['email'];
                $password = $data['password'];

                $result = $this->authModel->handleLogin($username, $password);

                if ($result) :
                    $response->redirect('trang-chu');
                else :
                    $response->redirect('dang-nhap');
                endif;
            endif;
        else :
            Session::flash('msg', 'Vui lòng nhập tất cả dữ liệu');
            Session::flash('msg_type', 'danger');
        endif;

    endif;

    $this->data['body'] = 'auth/employer.login';
    $this->data['title'] = 'Đăng nhập nhà tuyển dụng';
    $this->data['msg'] = Session::flash('msg');
    $this->data['msgType'] = Session::flash('msg_type');
    $this->data['dataView']['old'] = Session::flash('chance_session_old');
    $this->render('layouts/employer.auth', $this->data, '');
    }

    // Xử lý register
    public function register()
    {
        $request = new Request();
        $response = new Response();

        if (isLogin()) :
            $response->redirect('trang-chu');
        endif;

        if ($request->isPost()) : // Kiểm tra post
            $request->rules([
                'fullname' => 'required|min:5',
                'email' => 'required|email|min:11|unique:candidates:email',
                'password' => 'required|min:8|special',
                're_password' => 'required|match:password'
            ]);

            $request->message([
                'fullname.required' => 'Họ tên không được để trống',
                'fullname.min' => 'Họ tên phải lớn hơn 4 ký tự',
                'email.required' => 'Email không được để trống',
                'email.email' => 'Định dạng email không hợp lệ',
                'email.min' => 'Email phải lớn hơn 11 ký tự',
                'email.unique' => 'Email đã tồn tại',
                'password.required' => 'Mật khẩu không được để trống',
                'password.min' => 'Mật khẩu phải lớn hơn 7 ký tự',
                'password.special' => 'Mật khẩu phải có ít nhất 1 ký tự hoa và 1 ký tự đặc biệt',
                're_password.required' => 'Mật khẩu không được để trống',
                're_password.match' => 'Mật khẩu không trùng khớp',
            ]);

            $validate = $request->validate();

            if ($validate) :
                $result = $this->authModel->handleRegister();

                if ($result) :
                    $response->redirect('dang-nhap');
                else :
                    $response->redirect('dang-ky');
                endif;
            else :
                Session::flash('msg', 'Vui lòng kiểm tra toàn bộ dữ liệu');
                Session::flash('msg_type', 'danger');
            endif;

        endif;

        $this->data['body'] = 'auth/register';
        $this->data['title'] = 'Đăng ký Chance';
        $this->data['dataView']['msg'] = Session::flash('msg');
        $this->data['dataView']['msgType'] = Session::flash('msg_type');
        $this->data['dataView']['errors'] = Session::flash('chance_session_errors');
        $this->data['dataView']['old'] = Session::flash('chance_session_old');
        $this->render('layouts/auth', $this->data, '');
    }

    // Xử lý register
    public function employerRegister()
    {
        $request = new Request();
        $response = new Response();

        if (isLogin()) :
            $response->redirect('ntd');
        endif;

        if ($request->isPost()) : // Kiểm tra post
            $request->rules([
                'fullname' => 'required|min:5',
                'email' => 'required|email|min:11|unique:candidates:email',
                'password' => 'required|min:8|special',
                're_password' => 'required|match:password'
            ]);

            $request->message([
                'fullname.required' => 'Họ tên không được để trống',
                'fullname.min' => 'Họ tên phải lớn hơn 4 ký tự',
                'email.required' => 'Email không được để trống',
                'email.email' => 'Định dạng email không hợp lệ',
                'email.min' => 'Email phải lớn hơn 11 ký tự',
                'email.unique' => 'Email đã tồn tại',
                'password.required' => 'Mật khẩu không được để trống',
                'password.min' => 'Mật khẩu phải lớn hơn 7 ký tự',
                'password.special' => 'Mật khẩu phải có ít nhất 1 ký tự hoa và 1 ký tự đặc biệt',
                're_password.required' => 'Mật khẩu không được để trống',
                're_password.match' => 'Mật khẩu không trùng khớp',
            ]);

            $validate = $request->validate();

            if ($validate) :
                $result = $this->authModel->handleRegister();

                if ($result) :
                    $response->redirect('dang-nhap');
                else :
                    $response->redirect('dang-ky');
                endif;
            else :
                Session::flash('msg', 'Vui lòng kiểm tra toàn bộ dữ liệu');
                Session::flash('msg_type', 'danger');
            endif;

        endif;

        $this->data['body'] = 'auth/employer.register';
        $this->data['title'] = 'Đăng ký nhà tuyển dụng';
        $this->data['dataView']['msg'] = Session::flash('msg');
        $this->data['dataView']['msgType'] = Session::flash('msg_type');
        $this->data['dataView']['errors'] = Session::flash('chance_session_errors');
        $this->data['dataView']['old'] = Session::flash('chance_session_old');
        $this->render('layouts/employer.auth', $this->data, '');
    }

    public function active()
    {
        $token = $_GET['token'];

        if (!empty($token)) :
            $result = $this->authModel->handleActiveAccount($token);

            if ($result) :
                $response = [
                    'message' => 'Tạo tài khoản thành công'
                ];
            else :
                $response = [
                    'message' => 'Tạo tài khoản thất bại'
                ];
            endif;

        endif;
    }

    public function logout()
    {
        $response = new Response();

        if (!empty(Session::data('user_data')['id'])) :
            $userId = Session::data('user_data')['id'];
            $groupId = Session::data('user_data')['group_id'];
        endif;

        if (!empty($userId) && !empty($groupId)) :
            $result = $this->authModel->handleLogout($userId, $groupId);

            if ($result) :
                $response->redirect('trang-chu');
            endif;
        endif;
    }

    public function forgot()
    {
        $request = new Request();
        $response = new Response();

        if ($request->isPost()) :
            $data = $request->getFields();
            $email = $data['email'];

            $request->rules([
                'email' => 'required',
            ]);

            $request->message([
                'email.required' => 'Email không được để trống',
            ]);

            $validate = $request->validate();

            if ($validate && !empty($email)) :
                $result = $this->authModel->handleForgotPassword($email);

                if ($result) :
                    Session::flash('msg', 'Truy cập vào email của bạn để tiến hành đặt lại mật khẩu');
                    Session::flash('msg_type', 'success');
                endif;
            else :
                Session::flash('msg', 'Vui lòng kiểm tra toàn bộ dữ liệu');
                Session::flash('msg_type', 'danger');
            endif;
        endif;

        $this->data['body'] = 'auth/forgot';
        $this->data['title'] = 'Lấy lại mật khẩu';
        $this->data['msg'] = Session::flash('msg');
        $this->data['msgType'] = Session::flash('msg_type');
        $this->data['dataView']['errors'] = Session::flash('chance_session_errors');
        $this->data['dataView']['old'] = Session::flash('chance_session_old');
        $this->render('layouts/auth', $this->data, '');
    }

    public function check()
    {
        $response = new Response();
        $token = $_GET['token'];

        if (!empty($token)) :
            $result = $this->authModel->handleConfirmForgotToken($token);

            if (is_numeric($result)) :
                $response->redirect('reset?id=' . $result);
            endif;
        endif;
    }

    public function reset()
    {
        $request = new Request();
        $response = new Response();

        $userId = $_GET['id'];

        if ($request->isPost()) :
            $request->rules([
                'password' => 'required|min:8|special',
                're_password' => 'required|match:password'
            ]);

            $request->message([
                'password.required' => 'Mật khẩu không được để trống',
                'password.min' => 'Mật khẩu phải lớn hơn 7 ký tự',
                'password.special' => 'Mật khẩu phải có ít nhất 1 ký tự hoa và 1 ký tự đặc biệt',
                're_password.required' => 'Mật khẩu không được để trống',
                're_password.match' => 'Mật khẩu không trùng khớp',
            ]);

            $validate = $request->validate();

            if ($validate && !empty($userId)) :
                $result = $this->authModel->handleResetPassword($userId);

                if ($result) :
                    $response->redirect('dang-nhap');
                endif;
            else :
                Session::flash('msg', 'Vui lòng kiểm tra toàn bộ dữ liệu');
                Session::flash('msg_type', 'danger');
            endif;
        endif;

        $this->data['body'] = 'auth/reset';
        $this->data['title'] = 'Đặt lại mật khẩu';
        $this->data['msg'] = Session::flash('msg');
        $this->data['msgType'] = Session::flash('msg_type');
        $this->data['dataView']['errors'] = Session::flash('chance_session_errors');
        $this->data['dataView']['old'] = Session::flash('chance_session_old');
        $this->render('layouts/auth', $this->data, '');
    }
}
