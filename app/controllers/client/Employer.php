<?php
class Employer extends Controller
{
    private $data = [];
    private $employerModel;

    public function __construct()
    {
        $this->employerModel = $this->model('EmployerModel', 'user');
    }

    public function index()
    {

        $this->data['body'] = 'client/ntd.home/index';
        $this->data['dataView'][''] = '';
        $this->render('layouts/ntd.layout', $this->data, 'client');
    }

    public function editEmployerInformation()
    {
        $request = new Request();

        $data = $request->getFields();
        $userId = getIdEmployerLogin();

        $checkOld = $this->employerModel->handleGetOldEmployer($userId);
        $oldEmail = $checkOld['email'];
        $oldPhone = $checkOld['phone'];
        $oldThumbnail = $checkOld['thumbnail'];

        if ($request->isPost()) :
            $uploadOk = 1;

            if (empty($_FILES['avatar-input']['full_path'])) :
                if (!empty($data['delete-image'])) :
                    $avatarPath = 'public/client/assets/images/4259794-200.png';
                    $uploadOk = 1;
                else :
                    if (!empty($oldThumbnail)) :
                        $avatarPath = $oldThumbnail;
                    else :
                        $avatarPath = 'public/client/assets/images/4259794-200.png';
                    endif;
                    $uploadOk = 1;
                endif;
            else :
                // Xử lý tệp được tải lên
                $targetDir = "app/uploads/avatar/"; // Thư mục để lưu trữ ảnh đại diện
                $targetFile = $targetDir . basename($_FILES["avatar-input"]["name"]);
                $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

                // Kiểm tra xem tệp có phải là ảnh hợp lệ hay không
                $check = getimagesize($_FILES["avatar-input"]["tmp_name"]);
                if ($check !== false) :
                    $uploadOk = 1;
                else :
                    Session::flash('msg', 'File không phải là ảnh');
                    Session::flash('msg_type', 'danger');
                    $uploadOk = 0;
                endif;

                // Kiểm tra kích thước tệp
                $sizeFile = 5 * 1024 * 1024; // 5MB
                if ($_FILES["avatar-input"]["size"] > $sizeFile) {
                    Session::flash('msg', 'Kích thước file quá lớn (yêu cầu tối đa 5MB)');
                    Session::flash('msg_type', 'danger');
                    $uploadOk = 0;
                }

                // Kiểm tra định dạng ảnh
                if (
                    $imageFileType != "jpg" && $imageFileType != "png"
                    && $imageFileType != "jpeg" && $imageFileType != "gif"
                ) {
                    Session::flash('msg', 'File không đúng định dạng ảnh (.jpg, .png, .jpeg, .gif)');
                    Session::flash('msg_type', 'danger');
                    $uploadOk = 0;
                }

                // Kiểm tra nếu có lỗi xảy ra
                if ($uploadOk == 0) :
                    Session::flash('msg', 'Hiện tại không thể upload file');
                    Session::flash('msg_type', 'danger');
                endif;
            endif;

            if (
                !empty($oldEmail) && (!empty($oldPhone))
                && $oldEmail == $data['email'] && $oldPhone == $data['phone']
            ) :
                $request->rules([
                    'fullname' => 'required|min:5',
                    'email' => 'required|email|min:11',
                    'phone' => 'required|phone',
                    'company_name' => 'required',
                    'job_field' => 'required',
                    'scales' => 'required',
                    'address' => 'required',
                ]);

                $request->message([
                    'fullname.required' => 'Họ tên không được để trống',
                    'fullname.min' => 'Họ tên phải lớn hơn 4 ký tự',
                    'email.required' => 'Email không được để trống',
                    'email.email' => 'Định dạng email không hợp lệ',
                    'email.min' => 'Email phải lớn hơn 11 ký tự',
                    'phone.required' => 'Số điện thoại không được để trống',
                    'phone.phone' => 'Định dạng số điện thoại không hợp lệ',
                    'company_name.required' => 'Tên công ty không được để trống',
                    'scales.required' => 'Quy mô không được để trống',
                    'job_field.required' => 'Lĩnh vực không được để trống',
                    'address.required' => 'Địa chỉ không được để trống',
                ]);

            elseif (
                !empty($oldEmail) && (!empty($oldPhone))
                && $oldEmail != $data['email'] && $oldPhone == $data['phone']
            ) :
                $request->rules([
                    'fullname' => 'required|min:5',
                    'email' => 'required|email|min:11|unique:companies:email',
                    'phone' => 'required|phone',
                    'company_name' => 'required',
                    'job_field' => 'required',
                    'scales' => 'required',
                    'address' => 'required',
                ]);

                $request->message([
                    'fullname.required' => 'Họ tên không được để trống',
                    'fullname.min' => 'Họ tên phải lớn hơn 4 ký tự',
                    'email.required' => 'Email không được để trống',
                    'email.email' => 'Định dạng email không hợp lệ',
                    'email.min' => 'Email phải lớn hơn 11 ký tự',
                    'email.unique' => 'Email đã tồn tại',
                    'phone.required' => 'Số điện thoại không được để trống',
                    'phone.phone' => 'Định dạng số điện thoại không hợp lệ',
                    'company_name.required' => 'Tên công ty không được để trống',
                    'scales.required' => 'Quy mô không được để trống',
                    'job_field.required' => 'Lĩnh vực không được để trống',
                    'address.required' => 'Địa chỉ không được để trống',
                ]);

            elseif (
                !empty($oldEmail) && (!empty($oldPhone))
                && $oldEmail == $data['email'] && $oldPhone != $data['phone']
            ) :
                $request->rules([
                    'fullname' => 'required|min:5',
                    'email' => 'required|email|min:11',
                    'phone' => 'required|phone|unique:companies:phone',
                    'company_name' => 'required',
                    'job_field' => 'required',
                    'scales' => 'required',
                    'address' => 'required',
                ]);

                $request->message([
                    'fullname.required' => 'Họ tên không được để trống',
                    'fullname.min' => 'Họ tên phải lớn hơn 4 ký tự',
                    'email.required' => 'Email không được để trống',
                    'email.email' => 'Định dạng email không hợp lệ',
                    'email.min' => 'Email phải lớn hơn 11 ký tự',
                    'phone.required' => 'Số điện thoại không được để trống',
                    'phone.phone' => 'Định dạng số điện thoại không hợp lệ',
                    'phone.unique' => 'Số điện thoại đã tồn tại',
                    'company_name.required' => 'Tên công ty không được để trống',
                    'scales.required' => 'Quy mô không được để trống',
                    'job_field.required' => 'Lĩnh vực không được để trống',
                    'address.required' => 'Địa chỉ không được để trống',
                ]);

            else :
                $request->rules([
                    'fullname' => 'required|min:5',
                    'email' => 'required|email|min:11|unique:companies:email',
                    'phone' => 'required|phone|unique:companies:phone',
                    'company_name' => 'required',
                    'job_field' => 'required',
                    'scales' => 'required',
                    'address' => 'required',
                ]);

                $request->message([
                    'fullname.required' => 'Họ tên không được để trống',
                    'fullname.min' => 'Họ tên phải lớn hơn 4 ký tự',
                    'email.required' => 'Email không được để trống',
                    'email.email' => 'Định dạng email không hợp lệ',
                    'email.min' => 'Email phải lớn hơn 11 ký tự',
                    'email.unique' => 'Email đã tồn tại',
                    'phone.required' => 'Số điện thoại không được để trống',
                    'phone.phone' => 'Định dạng số điện thoại không hợp lệ',
                    'phone.unique' => 'Số điện thoại đã tồn tại',
                    'company_name.required' => 'Tên công ty không được để trống',
                    'scales.required' => 'Quy mô không được để trống',
                    'job_field.required' => 'Lĩnh vực không được để trống',
                    'address.required' => 'Địa chỉ không được để trống',
                ]);
            endif;

            $validate = $request->validate();

            if ($validate && $uploadOk == 1) :
                if (!empty($userId)) :
                    if (!empty($targetFile)) :
                        if (move_uploaded_file($_FILES["avatar-input"]["tmp_name"], $targetFile)) :
                            // Cập nhật đường dẫn ảnh đại diện vào database
                            $avatarPath = $targetFile;
                        endif;
                    endif;

                    $resultUpdate = $this->employerModel->handleUpdateProfileEmployer($userId, $avatarPath);
                endif;

                if ($resultUpdate) :
                    Session::flash('msg', 'Thay đổi thành công');
                    Session::flash('msg_type', 'success');
                else :
                    Session::flash('msg', 'Thay đổi thất bại');
                    Session::flash('msg_type', 'danger');
                endif;
            else :
                Session::flash('msg', 'Vui lòng kiểm tra toàn bộ dữ liệu');
                Session::flash('msg_type', 'danger');
            endif;
        endif;

        if (!empty($userId)) :
            $result = $this->employerModel->handleGetEmployerInformation($userId);
            $jobField = $this->employerModel->handleGetJobField();

            if (!empty($result) && !empty($jobField)) :
                $information = $result;

                $this->data['dataView']['information'] = $information;
                $this->data['dataView']['jobField'] = $jobField;
            endif;
        endif;

        $this->data['body'] = 'client/ntd.profile/employer_information';
        $this->data['dataView']['msg'] = Session::flash('msg');
        $this->data['dataView']['msgType'] = Session::flash('msg_type');
        $this->data['dataView']['errors'] = Session::flash('chance_session_errors');
        $this->data['dataView']['old'] = Session::flash('chance_session_old');
        $this->render('layouts/ntd.layout', $this->data, 'client');
    }
}
