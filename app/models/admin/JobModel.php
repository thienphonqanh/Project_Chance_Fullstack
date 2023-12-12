<?php
class JobModel extends Model
{

    public function tableFill()
    {
        return '';
    }

    public function fieldFill()
    {
        return '';
    }

    public function primaryKey()
    {
        return '';
    }

    // Lấy thumbnail cũ
    public function handleGetOld($jobId)
    {
        $queryGet = $this->db->table('jobs')
            ->select('thumbnail')
            ->where('id', '=', $jobId)
            ->first();

        $response = [];

        if (!empty($queryGet)) :
            $response = $queryGet;
        endif;

        return $response;
    }

    // Xử lý lấy danh sách việc làm ở Dashboard
    public function handleGetListJobDashboard($filters = [], $keyword = '', $limit)
    {
        $queryGet = $this->db->table('jobs')
            ->select('jobs.id, jobs.title, jobs.location, jobs.status, jobs.deadline, companies.name')
            ->join('companies', 'jobs.company_id = companies.id');

        $checkNull = false;

        if (!empty($filters)) :
            foreach ($filters as $key => $value) :
                $queryGet->where($key, '=', $value);
            endforeach;
        endif;

        if (!empty($keyword)) :
            $queryGet->where(function ($query) use ($keyword) {
                $query
                    ->where('jobs.title', 'LIKE', "%$keyword%")
                    ->orWhere('companies.name', 'LIKE', "%$keyword%")
                    ->orWhere('jobs.location', 'LIKE', "%$keyword%");
            });
        endif;

        $queryGet = $queryGet->paginate($limit);

        if (!empty($queryGet['data'])) :
            foreach ($queryGet['data'] as $key => $item) :
                foreach ($item as $subKey => $subItem) :
                    if ($subItem === NULL || $subItem === '') :
                        $checkNull = true;
                    endif;
                endforeach;
            endforeach;
        endif;

        if (!$checkNull) :
            $response = $queryGet;
        endif;

        return $response;
    }

    // Xử lý lấy danh sách việc làm ở Client
    public function handleGetListJob($filters = [], $keyword = [])
    {
        $queryGet = $this->db->table('jobs')
            ->select('jobs.id, jobs.title, jobs.thumbnail, jobs.slug, 
                jobs.salary, jobs.location, companies.name, jobs.create_at,
                job_categories.name as jobField')
            ->join('job_categories', 'jobs.job_category_id = job_categories.id')
            ->join('companies', 'jobs.company_id = companies.id')
            ->orderBy('jobs.create_at', 'DESC')
            ->where('jobs.status', '=', '1');

        $response = [];
        $checkNull = false;

        if (!empty($filters)) :
            foreach ($filters as $key => $value) :
                $queryGet->where($key, '=', $value);
            endforeach;
        endif;

        if (!empty($keyword)) :
            $title = $keyword['job_title'];
            $location = $keyword['job_location'];
            if (!empty($title) && empty($location)) :
                $queryGet->where(function ($query) use ($title) {
                    $query
                        ->where('jobs.title', 'LIKE', "%$title%");
                });
            elseif (empty($title) && !empty($location)) :
                $queryGet->where(function ($query) use ($location) {
                    $query
                        ->where('jobs.location', 'LIKE', "%$location%");
                });
            elseif (!empty($title) && !empty($location)) :
                $queryGet->where(function ($query) use ($title, $location) {
                    $query
                        ->where('jobs.title', 'LIKE', "%$title%")
                        ->where('jobs.location', 'LIKE', "%$location%");
                });
            endif;
        endif;

        $queryGet = $queryGet->get();

        if (!empty($queryGet['data'])) :
            foreach ($queryGet['data'] as $key => $item) :
                foreach ($item as $subKey => $subItem) :
                    if ($subItem === NULL || $subItem === '') :
                        $checkNull = true;
                    endif;
                endforeach;
            endforeach;
        endif;

        if (!$checkNull) :
            $response = $queryGet;
        endif;

        return $response;
    }

    // Xử lý duyệt việc làm
    public function handleChangeStatus($userId, $action)
    {
        $queryGet = $this->db->table('jobs')
            ->select('status')
            ->where('id', '=', $userId)
            ->first();

        if (!empty($queryGet)) :
            if (!empty($action)) :
                switch ($action):
                    case 'active';
                        $dataUpdate = [
                            'status' => 1,
                            'update_at' => date('Y-m-d H:i:s')
                        ];
                        break;
                    case 'inactive';
                        $dataUpdate = [
                            'status' => 0,
                            'update_at' => date('Y-m-d H:i:s')
                        ];
                        break;
                    case 'unactive';
                        $dataUpdate = [
                            'status' => 2,
                            'update_at' => date('Y-m-d H:i:s')
                        ];
                        break;
                endswitch;
            endif;


            $updateStatus = $this->db->table('jobs')
                ->where('id', '=', $userId)
                ->update($dataUpdate);

            if ($updateStatus) :
                return true;
            endif;
        endif;

        return false;
    }

    // Xử lý xoá và update số lượng
    public function handleDelete($itemsToDelete = '')
    {
        $itemsToDelete = '(' . $itemsToDelete . ')';

        $queryDelete = $this->db->table('jobs')
            ->where('id', 'IN', $itemsToDelete)
            ->delete();

        return $queryDelete ? true : false;
    }

    // Xử lý lấy data trang thông tin 
    public function handleViewJob($jobId)
    {
        $queryGet = $this->db->table('jobs')
            ->select('jobs.id, jobs.thumbnail, jobs.title, jobs.slug, jobs.form_work, jobs.location, 
                jobs.salary, jobs.deadline, jobs.rank, jobs.degree_required,
                jobs.number_recruits, jobs.exp_required, jobs.requirement, 
                jobs.description, jobs.welfare, jobs.other_info, job_categories.name as jobField,
                companies.name, companies.description as company_description, 
                companies.location as company_location, companies.scales')
            ->join('job_categories', 'job_categories.id = jobs.job_category_id')
            ->join('companies', 'companies.id = jobs.company_id')
            ->where('jobs.id', '=', $jobId)
            ->get();

        if (!empty($queryGet)) :
            $response = $queryGet;
        endif;

        return $response;
    }

    // Xử lý lấy data chi tiết
    public function handleGetDetail($jobId)
    {
        $queryGet = $this->db->table('jobs')
            ->select('jobs.id, jobs.thumbnail, jobs.title, jobs.slug, jobs.form_work, jobs.location, 
                jobs.salary, jobs.deadline, jobs.rank, jobs.degree_required, jobs.view_count,
                jobs.number_recruits, jobs.exp_required, jobs.requirement, jobs.create_at,
                jobs.description as job_description, jobs.welfare, jobs.other_info, job_categories.name as jobField,
                companies.name, companies.location as company_location, companies.scales, companies.description')
            ->join('job_categories', 'jobs.job_category_id = job_categories.id')
            ->join('companies', 'jobs.company_id = companies.id')
            ->where('jobs.id', '=', $jobId)
            ->get();

        if (!empty($queryGet)) :
            $response = $queryGet;
        endif;

        return $response;
    }

    // Xử lý hàm tăng view
    public function handleSetViewCount($jobId)
    {
        $queryGet = $this->db->table('jobs')
            ->select('view_count')
            ->where('id', '=', $jobId)
            ->first();

        $check = false;

        if (!empty($queryGet)) :
            $view = $queryGet['view_count'];
            $view++;
            $check = true;
        else :
            if (is_array($queryGet)) :
                $view = 1;
                $check = true;
            endif;
        endif;

        if ($check) :
            $dataUpdate = [
                'view_count' => $view
            ];

            $this->db->table('jobs')
                ->where('jobs.id', '=', $jobId)
                ->update($dataUpdate);
        endif;
    }

    // Xử lý lấy data ngẫu nhiên
    public function handleRandomData($jobField = '')
    {

        $queryGet = $this->db->table('jobs')
            ->select('jobs.id, jobs.thumbnail, jobs.title, jobs.location, jobs.salary, 
                jobs.exp_required, companies.name')
            ->join('companies', 'jobs.company_id = companies.id')
            ->join('job_categories', 'jobs.job_category_id = job_categories.id')
            ->where('job_categories.name', '=', $jobField)
            ->get();

        $length = count($queryGet);

        if ($length != 0) :
            $randomIndex = mt_rand(0, $length - 1);

            $queryGet = $this->db->table('jobs')
                ->select('jobs.id, jobs.thumbnail, jobs.title, jobs.location, jobs.salary, 
                jobs.slug, jobs.exp_required, companies.name')
                ->join('companies', 'jobs.company_id = companies.id')
                ->join('job_categories', 'jobs.job_category_id = job_categories.id')
                ->where('job_categories.name', '=', $jobField)
                ->limit(3, $randomIndex)
                ->get();
        endif;

        if (!empty($queryGet)) :
            $response = $queryGet;
        endif;

        return $response;
    }

    // Xử lý update thông tin việc làm
    public function handleUpdateJob($jobId, $avatarPath)
    {
        $queryGet = $this->db->table('jobs')
            ->where('id', '=', $jobId)
            ->first();

        if (!empty($queryGet)) :
            $dataUpdate = [
                'jobs.title' => $_POST['title'],
                'jobs.slug' => $_POST['slug'],
                'jobs.thumbnail' => $avatarPath,
                'c.name' => $_POST['company_name'],
                'c.location' => $_POST['company_location'],
                'c.scales' => $_POST['scales'],
                'c.description' => $_POST['company_description'],
                'jobs.job_category_id' => $_POST['job_field'],
                'jobs.form_work' => $_POST['form_work'],
                'jobs.location' => $_POST['location'],
                'jobs.salary' => $_POST['salary'],
                'jobs.deadline' => $_POST['deadline'],
                'jobs.rank' => $_POST['rank'],
                'jobs.degree_required' => $_POST['degree_required'],
                'jobs.exp_required' => $_POST['exp_required'],
                'jobs.number_recruits' => $_POST['number_recruits'],
                'jobs.requirement' => $_POST['requirement'],
                'jobs.description' => $_POST['description'],
                'jobs.other_info' => $_POST['other_info'],
                'jobs.welfare' => $_POST['welfare'],
                'jobs.update_at' => date('Y-m-d H:i:s'),
                'c.update_at' => date('Y-m-d H:i:s'),
            ];

            $updateStatus = $this->db->table('jobs')
                ->join('companies AS c', 'c.id = jobs.company_id')
                ->where('jobs.id', '=', $jobId)
                ->update($dataUpdate);

            if ($updateStatus) :
                return true;
            endif;
        endif;

        return false;
    }

    // Xử lý thêm việc làm
    public function handleAddJob($avatarPath)
    {
        $checkEmpty = $this->db->table('companies')
            ->select('id')
            ->where('name', '=', $_POST['company_name'])
            ->first();

        if (empty($checkEmpty)) :
            $dataInsertCompany = [
                'name' => $_POST['company_name'],
                'location' => $_POST['company_location'],
                'scales' => $_POST['scales'],
                'description' => $_POST['company_description'],
                'create_at' => date('Y-m-d H:i:s'),
            ];

            $insertStatusCompany = $this->db->table('companies')
                ->insert($dataInsertCompany);

            if ($insertStatusCompany) :
                $dataInsertJob = [
                    'title' => $_POST['title'],
                    'slug' => $_POST['slug'],
                    'thumbnail' => $avatarPath,
                    'job_category_id' => $_POST['job_field'],
                    'admin_id' => getIdUserLogin(),
                    'form_work' => $_POST['form_work'],
                    'location' => $_POST['location'],
                    'salary' => $_POST['salary'],
                    'deadline' => $_POST['deadline'],
                    'rank' => $_POST['rank'],
                    'company_id' => $this->db->lastInsertId(),
                    'degree_required' => $_POST['degree_required'],
                    'exp_required' => $_POST['exp_required'],
                    'number_recruits' => $_POST['number_recruits'],
                    'requirement' => $_POST['requirement'],
                    'description' => $_POST['description'],
                    'other_info' => $_POST['other_info'],
                    'welfare' => $_POST['welfare'],
                    'create_at' => date('Y-m-d H:i:s'),
                ];

                $insertStatusJob = $this->db->table('jobs')
                    ->insert($dataInsertJob);

                if ($insertStatusJob) :
                    return true;
                endif;
            endif;
        else :
            $companyId = $checkEmpty['id'];

            $dataInsertJob = [
                'title' => $_POST['title'],
                'slug' => $_POST['slug'],
                'thumbnail' => $avatarPath,
                'job_category_id' => $_POST['job_field'],
                'admin_id' => getIdUserLogin(),
                'form_work' => $_POST['form_work'],
                'location' => $_POST['location'],
                'salary' => $_POST['salary'],
                'deadline' => $_POST['deadline'],
                'rank' => $_POST['rank'],
                'company_id' => $companyId,
                'degree_required' => $_POST['degree_required'],
                'exp_required' => $_POST['exp_required'],
                'number_recruits' => $_POST['number_recruits'],
                'requirement' => $_POST['requirement'],
                'description' => $_POST['description'],
                'other_info' => $_POST['other_info'],
                'welfare' => $_POST['welfare'],
                'create_at' => date('Y-m-d H:i:s'),
            ];

            $insertStatusJob = $this->db->table('jobs')
                ->insert($dataInsertJob);

            if ($insertStatusJob) :
                return true;
            endif;
        endif;

        return false;
    }

    public function handleGetJobField()
    {
        $queryGet = $this->db->table('job_categories')
            ->select('id, name')
            ->get();

        $response = [];

        if (!empty($queryGet)) :
            $response = $queryGet;
        endif;

        return $response;
    }

    public function handleRecruitment($userId, $jobId, $cvPath) {
        $dataInsert = [
            'candidate_id' => $userId, 
            'job_id' => $jobId, 
            'fullname' => $_POST['fullname'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'cv_file' => $cvPath,
            'letter' => $_POST['letter'],
            'create_at' => date('Y-m-d H:i:s')
        ];

        $insertStatus = $this->db->table('job_applications')
            ->insert($dataInsert);
        
        if ($insertStatus):
            return true;
        endif;

        return false;
    }

    public function isJobId($jobId) {
        $checkId = $this->db->table('jobs')
            ->select('id')
            ->where('id', '=', $jobId)
            ->first();

        if (!empty($checkId)):
            return true;
        endif;

        return false;
    }
}
