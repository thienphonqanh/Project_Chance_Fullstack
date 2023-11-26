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

            if ($result) :
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
}