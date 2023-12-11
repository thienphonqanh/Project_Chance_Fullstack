<?php
class GroupModel extends Model
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

    // Xử lý lấy danh sách nhân sự
    public function handleGetPersonnel($filters = [], $keyword = '', $limit)
    {
        $queryGet = $this->db->table('admins')
            ->select('admins.id, admins.fullname, admins.status, admins.email, groups.name')
            ->join('groups', 'admins.group_id = groups.id')
            ->where('admins.group_id', '!=', 2);

        $checkNull = false;

        if (!empty($filters)) :
            foreach ($filters as $key => $value) :
                $queryGet->where($key, '=', $value);
            endforeach;
        endif;

        if (!empty($keyword)) :
            $queryGet->where(function ($query) use ($keyword) {
                $query
                    ->where('admins.fullname', 'LIKE', "%$keyword%")
                    ->orWhere('groups.name', 'LIKE', "%$keyword%");
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

    // Xử lý lấy danh sách nhân sự
    public function handleGetCandidate($filters = [], $keyword = '', $limit)
    {
        $queryGet = $this->db->table('candidates')
            ->select('candidates.id, candidates.fullname, candidates.email, 
                candidates.status, candidates.create_at, groups.name')
            ->join('groups', 'candidates.group_id = groups.id')
            ->where('candidates.group_id', '=', 2);

        $checkNull = false;

        if (!empty($filters)) :
            foreach ($filters as $key => $value) :
                $queryGet->where($key, '=', $value);
            endforeach;
        endif;

        if (!empty($keyword)) :
            $queryGet->where(function ($query) use ($keyword) {
                $query
                    ->where('candidates.fullname', 'LIKE', "%$keyword%")
                    ->orWhere('candidates.email', 'LIKE', "%$keyword%");
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

    // Xử lý lấy data trang thông tin 
    public function handleViewProfileCandidate($userId)
    {
        $queryGet = $this->db->table('candidates')
            ->select('fullname, thumbnail, email, dob, phone, gender, location, address,
                contact_facebook, contact_twitter, contact_linkedin, about_content')
            ->where('id', '=', $userId)
            ->first();

        if (!empty($queryGet)) :
            $response = $queryGet;
        endif;

        return $response;
    }

    // Xử lý lấy data trang thông tin 
    public function handleViewProfilePersonnel($userId)
    {
        $queryGet = $this->db->table('admins')
            ->select('fullname, thumbnail, email, dob, phone, gender, location, address,
                contact_facebook, contact_twitter, about_content')
            ->where('id', '=', $userId)
            ->first();

        if (!empty($queryGet)) :
            $response = $queryGet;
        endif;

        return $response;
    }

    // Xử lý lấy update trang thông tin 
    public function handleUpdateProfilePersonnel($userId, $avatarPath)
    {
        $queryGet = $this->db->table('admins')
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
                'about_content' => $_POST['about_content'],
                'update_at' => date('Y-m-d H:i:s'),
            ];

            $updateStatus = $this->db->table('admins')
                ->where('id', '=', $userId)
                ->update($dataUpdate);

            if ($updateStatus) :
                return true;
            endif;
        endif;

        return false;
    }

    // Xử lý lấy update trang thông tin 
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
                return true;
            endif;
        endif;

        return false;
    }

    // Lấy email, phone cũ của personnel
    public function handleGetOldPersonnel($userId)
    {
        $queryGet = $this->db->table('admins')
            ->select('email, phone, thumbnail')
            ->where('id', '=', $userId)
            ->first();

        $response = [];

        if (!empty($queryGet)) :
            $response = $queryGet;
        endif;

        return $response;
    }

    // Lấy email, phone, ảnh cũ của candidate
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

    // Xử lý duyệt đăng ký dịch vụ của candidate
    public function handleChangeStatusAccountCandidate($userId, $action)
    {
        $queryGet = $this->db->table('candidates')
            ->select('status')
            ->where('id', '=', $userId)
            ->first();

        if (!empty($queryGet)) :
            switch ($action):
                case 'active':
                    $dataUpdate = [
                        'status' => 1,
                        'update_at' => date('Y-m-d H:i:s')
                    ];
                    break;
                case 'inactive':
                    $dataUpdate = [
                        'status' => 0,
                        'update_at' => date('Y-m-d H:i:s')
                    ];
                    break;
                case 'unactive':
                    $dataUpdate = [
                        'status' => 2,
                        'update_at' => date('Y-m-d H:i:s')
                    ];
                    break;
            endswitch;

            $updateStatus = $this->db->table('candidates')
                ->where('id', '=', $userId)
                ->update($dataUpdate);

            if ($updateStatus) :
                return true;
            endif;
        endif;

        return false;
    }

    // Xử lý duyệt đăng ký dịch vụ của personnel
    public function handleChangeStatusAccountPersonnel($userId, $action)
    {
        $queryGet = $this->db->table('admins')
            ->select('status')
            ->where('id', '=', $userId)
            ->first();


        if (!empty($queryGet)) :
            switch ($action):
                case 'active':
                    $dataUpdate = [
                        'status' => 1,
                        'update_at' => date('Y-m-d H:i:s')
                    ];
                    break;
                case 'inactive':
                    $dataUpdate = [
                        'status' => 0,
                        'update_at' => date('Y-m-d H:i:s')
                    ];
                    break;
                case 'unactive':
                    $dataUpdate = [
                        'status' => 2,
                        'update_at' => date('Y-m-d H:i:s')
                    ];
                    break;
            endswitch;
            
            $updateStatus = $this->db->table('admins')
                ->where('id', '=', $userId)
                ->update($dataUpdate);

            if ($updateStatus) :
                return true;
            endif;
        endif;

        return false;
    }

    // Xử lý xoá nhân sự
    public function handleDeletePersonnel($itemsToDelete = '')
    {
        $itemsToDelete = '(' . $itemsToDelete . ')';

        $queryDelete = $this->db->table('admins')
            ->where('id', 'IN', $itemsToDelete)
            ->delete();

        if ($queryDelete) :
            return true;
        endif;

        return false;
    }

    // Xử lý xoá ứng viên
    public function handleDeleteCandidate($itemsToDelete = '')
    {
        $itemsToDelete = '(' . $itemsToDelete . ')';

        $queryDelete = $this->db->table('candidates')
            ->where('id', 'IN', $itemsToDelete)
            ->delete();

        if ($queryDelete) :
            return true;
        endif;

        return false;
    }
}