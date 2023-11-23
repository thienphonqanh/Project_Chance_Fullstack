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
        $result = $this->groupModel->handleGetCandidate();

        if (!empty($result)):
            $listCandidate = $result;
            $this->data['dataView']['listCandidate'] = $listCandidate;
        else:
            $emtyValue = 'Không có dữ liệu';
            $this->data['dataView']['emptyValue'] = $emtyValue;
        endif;

        $this->data['body'] = 'admin/groups/candidate';
        $this->render('layouts/layout', $this->data, 'admin');
    }
   
}