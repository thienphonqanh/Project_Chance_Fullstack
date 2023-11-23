<?php
class Group extends Controller {
    private $groupModel;
    private $data = [];

    public function __construct() {
        $this->groupModel = $this->model('GroupModel', 'admin');
    }

    public function getPersonnel() {
        $result = $this->groupModel->handleGetPersonnel();

        if (!empty($result)):
            $listPersonnel = $result;
            $this->data['dataView']['listPersonnel'] = $listPersonnel;
        else:
            $emtyValue = 'Không có dữ liệu';
            $this->data['dataView']['emptyValue'] = $emtyValue;
        endif;

        $this->data['body'] = 'admin/groups/personnel';
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

        $result = $this->groupModel->handleGetCandidate($filters, $keyword ?? '');

        if (!empty($result)):
            $listCandidate = $result;
            $this->data['dataView']['listCandidate'] = $listCandidate;
        else:
            $emtyValue = 'Không có dữ liệu';
            $this->data['dataView']['emptyValue'] = $emtyValue;
        endif;

        $this->data['body'] = 'admin/groups/candidate';
        $this->data['dataView']['request'] = $request;
        $this->render('layouts/layout', $this->data, 'admin');
    }
   
}