<?php
class Group extends Controller {
    private $authModel;
    private $data = [];

    public function __construct() {

    }

    public function getPersonnel() {
        $this->data['body'] = 'admin/groups/index';
        
        $this->render('dashboard/index', $this->data, 'admin');
    }
   
}