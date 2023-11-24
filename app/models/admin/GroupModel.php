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
    public function handleGetPersonnel($filters = [], $keyword = '', $limit) {
        $queryGet = $this->db->table('admins')
            ->select('admins.fullname, admins.status, admins.email, groups.name')
            ->join('groups', 'admins.group_id = groups.id')
            ->where('admins.group_id', '!=', 2);
            
        $checkNull = false;

        if (!empty($filters)):
            foreach ($filters as $key => $value):
                $queryGet->where($key, '=', $value);
            endforeach;
        endif;

        if (!empty($keyword)):
            $queryGet->where(function ($query) use ($keyword) {
                $query
                    ->where('admins.fullname', 'LIKE', "%$keyword%")
                    ->orWhere('groups.name', 'LIKE', "%$keyword%");
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
        $queryGet = $this->db->table('candidates')
            ->select('candidates.fullname, candidates.email, 
                candidates.status, candidates.create_at, groups.name')
            ->join('groups', 'candidates.group_id = groups.id')
            ->where('candidates.group_id', '=', 2);

        $checkNull = false;

        if (!empty($filters)):
            foreach ($filters as $key => $value):
                $queryGet->where($key, '=', $value);
            endforeach;
        endif;

        if (!empty($keyword)):
            $queryGet->where(function ($query) use ($keyword) {
                $query
                    ->where('candidates.fullname', 'LIKE', "%$keyword%")
                    ->orWhere('candidates.email', 'LIKE', "%$keyword%");
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