<?php
class Dashboard extends Controller {
    private $authModel;
    private $data = [];

    public function __construct() {
        // $this->authModel = $this->model('AuthModel');

    }

    public function index() {
        $this->data['body'] = 'dashboard/index';
        $this->data['dataView'][''] = '';
        $this->render('layouts/layout', $this->data, 'admin');
    }

   
}