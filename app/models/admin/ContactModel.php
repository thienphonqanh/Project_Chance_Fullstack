<?php 
class ContactModel extends Model {
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

    public function handleGetListContact($filters = [], $keyword = '', $limit) {
        $queryGet = $this->db->table('contacts')
            ->select('contacts.id, contacts.candidate_id, contacts.fullname, 
                contacts.email, contacts.status, contacts.message, contacts.create_at')
            ->join('candidates', 'candidates.id = contacts.candidate_id');
            
        $response = [];
        $checkNull = false;
        
        if (!empty($filters)) :
            foreach ($filters as $key => $value) :
                $queryGet->where($key, '=', $value);
            endforeach;
        else:
            $this->db->where = '';
        endif;

        if (!empty($keyword)) :
            $queryGet->where(function ($query) use ($keyword) {
                $query
                    ->where('contacts.fullname', 'LIKE', "%$keyword%")
                    ->orWhere('contacts.email', 'LIKE', "%$keyword%");
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

    public function handleChangeStatus($userId, $action)
    {
        $queryGet = $this->db->table('contacts')
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


            $updateStatus = $this->db->table('contacts')
                ->where('id', '=', $userId)
                ->update($dataUpdate);

            if ($updateStatus) :
                return true;
            endif;
        endif;

        return false;
    }

    public function handleDelete($itemsToDelete = '')
    {
        $itemsToDelete = '(' . $itemsToDelete . ')';

        $queryDelete = $this->db->table('contacts')
            ->where('id', 'IN', $itemsToDelete)
            ->delete();

        return $queryDelete ? true : false;
    }
}