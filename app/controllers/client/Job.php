<?php
class Job extends Controller
{
    private $jobModel;
    private $data = [];

    public function __construct()
    {
        $this->jobModel = $this->model('JobModel', 'admin');
    }

    public function index()
    {
        $result = $this->jobModel->handleGetListJob();

        if (!empty($result)) :
            $listJob = $result;
            $this->data['dataView']['listJob'] = $listJob;
        endif;

        $this->data['body'] = 'client/job/index';
        $this->render('layouts/main.layout', $this->data, 'client');
    }

    public function detail()
    {
        $jobId = getIdInURL('chi-tiet-viec-lam');

        if (!empty($jobId)) :
            $this->jobModel->handleSetViewCount($jobId);  // Tăng view 

            $result = $this->jobModel->handleGetDetail($jobId); // Lấy data detail
            
            if (!empty($result)) :
                $dataDetail = $result;
                $jobField = $dataDetail[0]['jobField'];

                $randomData = $this->jobModel->handleRandomData($jobField);

                $this->data['dataView']['dataDetail'] = $dataDetail;

                if (!empty($randomData)) :
                    $this->data['dataView']['randomData'] = $randomData;
                endif;
            endif;

           
        endif;

        $this->data['body'] = 'client/job/detail';
        $this->render('layouts/main.layout', $this->data, 'client');
    }



}
