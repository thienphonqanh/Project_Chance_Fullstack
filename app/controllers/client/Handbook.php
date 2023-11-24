<?php
class Handbook extends Controller {
    private $data = [];

    public function __construct() {

    }

    public function index() {
        $this->data['body'] = 'client/handbook/index';
        $this->data['page'] = 'handbook-page';
        $this->render('layouts/handbook.layout', $this->data, 'client');
    }

    public function firstPage() {
        $this->data['body'] = 'client/handbook/first_page';
        $this->data['page'] = 'la-ban-su-nghiep-page';
        $this->render('layouts/handbook.layout', $this->data, 'client');
    }

    public function secondPage() {
        $this->data['body'] = 'client/handbook/second_page';
        $this->data['page'] = 'tram-sac-ky-nang-page';
        $this->render('layouts/handbook.layout', $this->data, 'client');
    }

    public function thirdPage() {
        $this->data['body'] = 'client/handbook/third_page';
        $this->data['page'] = 'toa-do-nhan-tai-page';
        $this->render('layouts/handbook.layout', $this->data, 'client');
    }
   
    public function fourthPage() {
        $this->data['body'] = 'client/handbook/fourth_page';
        $this->data['page'] = 'ki-ot-vui-ve-page';
        $this->render('layouts/handbook.layout', $this->data, 'client');
    }
   
   
}