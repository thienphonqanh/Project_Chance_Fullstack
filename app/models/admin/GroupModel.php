<?php
class GroupModel extends Model {

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
    public function handleGetPersonnel($keyword = '', $limit) {
        $queryGet = $this->db->table('users')
            ->select('users.fullname, groups.name')
            ->join('groups', 'users.group_id = groups.id')
            ->where('users.group_id', '!=', 5);
            
            $checkNull = false;

        if (!empty($filters)):
            foreach ($filters as $key => $value):
                $queryGet->where($key, '=', $value);
            endforeach;
        endif;

        if (!empty($keyword)):
            $queryGet->where(function ($query) use ($keyword) {
                $query
                    ->where('users.fullname', 'LIKE', "%$keyword%")
                    ->orWhere('users.email', 'LIKE', "%$keyword%");
            });
        endif;
        
        $queryGet = $queryGet->paginate($limit);

        if (!empty($queryGet['data'])):
            foreach ($queryGet['data'] as $key => $item):
                foreach ($item as $subKey => $subItem):
                    if ($subItem === NULL || $subItem === ''):
                        $checkNull = true;
                    endif;
                endforeach;
            endforeach;
        endif;

        if (!$checkNull):
            $response = $queryGet;
        endif;

        return $response;
    }

    // Xử lý lấy danh sách nhân sự
    public function handleGetCandidate($filters = [], $keyword = '', $limit) {
        $queryGet = $this->db->table('users')
            ->select('users.fullname, users.email, 
                    users.status, users.create_at, groups.name')
            ->join('groups', 'users.group_id = groups.id')
            ->where('users.group_id', '=', 5);

        $checkNull = false;

        if (!empty($filters)):
            foreach ($filters as $key => $value):
                $queryGet->where($key, '=', $value);
            endforeach;
        endif;

        if (!empty($keyword)):
            $queryGet->where(function ($query) use ($keyword) {
                $query
                    ->where('users.fullname', 'LIKE', "%$keyword%")
                    ->orWhere('users.email', 'LIKE', "%$keyword%");
            });
        endif;
        
        $queryGet = $queryGet->paginate($limit);

        if (!empty($queryGet['data'])):
            foreach ($queryGet['data'] as $key => $item):
                foreach ($item as $subKey => $subItem):
                    if ($subItem === NULL || $subItem === ''):
                        $checkNull = true;
                    endif;
                endforeach;
            endforeach;
        endif;

        if (!$checkNull):
            $response = $queryGet;
        endif;

        return $response;
    }
    
}