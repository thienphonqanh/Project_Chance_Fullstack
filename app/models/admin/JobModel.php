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

    // Xử lý lấy danh sách việc làm ở Dashboard
    public function handleGetListJobDashboard($filters = [], $keyword = '', $limit)
    {
        $queryGet = $this->db->table('jobs')
            ->select('jobs.*, companies.name')
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
    public function handleGetListJob()
    {
        $queryGet = $this->db->table('jobs')
            ->select('jobs.id, jobs.title, jobs.thumbnail, jobs.slug, 
                    jobs.salary, jobs.location, companies.name')
            ->join('companies', 'jobs.company_id = companies.id')
            ->get();

        $response = [];
        $checkNull = false;

        if (!empty($queryGet)) :
            foreach ($queryGet as $key => $item) :
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

    // Xử lý xoá việc làm
    public function handleDelete($itemsToDelete = '')
    {
        $itemsToDelete = '(' . $itemsToDelete . ')';

        $queryDelete = $this->db->table('jobs')
            ->where('id', 'IN', $itemsToDelete)
            ->delete();

        if ($queryDelete) :
            return true;
        endif;

        return false;
    }

    // Xử lý lấy data trang thông tin 
    public function handleViewJob($jobId)
    {
        $queryGet = $this->db->table('jobs')
            ->select('jobs.id, jobs.title, jobs.slug, jobs.form_work, jobs.location, 
                jobs.salary, jobs.deadline, jobs.rank, jobs.degree_required,
                jobs.number_recruits, jobs.exp_required, jobs.requirement, 
                jobs.description, jobs.welfare, jobs.other_info, job_categories.name as jobField,
                companies.name')
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
    public function handleGetDetail($jobId) {
        $queryGet = $this->db->table('jobs')
            ->select('jobs.id, jobs.thumbnail, jobs.title, jobs.slug, jobs.form_work, jobs.location, 
                jobs.salary, jobs.deadline, jobs.rank, jobs.degree_required, jobs.view_count,
                jobs.number_recruits, jobs.exp_required, jobs.requirement, jobs.create_at,
                jobs.description, jobs.welfare, jobs.other_info, job_categories.name as jobField,
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
}