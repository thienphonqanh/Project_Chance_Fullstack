<?php
class EmployerModel extends Model
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

    public function handleGetEmployerInformation($userId)
    {
        $queryGet = $this->db->table('companies')
            ->where('id', '=', $userId)
            ->first();

        $response = [];

        if (!empty($queryGet)) :
            $response = $queryGet;
        endif;

        return $response;
    }

    public function handleGetOldEmployer($userId)
    {
        $queryGet = $this->db->table('companies')
            ->select('email, phone, thumbnail')
            ->where('id', '=', $userId)
            ->first();

        $response = [];

        if (!empty($queryGet)) :
            $response = $queryGet;
        endif;

        return $response;
    }

    public function handleUpdateProfileEmployer($userId, $avatarPath)
    {
        $queryGet = $this->db->table('companies')
            ->where('id', '=', $userId)
            ->first();

        if (!empty($queryGet)) :
            $dataUpdate = [
                'fullname' => $_POST['fullname'],
                'name' => $_POST['company_name'],
                'thumbnail' => $avatarPath,
                'email' => $_POST['email'],
                'job_category_id' => $_POST['job_field'],
                'phone' => $_POST['phone'],
                'scales' => $_POST['scales'],
                'description' => $_POST['description'],
                'location' => $_POST['address'],
                'update_at' => date('Y-m-d H:i:s'),
            ];

            $updateStatus = $this->db->table('companies')
                ->where('id', '=', $userId)
                ->update($dataUpdate);

            if ($updateStatus) :
                $this->handleSaveEmployerData('companies', $userId);
                return true;
            endif;
        endif;

        return false;
    }

    // Xử lý lưu data login vào session
    public function handleSaveEmployerData($role = '', $userId = '')
    {
        $userData = $this->db->table($role)
            ->where('id', '=', $userId)
            ->first();

        Session::data('employer_data', $userData);
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

    public function handleGetFormWork()
    {
        $queryGet = $this->db->table('form_work')
            ->select('id, name')
            ->get();

        $response = [];

        if (!empty($queryGet)) :
            $response = $queryGet;
        endif;

        return $response;
    }

    public function handleGetJobRank()
    {
        $queryGet = $this->db->table('job_rank')
            ->select('id, name')
            ->get();

        $response = [];

        if (!empty($queryGet)) :
            $response = $queryGet;
        endif;

        return $response;
    }

    public function handleGetYearExp()
    {
        $queryGet = $this->db->table('year_experience')
            ->select('id, name')
            ->get();

        $response = [];

        if (!empty($queryGet)) :
            $response = $queryGet;
        endif;

        return $response;
    }

    public function handleGetEducation()
    {
        $queryGet = $this->db->table('education')
            ->select('id, name')
            ->get();

        $response = [];

        if (!empty($queryGet)) :
            $response = $queryGet;
        endif;

        return $response;
    }

    // Xử lý thêm việc làm
    public function handleAddJob($avatarPath)
    {
        $dataInsertJob = [
            'title' => $_POST['title'],
            'slug' => toSlug($_POST['title']),
            'thumbnail' => $avatarPath,
            'job_category_id' => $_POST['job_field'],
            'form_work' => $_POST['form_work'],
            'location' => $_POST['location'],
            'salary' => $_POST['salary'],
            'deadline' => $_POST['deadline'],
            'rank' => $_POST['rank'],
            'company_id' => getIdEmployerLogin(),
            'education_required' => $_POST['education_required'],
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

        return false;
    }

    public function handleGetListJob($filters = [], $keyword = [])
    {
        $queryGet = $this->db->table('jobs')
            ->select('jobs.id, jobs.title, jobs.deadline, jobs.create_at, jobs.view_count, jobs.status')
            ->orderBy('jobs.create_at', 'DESC')
            ->where('jobs.company_id', '=', getIdEmployerLogin());

        $response = [];
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
                    ->orWhere('jobs.create_at', 'LIKE', "%$keyword%")
                    ->orWhere('jobs.deadline', 'LIKE', "%$keyword%");
            });
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

    public function handleCountJob()
    {
        $queryGet = $this->db->table('jobs')
            ->select('id')
            ->where('company_id', '=', getIdEmployerLogin())
            ->get();

        $response = [];

        if (!empty($queryGet)) :
            $response = count($queryGet);
        endif;

        return $response;
    }

    // Lấy thumbnail cũ
    public function handleGetOldThumbnail($jobId)
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

    // Xử lý update thông tin việc làm
    public function handleUpdateJob($jobId, $avatarPath)
    {
        $queryGet = $this->db->table('jobs')
            ->where('id', '=', $jobId)
            ->first();

        if (!empty($queryGet)) :
            $dataUpdate = [
                'jobs.title' => $_POST['title'],
                'jobs.thumbnail' => $avatarPath,
                'jobs.slug' => toSlug($_POST['title']),
                'jobs.job_category_id' => $_POST['job_field'],
                'jobs.form_work' => $_POST['form_work'],
                'jobs.location' => $_POST['location'],
                'jobs.salary' => $_POST['salary'],
                'jobs.deadline' => $_POST['deadline'],
                'jobs.rank' => $_POST['rank'],
                'jobs.education_required' => $_POST['education_required'],
                'jobs.exp_required' => $_POST['exp_required'],
                'jobs.number_recruits' => $_POST['number_recruits'],
                'jobs.requirement' => $_POST['requirement'],
                'jobs.description' => $_POST['description'],
                'jobs.other_info' => $_POST['other_info'],
                'jobs.welfare' => $_POST['welfare'],
                'jobs.update_at' => date('Y-m-d H:i:s'),
            ];

            $updateStatus = $this->db->table('jobs')
                ->where('jobs.id', '=', $jobId)
                ->update($dataUpdate);

            if ($updateStatus) :
                return true;
            endif;
        endif;

        return false;
    }

    // Xử lý lấy data trang thông tin 
    public function handleViewJob($jobId)
    {
        $queryGet = $this->db->table('jobs')
            ->select('jobs.id, jobs.thumbnail, jobs.title, jobs.slug, jobs.location, jobs.salary, jobs.deadline,
                jobs.number_recruits, jobs.requirement, jobs.description, jobs.welfare, 
                jobs.other_info, job_categories.name as jobField, jobs.form_work, jobs.education_required, 
                jobs.exp_required, jobs.rank, companies.name, companies.description as company_description, 
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

    public function handleDeleteJob($jobId)
    {
        $queryCheck = $this->db->table('jobs')
            ->select('id')
            ->where('id', '=', $jobId)
            ->first();

        if (!empty($queryCheck)) :
            $deleteStatus = $this->db->table('jobs')
                ->where('id', '=', $jobId)
                ->delete();

            if ($deleteStatus) :
                return true;
            endif;
        endif;

        return false;
    }
}
