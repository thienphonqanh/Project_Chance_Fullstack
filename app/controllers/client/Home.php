<?php
class Home extends Controller {
    private $data = [];

    public function __construct() {
        // $this->authModel = $this->model('AuthModel');

    }

    public function index() {
        $this->data['body'] = 'client/home/index';
        
        $this->render('layouts/main.layout', $this->data, 'client');
    }
   
}