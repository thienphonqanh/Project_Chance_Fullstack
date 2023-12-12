<?php
class Contact extends Controller
{
    private $data = [];
    private $contactModel;
    private $config = [];

    public function __construct()
    {
        global $config;
        $this->config = $config['app'];
        $this->contactModel = $this->model('ContactModel', 'admin');
    }

    public function getListContact()
    {
        $request = new Request();
        $data = $request->getFields();

        $filters = [];

        if (!empty($data)) :
            extract($data);

            if (isset($status)) :
                switch ($status):
                    case 'active':
                        $filters['contacts.status'] = $status = 1;
                        break;
                    case 'inactive':
                        $filters['contacts.status'] = $status = 0;
                        break;
                    case 'unactive':
                        $filters['contacts.status'] = $status = 2;
                        break;
                endswitch;
            endif;
        endif;

        $resultPaginate = $this->contactModel->handleGetListContact($filters, $keyword ?? '', $this->config['page_limit']);

        $result = $resultPaginate['data'];

        $links = $resultPaginate['link'];

        if (!empty($result)):
            $listContact = $result;

            $this->data['dataView']['listContact'] = $listContact;
        endif;
         

        $this->data['body'] = 'admin/contacts/index';
        $this->data['dataView']['request'] = $request;
        $this->data['dataView']['links'] = $links;
        $this->render('layouts/layout', $this->data, 'admin');
    }
}
