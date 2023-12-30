<?php
class Dashboard extends Controller
{
    private $data = [];

    public function __construct()
    {
    }

    public function index()
    {
        $response = new Response();

        if (!isLogin()) :
            $response->redirect('trang-chu');
        endif;

        if (!isUser()) :
            $this->data['body'] = 'dashboard/index';
            $this->data['dataView'][''] = '';
            $this->render('layouts/layout', $this->data, 'admin');
        else :
            $response->redirect('trang-chu');
        endif;
    }
}
