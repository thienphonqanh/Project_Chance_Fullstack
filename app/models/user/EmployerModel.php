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
}
