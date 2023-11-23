<?php
class Group extends Controller {
    private $groupModel;
    private $data = [];
    private $config = [];

    public function __construct() {
        global $config;
        $this->config = $config[ 'app' ];
        $this->groupModel = $this->model('GroupModel', 'admin');
    }

    public function getPersonnel() {
        $request = new Request();
        $query = $request->getFields();

        if (!empty($query)):
            extract($query);
        endif;

        $resultPaginate = $this->groupModel->handleGetPersonnel($keyword ?? '', $this->config[ 'page_limit' ] );

        $result = $resultPaginate[ 'data' ];

        $links = $resultPaginate[ 'link' ];

        if (!empty($result)):
            $listPersonnel = $result;
            $this->data['dataView']['listPersonnel'] = $listPersonnel;
        else:
            $emtyValue = 'Không có dữ liệu';
            $this->data['dataView']['emptyValue'] = $emtyValue;
        endif;

        $this->data['body'] = 'admin/groups/personnel';
        $this->data['dataView']['request'] = $request;
        $this->data['dataView'][ 'links' ] = $links;
        $this->render('layouts/layout', $this->data, 'admin');
    }

    public function getCandidate() {
        $request = new Request();
        $query = $request->getFields();

        $filters = [];

        if (!empty($query)):
            extract($query);

            if (isset($status)):
                if ($status == 'active' || $status == 'inactive'):
                    $filters['status'] = $status == 'active' ? 1 : 0;
                endif;
            endif;
        endif;

        $resultPaginate = $this->groupModel->handleGetCandidate($filters, $keyword ?? '', $this->config[ 'page_limit' ] );

        $result = $resultPaginate[ 'data' ];

        $links = $resultPaginate[ 'link' ];

        if (!empty($result)):
            $listCandidate = $result;
            $this->data['dataView']['listCandidate'] = $listCandidate;
        else:
            $emtyValue = 'Không có dữ liệu';
            $this->data['dataView']['emptyValue'] = $emtyValue;
        endif;

        $this->data['body'] = 'admin/groups/candidate';
        $this->data['dataView']['request'] = $request;
        $this->data['dataView'][ 'links' ] = $links;
        $this->render('layouts/layout', $this->data, 'admin');
    }
   
}