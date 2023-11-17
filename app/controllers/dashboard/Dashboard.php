<?php
class Dashboard extends Controller {
    private $authModel;
    private $data = [];

    public function __construct() {
        // $this->authModel = $this->model('AuthModel');

    }

    public function index() {
        $this->data['body'] = 'users/index';
        
        $this->render('admin/layout', $this->data);
    }

   
}