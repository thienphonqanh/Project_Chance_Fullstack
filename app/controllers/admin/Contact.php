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

    public function changeStatus()
    {
        $request = new Request();
        $response = new Response();

        $data = $request->getFields();

        if (!empty($data['id']) && !empty($data['action'])) :
            $userId = $data['id'];
            $action = $data['action'];

            $result = $this->contactModel->handleChangeStatus($userId, $action); // Gọi xử lý ở Model

            if ($result) :
                $response->redirect('contacts/danh-sach');
            endif;

        endif;
    }

    public function delete()
    {
        $request = new Request();
        $response = new Response();

        $data = $request->getFields();

        if (!empty($data)) :
            $itemsToDelete = isset($data['item']) ? $data['item'] : [];
            $itemsToDelete = implode(',', $itemsToDelete);

            $result = $this->contactModel->handleDelete($itemsToDelete);

            if ($result) :
                $response->redirect('contacts/danh-sach');
            endif;
        endif;
    }

}
