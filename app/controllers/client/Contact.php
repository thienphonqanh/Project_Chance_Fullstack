<?php
class Contact extends Controller {
    private $data = [];

    public function __construct() {

    }

    public function index() {
        $this->data['body'] = 'client/contact/index';
        $this->data['dataView'][''] = '';
        $this->render('layouts/main.layout', $this->data, 'client');
    }

   
   
}