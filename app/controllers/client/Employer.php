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
}
