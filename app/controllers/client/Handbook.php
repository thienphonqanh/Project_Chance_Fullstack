<?php
class Handbook extends Controller
{
    private $handbookModel;
    private $data = [];

    public function __construct()
    {
        $this->handbookModel = $this->model('HandbookModel', 'admin');
    }

    public function index()
    {
        $this->data['body'] = 'client/handbook/index';
        $this->data['page'] = 'handbook-page';
        $this->data['dataView'][''] = '';
        $this->render('layouts/handbook.layout', $this->data, 'client');
    }

    public function detail()
    {
        $handbookId = getIdInURL('chi-tiet-bai-viet');

        if (!empty($handbookId)) :
            $this->handbookModel->handleSetViewCount($handbookId);  // Tăng view 

            $result = $this->handbookModel->handleGetDetail($handbookId); // Lấy data detail

            if (!empty($result)) :
                $dataDetail = $result;
                // $jobField = $dataDetail[0]['jobField'];

                // $randomData = $this->handbookModel->handleRandomData($jobField);

                $this->data['dataView']['dataDetail'] = $dataDetail;

                // if (!empty($randomData)) :
                //     $this->data['dataView']['randomData'] = $randomData;
                // endif;
            endif;


        endif;

        $this->data['body'] = 'client/handbook/detail';
        $this->data['page'] = 'handbook-detai-page';
        $this->render('layouts/handbook.layout', $this->data, 'client');
    }

    public function firstPage()
    {
        $this->data['body'] = 'client/handbook/first_page';
        $this->data['page'] = 'la-ban-su-nghiep-page';
        $this->data['dataView'][''] = '';
        $this->render('layouts/handbook.layout', $this->data, 'client');
    }

    public function secondPage()
    {
        $this->data['body'] = 'client/handbook/second_page';
        $this->data['page'] = 'tram-sac-ky-nang-page';
        $this->data['dataView'][''] = '';
        $this->render('layouts/handbook.layout', $this->data, 'client');
    }

    public function thirdPage()
    {
        $this->data['body'] = 'client/handbook/third_page';
        $this->data['page'] = 'toa-do-nhan-tai-page';
        $this->data['dataView'][''] = '';
        $this->render('layouts/handbook.layout', $this->data, 'client');
    }

    public function fourthPage()
    {
        $this->data['body'] = 'client/handbook/fourth_page';
        $this->data['page'] = 'ki-ot-vui-ve-page';
        $this->data['dataView'][''] = '';
        $this->render('layouts/handbook.layout', $this->data, 'client');
    }
}
