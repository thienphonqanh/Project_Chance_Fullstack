<?php
class Group extends Controller
{
    private $groupModel;
    private $data = [];
    private $config = [];

    public function __construct()
    {
        global $config;
        $this->config = $config['app'];
        $this->groupModel = $this->model('GroupModel', 'admin');
    }

    public function getPersonnel()
    {
        $request = new Request();
        $query = $request->getFields();

        $filters = [];

        if (!empty($query)) :
            extract($query);

            if (isset($status)) :
                if ($status == 'active' || $status == 'inactive') :
                    $filters['status'] = $status == 'active' ? 1 : 0;
                endif;
            endif;
        endif;

        $resultPaginate = $this->groupModel->handleGetPersonnel($filters, $keyword ?? '', $this->config['page_limit']);

        $result = $resultPaginate['data'];

        $links = $resultPaginate['link'];

        if (!empty($result)) :
            $listPersonnel = $result;
            $this->data['dataView']['listPersonnel'] = $listPersonnel;
        else :
            $emtyValue = 'Không có dữ liệu';
            $this->data['dataView']['emptyValue'] = $emtyValue;
        endif;

        $this->data['body'] = 'admin/groups/personnel';
        $this->data['dataView']['request'] = $request;
        $this->data['dataView']['links'] = $links;
        $this->render('layouts/layout', $this->data, 'admin');
    }

    public function getCandidate()
    {
        $request = new Request();
        $query = $request->getFields();

        $filters = [];

        if (!empty($query)) :
            extract($query);

            if (isset($status)) :
                if ($status == 'active' || $status == 'inactive') :
                    $filters['status'] = $status == 'active' ? 1 : 0;
                endif;
            endif;
        endif;

        $resultPaginate = $this->groupModel->handleGetCandidate($filters, $keyword ?? '', $this->config['page_limit']);

        $result = $resultPaginate['data'];

        $links = $resultPaginate['link'];

        if (!empty($result)) :
            $listCandidate = $result;
            $this->data['dataView']['listCandidate'] = $listCandidate;
        else :
            $emtyValue = 'Không có dữ liệu';
            $this->data['dataView']['emptyValue'] = $emtyValue;
        endif;

        $this->data['body'] = 'admin/groups/candidate';
        $this->data['dataView']['request'] = $request;
        $this->data['dataView']['links'] = $links;
        $this->render('layouts/layout', $this->data, 'admin');
    }

    // Xem thông tin cá nhân của ứng viên
    public function viewProfilePersonnel()
    {
        $request = new Request();

        $data = $request->getFields();

        if (!empty($data['id'])) :
            $userId = $data['id'];

            $result = $this->groupModel->handleViewProfilePersonnel($userId);

            if (!empty($result)) :
                $dataProfile = $result;
                $this->data['dataView']['dataProfile'] = $dataProfile;
            else :
                $emtyValue = 'Không có dữ liệu';
                $this->data['dataView']['emptyValue'] = $emtyValue;
            endif;
        endif;


        $this->data['body'] = 'admin/profile/personnel';
        $this->render('layouts/layout', $this->data, 'admin');
    }


    // Xem thông tin cá nhân của ứng viên
    public function viewProfileCandidate()
    {
        $request = new Request();

        $data = $request->getFields();

        if (!empty($data['id'])) :
            $userId = $data['id'];

            $result = $this->groupModel->handleViewProfileCandidate($userId);

            if (!empty($result)) :
                $dataProfile = $result;
                $this->data['dataView']['dataProfile'] = $dataProfile;
            else :
                $emtyValue = 'Không có dữ liệu';
                $this->data['dataView']['emptyValue'] = $emtyValue;
            endif;
        endif;


        $this->data['body'] = 'admin/profile/candidate';
        $this->render('layouts/layout', $this->data, 'admin');
    }

    // Sửa thông tin cá nhân của user
    public function updateProfilePersonnel()
    {
        $request = new Request();

        $data = $request->getFields();
        $userId = $_GET['id'];

        $checkOld = $this->groupModel->handleGetOldPersonnel($userId);
        $oldEmail = $checkOld['email'];
        $oldPhone = $checkOld['phone'];

        if ($request->isPost()) :
            if (
                !empty($oldEmail) && (!empty($oldPhone))
                && $oldEmail == $data['email'] && $oldPhone == $data['phone']
            ) :
                $request->rules([
                    'fullname' => 'required|min:5',
                    'email' => 'required|email|min:11',
                    'phone' => 'required|phone',
                    'dob' => 'required'
                ]);

                $request->message([
                    'fullname.required' => 'Họ tên không được để trống',
                    'fullname.min' => 'Họ tên phải lớn hơn 4 ký tự',
                    'email.required' => 'Email không được để trống',
                    'email.email' => 'Định dạng email không hợp lệ',
                    'email.min' => 'Email phải lớn hơn 11 ký tự',
                    'phone.required' => 'Số điện thoại không được để trống',
                    'phone.phone' => 'Số điện thoại không hợp lệ',
                    'dob.required' => 'Ngày sinh không được để trống',
                ]);

            elseif (
                !empty($oldEmail) && (!empty($oldPhone))
                && $oldEmail != $data['email'] && $oldPhone == $data['phone']
            ) :
                $request->rules([
                    'fullname' => 'required|min:5',
                    'email' => 'required|email|min:11|unique:candidates:email',
                    'phone' => 'required|phone',
                    'dob' => 'required'
                ]);

                $request->message([
                    'fullname.required' => 'Họ tên không được để trống',
                    'fullname.min' => 'Họ tên phải lớn hơn 4 ký tự',
                    'email.required' => 'Email không được để trống',
                    'email.email' => 'Định dạng email không hợp lệ',
                    'email.min' => 'Email phải lớn hơn 11 ký tự',
                    'email.unique' => 'Email đã tồn tại',
                    'phone.required' => 'Số điện thoại không được để trống',
                    'phone.phone' => 'Số điện thoại không hợp lệ',
                    'dob.required' => 'Ngày sinh không được để trống',
                ]);

            elseif (
                !empty($oldEmail) && (!empty($oldPhone))
                && $oldEmail == $data['email'] && $oldPhone != $data['phone']
            ) :
                $request->rules([
                    'fullname' => 'required|min:5',
                    'email' => 'required|email|min:11',
                    'phone' => 'required|phone|unique:candidates:phone',
                    'dob' => 'required'
                ]);

                $request->message([
                    'fullname.required' => 'Họ tên không được để trống',
                    'fullname.min' => 'Họ tên phải lớn hơn 4 ký tự',
                    'email.required' => 'Email không được để trống',
                    'email.email' => 'Định dạng email không hợp lệ',
                    'email.min' => 'Email phải lớn hơn 11 ký tự',
                    'phone.required' => 'Số điện thoại không được để trống',
                    'phone.phone' => 'Số điện thoại không hợp lệ',
                    'phone.unique' => 'Số điện thoại đã tồn tại',
                    'dob.required' => 'Ngày sinh không được để trống',
                ]);

            else :
                $request->rules([
                    'fullname' => 'required|min:5',
                    'email' => 'required|email|min:11|unique:candidates:email',
                    'phone' => 'required|phone|unique:candidates:phone',
                    'dob' => 'required'
                ]);

                $request->message([
                    'fullname.required' => 'Họ tên không được để trống',
                    'fullname.min' => 'Họ tên phải lớn hơn 4 ký tự',
                    'email.required' => 'Email không được để trống',
                    'email.email' => 'Định dạng email không hợp lệ',
                    'email.min' => 'Email phải lớn hơn 11 ký tự',
                    'email.unique' => 'Email đã tồn tại',
                    'phone.required' => 'Số điện thoại không được để trống',
                    'phone.phone' => 'Số điện thoại không hợp lệ',
                    'phone.unique' => 'Số điện thoại đã tồn tại',
                    'dob.required' => 'Ngày sinh không được để trống',
                ]);
            endif;

            $validate = $request->validate();

            if ($validate) :
                if (!empty($userId)) :
                    $resultUpdate = $this->groupModel->handleUpdateProfilePersonnel($userId);
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
            $result = $this->groupModel->handleViewProfilePersonnel($userId);

            if (!empty($result)) :
                $dataProfile = $result;
                $this->data['dataView']['dataProfile'] = $dataProfile;
            else :
                $emtyValue = 'Không có dữ liệu';
                $this->data['dataView']['emptyValue'] = $emtyValue;
            endif;
        endif;

        $this->data['body'] = 'admin/profile/personnel_edit';
        $this->data['dataView']['msg'] = Session::flash('msg');
        $this->data['dataView']['msgType'] = Session::flash('msg_type');
        $this->data['dataView']['errors'] = Session::flash('chance_session_errors');
        $this->data['dataView']['old'] = Session::flash('chance_session_old');
        $this->render('layouts/layout', $this->data, 'admin');
    }


    // Sửa thông tin cá nhân của user
    public function updateProfileCandidate()
    {
        $request = new Request();

        $data = $request->getFields();
        $userId = $_GET['id'];

        $checkOld = $this->groupModel->handleGetOldCandidate($userId);
        $oldEmail = $checkOld['email'];
        $oldPhone = $checkOld['phone'];

        if ($request->isPost()) :
            if (
                !empty($oldEmail) && (!empty($oldPhone))
                && $oldEmail == $data['email'] && $oldPhone == $data['phone']
            ) :
                $request->rules([
                    'fullname' => 'required|min:5',
                    'email' => 'required|email|min:11',
                    'phone' => 'required|phone',
                    'dob' => 'required'
                ]);

                $request->message([
                    'fullname.required' => 'Họ tên không được để trống',
                    'fullname.min' => 'Họ tên phải lớn hơn 4 ký tự',
                    'email.required' => 'Email không được để trống',
                    'email.email' => 'Định dạng email không hợp lệ',
                    'email.min' => 'Email phải lớn hơn 11 ký tự',
                    'phone.required' => 'Số điện thoại không được để trống',
                    'phone.phone' => 'Số điện thoại không hợp lệ',
                    'dob.required' => 'Ngày sinh không được để trống',
                ]);

            elseif (
                !empty($oldEmail) && (!empty($oldPhone))
                && $oldEmail != $data['email'] && $oldPhone == $data['phone']
            ) :
                $request->rules([
                    'fullname' => 'required|min:5',
                    'email' => 'required|email|min:11|unique:candidates:email',
                    'phone' => 'required|phone',
                    'dob' => 'required'
                ]);

                $request->message([
                    'fullname.required' => 'Họ tên không được để trống',
                    'fullname.min' => 'Họ tên phải lớn hơn 4 ký tự',
                    'email.required' => 'Email không được để trống',
                    'email.email' => 'Định dạng email không hợp lệ',
                    'email.min' => 'Email phải lớn hơn 11 ký tự',
                    'email.unique' => 'Email đã tồn tại',
                    'phone.required' => 'Số điện thoại không được để trống',
                    'phone.phone' => 'Số điện thoại không hợp lệ',
                    'dob.required' => 'Ngày sinh không được để trống',
                ]);

            elseif (
                !empty($oldEmail) && (!empty($oldPhone))
                && $oldEmail == $data['email'] && $oldPhone != $data['phone']
            ) :
                $request->rules([
                    'fullname' => 'required|min:5',
                    'email' => 'required|email|min:11',
                    'phone' => 'required|phone|unique:candidates:phone',
                    'dob' => 'required'
                ]);

                $request->message([
                    'fullname.required' => 'Họ tên không được để trống',
                    'fullname.min' => 'Họ tên phải lớn hơn 4 ký tự',
                    'email.required' => 'Email không được để trống',
                    'email.email' => 'Định dạng email không hợp lệ',
                    'email.min' => 'Email phải lớn hơn 11 ký tự',
                    'phone.required' => 'Số điện thoại không được để trống',
                    'phone.phone' => 'Số điện thoại không hợp lệ',
                    'phone.unique' => 'Số điện thoại đã tồn tại',
                    'dob.required' => 'Ngày sinh không được để trống',
                ]);

            else :
                $request->rules([
                    'fullname' => 'required|min:5',
                    'email' => 'required|email|min:11|unique:candidates:email',
                    'phone' => 'required|phone|unique:candidates:phone',
                    'dob' => 'required'
                ]);

                $request->message([
                    'fullname.required' => 'Họ tên không được để trống',
                    'fullname.min' => 'Họ tên phải lớn hơn 4 ký tự',
                    'email.required' => 'Email không được để trống',
                    'email.email' => 'Định dạng email không hợp lệ',
                    'email.min' => 'Email phải lớn hơn 11 ký tự',
                    'email.unique' => 'Email đã tồn tại',
                    'phone.required' => 'Số điện thoại không được để trống',
                    'phone.phone' => 'Số điện thoại không hợp lệ',
                    'phone.unique' => 'Số điện thoại đã tồn tại',
                    'dob.required' => 'Ngày sinh không được để trống',
                ]);
            endif;

            $validate = $request->validate();

            if ($validate) :
                if (!empty($userId)) :
                    $resultUpdate = $this->groupModel->handleUpdateProfileCandidate($userId);
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
            $result = $this->groupModel->handleViewProfileCandidate($userId);

            if (!empty($result)) :
                $dataProfile = $result;
                $this->data['dataView']['dataProfile'] = $dataProfile;
            else :
                $emtyValue = 'Không có dữ liệu';
                $this->data['dataView']['emptyValue'] = $emtyValue;
            endif;
        endif;

        $this->data['body'] = 'admin/profile/candidate_edit';
        $this->data['dataView']['msg'] = Session::flash('msg');
        $this->data['dataView']['msgType'] = Session::flash('msg_type');
        $this->data['dataView']['errors'] = Session::flash('chance_session_errors');
        $this->data['dataView']['old'] = Session::flash('chance_session_old');
        $this->render('layouts/layout', $this->data, 'admin');
    }

    // Xử lý trạng thái account
    public function changeStatusAccountCandidate()
    {
        $request = new Request();
        $response = new Response();

        $data = $request->getFields();

        if (!empty($data['id'])) :
            $userId = $data['id'];

            $result = $this->groupModel->handleChangeStatusAccountCandidate($userId); // Gọi xử lý ở Model

            if ($result) :
                $response->redirect('groups/ung-vien');
            endif;

        endif;
    }

    // Xử lý trạng thái account
    public function changeStatusAccountPersonnel()
    {
        $request = new Request();
        $response = new Response();

        $data = $request->getFields();

        if (!empty($data['id'])) :
            $userId = $data['id'];

            $result = $this->groupModel->handleChangeStatusAccountPersonnel($userId); // Gọi xử lý ở Model

            if ($result) :
                $response->redirect('groups/nhan-su');
            endif;

        endif;
    }

    // Xoá nhân sự
    public function deletePersonnel()
    {
        $request = new Request();
        $response = new Response();

        $data = $request->getFields();

        if (!empty($data)) :
            $itemsToDelete = isset($data['item']) ? $data['item'] : [];
            $itemsToDelete = implode(',', $itemsToDelete);


            $result = $this->groupModel->handleDeletePersonnel($itemsToDelete);

            if ($result) :
                $response->redirect('groups/nhan-su');
            endif;

        endif;
    }

    // Xoá ứng viên
    public function deleteCandidate()
    {
        $request = new Request();
        $response = new Response();

        $data = $request->getFields();

        if (!empty($data)) :
            $itemsToDelete = isset($data['item']) ? $data['item'] : [];
            $itemsToDelete = implode(',', $itemsToDelete);


            $result = $this->groupModel->handleDeleteCandidate($itemsToDelete);

            if ($result) :
                $response->redirect('groups/ung-vien');
            endif;

        endif;
    }
}
