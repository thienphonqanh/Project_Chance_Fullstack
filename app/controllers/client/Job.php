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
        $request = new Request();
        $data = $request->getFields();

        $filters = [];
        $keyword = [];

        if (!empty($data)) :
            extract($data);

            if (!empty($job_title) || !empty($job_location)) :
                $keyword = [
                    'job_title' => $job_title,
                    'job_location' => $job_location
                ];
            endif;

            if (isset($time_working)) :
                if ($time_working === 'fulltime') :
                    $filters['form_work'] = $time_working = 'Toàn thời gian cố định';
                elseif ($time_working === 'parttime') :
                    $filters['form_work'] = $time_working = 'Bán thời gian cố định';
                endif;
            endif;

            if (isset($job_exp)) :
                switch ($job_exp):
                    case 'no_exp':
                        $filters['exp_required'] = $job_exp = 'Chưa có kinh nghiệm';
                        break;
                    case 'less_one':
                        $filters['exp_required'] = $job_exp = 'Dưới 1 năm';
                        break;
                    case 'one':
                        $filters['exp_required'] = $job_exp = '1 năm';
                        break;
                    case 'two':
                        $filters['exp_required'] = $job_exp = '2 năm';
                        break;
                    case 'three':
                        $filters['exp_required'] = $job_exp = '3 năm';
                        break;
                    case 'four':
                        $filters['exp_required'] = $job_exp = '4 năm';
                        break;
                    case 'five':
                        $filters['exp_required'] = $job_exp = '5 năm';
                        break;
                    case 'over_five':
                        $filters['exp_required'] = $job_exp = 'Trên 5 năm';
                        break;
                endswitch;
            endif;

            if (isset($job_field) && $job_field != 0) :
                $filters['job_category_id'] = $job_field;
            endif;
        endif;

        $result = $this->jobModel->handleGetListJob($filters, $keyword ?? '');

        if (!empty($result)) :
            $listJob = $result;
            $quantityJob = count($listJob);
            $this->data['dataView']['listJob'] = $listJob;
            $this->data['dataView']['quantityJob'] = $quantityJob;
        endif;

        $jobField = $this->jobModel->handleGetJobField();

        if (!empty($jobField)) :
            $this->data['dataView']['jobField'] = $jobField;
        endif;

        $this->data['body'] = 'client/job/index';
        $this->data['dataView']['request'] = $request;
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