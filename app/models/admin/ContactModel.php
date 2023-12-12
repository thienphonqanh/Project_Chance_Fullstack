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
}