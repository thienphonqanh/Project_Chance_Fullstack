<?php
class Job extends Controller
{
    private $jobModel;
    private $data = [];
    private $config = [];

    public function __construct()
    {
        global $config;
        $this->config = $config['app'];
        $this->jobModel = $this->model('JobModel', 'admin');
    }

    public function getListJob()
    {
        $request = new Request();
        $data = $request->getFields();

        $filters = [];

        if (!empty($data)) :
            extract($data);

            if (isset($status)) :
                switch ($status):
                    case 'active':
                        $filters['status'] = $status = 1;
                        break;
                    case 'inactive':
                        $filters['status'] = $status = 0;
                        break;
                    case 'unactive':
                        $filters['status'] = $status = 2;
                        break;
                endswitch;
            endif;
        endif;

        $resultPaginate = $this->jobModel->handleGetListJobDashboard($filters, $keyword ?? '', $this->config['page_limit']);

        $result = $resultPaginate['data'];

        $links = $resultPaginate['link'];

        if (!empty($result)) :
            $listJob = $result;
            $this->data['dataView']['listJob'] = $listJob;
        else :
            $emtyValue = 'Không có dữ liệu';
            $this->data['dataView']['emptyValue'] = $emtyValue;
        endif;

        $this->data['body'] = 'admin/jobs/index';
        $this->data['dataView']['request'] = $request;
        $this->data['dataView']['links'] = $links;
        $this->render('layouts/layout', $this->data, 'admin');
    }

    // Thay đổi trạng thái việc làm
    public function changeStatus()
    {
        $request = new Request();
        $response = new Response();

        $data = $request->getFields();

        if (!empty($data['id']) && !empty($data['action'])) :
            $userId = $data['id'];
            $action = $data['action'];

            $result = $this->jobModel->handleChangeStatus($userId, $action); // Gọi xử lý ở Model

            if ($result) :
                $response->redirect('jobs/danh-sach');
            endif;

        endif;
    }

    // Xoá việc làm
    public function delete()
    {
        $request = new Request();
        $response = new Response();

        $data = $request->getFields();

        if (!empty($data)) :
            $itemsToDelete = isset($data['item']) ? $data['item'] : [];
            $itemsToDelete = implode(',', $itemsToDelete);

            $result = $this->jobModel->handleDelete($itemsToDelete);
            
            if ($result):
                $response->redirect('jobs/danh-sach');
            endif;
        endif;
    }
    

    // Xem thông tin của việc làm
    public function viewJob()
    {
        $request = new Request();

        $data = $request->getFields();

        if (!empty($data['id'])) :
            $jobId = $data['id'];

            $result = $this->jobModel->handleViewJob($jobId);

            if (!empty($result)) :
                $dataJob = $result;
                $this->data['dataView']['dataJob'] = $dataJob;
            else :
                $emtyValue = 'Không có dữ liệu';
                $this->data['dataView']['emptyValue'] = $emtyValue;
            endif;
        endif;


        $this->data['body'] = 'admin/jobs/detail';
                $this->data['dataView'][''] = '';
        $this->render('layouts/layout', $this->data, 'admin');
    }

    // Xem thông tin của việc làm
    public function updateJob()
    {
        $request = new Request();

        $data = $request->getFields();
        $jobId = $_GET['id'];
        $checkOld = $this->jobModel->handleGetOld($jobId);
        $oldThumbnail = $checkOld['thumbnail'];

        if ($request->isPost()) :
            $uploadOk = 1;

            if (empty($_FILES['avatar-input']['full_path'])):
                if (!empty($data['delete-image'])):
                    $avatarPath = 'public/client/assets/images/default_image.jpg';
                    $uploadOk = 1;
                else:
                    if (!empty($oldThumbnail)) :
                        $avatarPath = $oldThumbnail;
                    else:
                        $avatarPath = 'public/client/assets/images/default_image.jpg';
                    endif;
                    $uploadOk = 1;
                endif;
            else:
                // Xử lý tệp được tải lên
                $targetDir = "app/uploads/job/"; // Thư mục để lưu trữ ảnh đại diện
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
                if ($imageFileType != "jpg" && $imageFileType != "png" 
                    && $imageFileType != "jpeg" && $imageFileType != "gif") {
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

            $request->rules([
                'title' => 'required',
                'company_name' => 'required',
                'slug' => 'required',
                'form_work' => 'required',
                'job_field' => 'required',
                'location' => 'required',
                'salary' => 'required',
                'deadline' => 'required',
                'rank' => 'required',
                'degree_required' => 'required',
                'exp_required' => 'required',
                'number_recruits' => 'required',
                'requirement' => 'required',
                'description' => 'required',
                'welfare' => 'required',
            ]);

            $request->message([
                'title.required' => 'Tiêu đề không được để trống',
                'company_name.required' => 'Tên công ty không được để trống',
                'slug.required' => 'Đường dẫn không được để trống',
                'form_work.required' => 'Hình thức làm việc không được để trống',
                'job_field.required' => 'Lĩnh vực không được để trống',
                'location.required' => 'Địa điểm không được để trống',
                'salary.required' => 'Lương không được để trống',
                'deadline.required' => 'Thời hạn nộp không được để trống',
                'rank.required' => 'Cấp bậc không được để trống',
                'degree_required.required' => 'Yêu cầu bằng cấp không được để trống',
                'exp_required.required' => 'Yêu cầu kinh nghiệm không được để trống',
                'number_recruits.required' => 'Số lượng tuyển không được để trống',
                'requirement.required' => 'Yêu cầu công việc không được để trống',
                'description.required' => 'Mô tả công việc không được để trống',
                'welfare.required' => 'Phúc lợi không được để trống',
            ]);

            $validate = $request->validate();

            if ($validate && $uploadOk == 1) :
                if (!empty($jobId)) :
                    if (!empty($targetFile)):
                        if (move_uploaded_file($_FILES["avatar-input"]["tmp_name"], $targetFile)) :
                            // Cập nhật đường dẫn ảnh đại diện vào database
                            $avatarPath = $targetFile;
                        endif;
                    endif;

                    $resultUpdate = $this->jobModel->handleUpdateJob($jobId, $avatarPath);
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

        if (!empty($jobId)) :
            $result = $this->jobModel->handleViewJob($jobId);

            if (!empty($result)) :
                $dataJob = $result;
                $this->data['dataView']['dataJob'] = $dataJob;
            else :
                $emtyValue = 'Không có dữ liệu';
                $this->data['dataView']['emptyValue'] = $emtyValue;
            endif;
        endif;


        $this->data['body'] = 'admin/jobs/edit';
        $this->data['dataView']['msg'] = Session::flash('msg');
        $this->data['dataView']['msgType'] = Session::flash('msg_type');
        $this->data['dataView']['errors'] = Session::flash('chance_session_errors');
        $this->data['dataView']['old'] = Session::flash('chance_session_old');
        $this->render('layouts/layout', $this->data, 'admin');
    }

    // Xem thông tin của việc làm
    public function addJob()
    {
        $request = new Request();

        $data = $request->getFields();

        if ($request->isPost()) :
            $uploadOk = 1;

            if (empty($_FILES['avatar-input']['full_path'])):
                $avatarPath = 'public/client/assets/images/default_image.jpg';
            else:
                // Xử lý tệp được tải lên
                $targetDir = "app/uploads/job/"; // Thư mục để lưu trữ ảnh đại diện
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
                if ($imageFileType != "jpg" && $imageFileType != "png" 
                    && $imageFileType != "jpeg" && $imageFileType != "gif") {
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

            $request->rules([
                'title' => 'required',
                'company_name' => 'required',
                'slug' => 'required',
                'form_work' => 'required',
                'job_field' => 'required',
                'location' => 'required',
                'salary' => 'required',
                'deadline' => 'required',
                'rank' => 'required',
                'degree_required' => 'required',
                'exp_required' => 'required',
                'number_recruits' => 'required',
                'requirement' => 'required',
                'description' => 'required',
                'welfare' => 'required',
            ]);

            $request->message([
                'title.required' => 'Tiêu đề không được để trống',
                'company_name.required' => 'Tên công ty không được để trống',
                'slug.required' => 'Đường dẫn không được để trống',
                'form_work.required' => 'Hình thức làm việc không được để trống',
                'job_field.required' => 'Lĩnh vực không được để trống',
                'location.required' => 'Địa điểm không được để trống',
                'salary.required' => 'Lương không được để trống',
                'deadline.required' => 'Thời hạn nộp không được để trống',
                'rank.required' => 'Cấp bậc không được để trống',
                'degree_required.required' => 'Yêu cầu bằng cấp không được để trống',
                'exp_required.required' => 'Yêu cầu kinh nghiệm không được để trống',
                'number_recruits.required' => 'Số lượng tuyển không được để trống',
                'requirement.required' => 'Yêu cầu công việc không được để trống',
                'description.required' => 'Mô tả công việc không được để trống',
                'welfare.required' => 'Phúc lợi không được để trống',
            ]);

            $validate = $request->validate();

            if ($validate && $uploadOk == 1) :
                if (!empty($targetFile)):
                    if (move_uploaded_file($_FILES["avatar-input"]["tmp_name"], $targetFile)) :
                        // Cập nhật đường dẫn ảnh đại diện vào database
                        $avatarPath = $targetFile;
                    endif;
                endif;

                $result = $this->jobModel->handleAddJob($avatarPath);

                if ($result) :
                    Session::flash('msg', 'Thêm mới thành công');
                    Session::flash('msg_type', 'success');
                else :
                    Session::flash('msg', 'Thêm mới thất bại');
                    Session::flash('msg_type', 'danger');
                endif;
            else :
                Session::flash('msg', 'Vui lòng kiểm tra toàn bộ dữ liệu');
                Session::flash('msg_type', 'danger');
            endif;
        endif;


        $this->data['body'] = 'admin/jobs/add';
        $this->data['dataView']['msg'] = Session::flash('msg');
        $this->data['dataView']['msgType'] = Session::flash('msg_type');
        $this->data['dataView']['errors'] = Session::flash('chance_session_errors');
        $this->data['dataView']['old'] = Session::flash('chance_session_old');
        $this->render('layouts/layout', $this->data, 'admin');
    }
}