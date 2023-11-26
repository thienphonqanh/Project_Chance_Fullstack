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
        $jobId = getJobId();

        if (!empty($jobId)) :
            $result = $this->jobModel->handleGetDetail($jobId);

            if (!empty($result)) :
                $dataDetail = $result;
                $this->data['dataView']['dataDetail'] = $dataDetail;
            endif;
        endif;

        $this->data['body'] = 'client/job/detail';
        $this->render('layouts/main.layout', $this->data, 'client');
    }
}
