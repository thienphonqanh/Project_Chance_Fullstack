<?php
class Home extends Controller
{
    private $homeModel;
    private $data = [];

    public function __construct()
    {
        $this->homeModel = $this->model('HomeModel', 'admin');

    }

    public function index()
    {   
        $jobCategory = $this->homeModel->handleGetJobCategory();

        if (!empty($jobCategory)):
            $this->data['dataView']['jobCategory'] = $jobCategory;
        endif;

        $this->data['body'] = 'client/home/index';
        $this->render('layouts/main.layout', $this->data, 'client');
    }
}
