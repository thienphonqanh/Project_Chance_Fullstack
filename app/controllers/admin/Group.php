<?php
class Group extends Controller {
    private $authModel;
    private $data = [];

    public function __construct() {
        // $this->authModel = $this->model('AuthModel');

    }

    // public function index() {
    //     $this->data['body'] = 'groups/index';
        
    //     $this->render('dashboard/layout', $this->data);
    // }

    public function getPersonnel() {
        $this->data['body'] = 'admin/groups/index';
        
        $this->render('dashboard/index', $this->data, 'admin');
    }
   
}