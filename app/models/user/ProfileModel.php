<?php 
class ProfileModel extends Model {
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

    public function handleChangePassword($userId) {
        $checkOldPass = $this->db->table('candidates')
            ->select('password')
            ->where('id', '=', $userId)
            ->first();
        
        if (password_verify($_POST['old_password'], $checkOldPass['password'])):
            if (!password_verify($_POST['new_password'], $checkOldPass['password'])):
                $dataUpdate = [
                    'password' => password_hash($_POST['new_password'], PASSWORD_DEFAULT)
                ];  

                $updateStatus = $this->db->table('candidates')
                    ->where('id', '=', $userId)
                    ->update($dataUpdate);
                
                if ($updateStatus):
                    return true;
                endif;
            else:
                Session::flash('msg', 'Bạn đang dùng mật khẩu này');
                Session::flash('msg_type', 'danger');
            endif;
        else:
            Session::flash('msg', 'Mật khẩu cũ chưa chính xác');
            Session::flash('msg_type', 'danger');
        endif;

        return false;
    }

    public function handleGetPersonalInformation($userId) {
        $queryGet = $this->db->table('candidates')
            ->where('id', '=', $userId)
            ->first();

        $response = [];

        if (!empty($queryGet)):
            $response = $queryGet;
        endif;

        return $response;
    }

    public function handleGetOldCandidate($userId)
    {
        $queryGet = $this->db->table('candidates')
            ->select('email, phone, thumbnail')
            ->where('id', '=', $userId)
            ->first();

        $response = [];

        if (!empty($queryGet)) :
            $response = $queryGet;
        endif;

        return $response;
    }

    public function handleUpdateProfileCandidate($userId, $avatarPath)
    {
        $queryGet = $this->db->table('candidates')
            ->where('id', '=', $userId)
            ->first();

        if (!empty($queryGet)) :
            $dataUpdate = [
                'fullname' => $_POST['fullname'],
                'thumbnail' => $avatarPath,
                'email' => $_POST['email'],
                'phone' => $_POST['phone'],
                'dob' => $_POST['dob'],
                'gender' => $_POST['gender'],
                'location' => $_POST['location'],
                'address' => $_POST['address'],
                'contact_facebook' => $_POST['contact_facebook'],
                'contact_twitter' => $_POST['contact_twitter'],
                'contact_linkedin' => $_POST['contact_linkedin'],
                'about_content' => $_POST['about_content'],
                'update_at' => date('Y-m-d H:i:s'),
            ];

            $updateStatus = $this->db->table('candidates')
                ->where('id', '=', $userId)
                ->update($dataUpdate);

            if ($updateStatus) :
                $this->handleSaveUserData('candidates', $userId);
                return true;
            endif;
        endif;

        return false;
    }

    // Xử lý lưu data login vào session
    public function handleSaveUserData($role = '', $userId = '')
    {
        $userData = $this->db->table($role)
            ->where('id', '=', $userId)
            ->first();

        Session::data('user_data', $userData);
    }

    public function handleGetJobApplied($userId) {
        $queryGet = $this->db->table('job_applications')
            ->select('job_applications.id, job_applications.status, jobs.title, companies.name')
            ->join('jobs', 'job_applications.job_id = jobs.id')
            ->join('companies', 'jobs.company_id = companies.id')
            ->where('job_applications.candidate_id', '=', $userId)
            ->get();

        $response = [];

        if (!empty($queryGet)):
            $response = $queryGet;
        endif;
        
        return $response;
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

    public function handleAddPersonalProfile($userId, $cvPath)
    {
        if (!empty($cvPath)):
            $dataInsert = [
                'candidate_id' => $userId,
                'job_category_id' => $_POST['job_field'],
                'job_desired' => $_POST['job_desired'],
                'form_work' => $_POST['form_work'],
                'current_rank' => $_POST['current_rank'],
                'rank_desired' => $_POST['rank_desired'],
                'academic_level' => $_POST['current_rank'],
                'year_experience' => $_POST['rank_desired'],
                'cv_file' => $cvPath,
                'skills' => $_POST['skills'],
                'create_at' => date('Y-m-d H:i:s')
            ];
        else:
            $dataInsert = [
                'candidate_id' => $userId,
                'job_category_id' => $_POST['job_field'],
                'job_desired' => $_POST['job_desired'],
                'form_work' => $_POST['form_work'],
                'current_rank' => $_POST['current_rank'],
                'rank_desired' => $_POST['rank_desired'],
                'academic_level' => $_POST['current_rank'],
                'year_experience' => $_POST['rank_desired'],
                'skills' => $_POST['skills'],
                'create_at' => date('Y-m-d H:i:s')
            ];
        endif;

        $insertStatus = $this->db->table('profile')
            ->insert($dataInsert);

        if ($insertStatus) :
            return true;
        endif;

        return false;
    }

    public function handleEditPersonalProfile($profileId, $cvPath)
    {
        if (!empty($cvPath)):
            $dataUpdate = [
                'job_category_id' => $_POST['job_field'],
                'job_desired' => $_POST['job_desired'],
                'form_work' => $_POST['form_work'],
                'current_rank' => $_POST['current_rank'],
                'rank_desired' => $_POST['rank_desired'],
                'academic_level' => $_POST['current_rank'],
                'year_experience' => $_POST['rank_desired'],
                'cv_file' => $cvPath,
                'skills' => $_POST['skills'],
                'update_at' => date('Y-m-d H:i:s')
            ];
        else:
            $dataUpdate = [
                'job_category_id' => $_POST['job_field'],
                'job_desired' => $_POST['job_desired'],
                'form_work' => $_POST['form_work'],
                'current_rank' => $_POST['current_rank'],
                'rank_desired' => $_POST['rank_desired'],
                'academic_level' => $_POST['current_rank'],
                'year_experience' => $_POST['rank_desired'],
                'skills' => $_POST['skills'],
                'update_at' => date('Y-m-d H:i:s')
            ];
        endif;

        $updateStatus = $this->db->table('profile')
            ->where('id', '=', $profileId)
            ->update($dataUpdate);

        if ($updateStatus) :
            return true;
        endif;

        return false;
    }

    public function handleGetPersonalProfile($userId) {
        $queryGet = $this->db->table('profile')
            ->where('candidate_id', '=', $userId)
            ->first();

        $response = [];

        if (!empty($queryGet)):
            $response = $queryGet;
        endif;

        return $response;
    }

    public function handleCheckProfile() {
        $queryCheck = $this->db->table('profile')
            ->where('candidate_id', '=', getIdUserLogin())
            ->first();

        if (!empty($queryCheck)) :
            return true;
        endif;

        return false;
    }
}