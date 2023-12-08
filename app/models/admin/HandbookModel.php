<?php 
class HandbookModel extends Model {
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

    public function handleAddHandbook($data, $avatarPath) {
        $dataInsert = [
            'title' => $data['title'],
            'slug' => $data['slug'],
            'thumbnail' => $avatarPath,
            'handbook_category_id' => $data['main_category'],
            'handbook_sub_category_id' => $data['sub_category'],
            'descr' => $_POST['descr'],
            'admin_id' => 1,
            'content' => $_POST['content'],
            'create_at' => date('Y-m-d H:i:s'),
        ];

        $insertStatus = $this->db->table('handbooks')
            ->insert($dataInsert);

        if ($insertStatus):
            return true;
        endif;

        return false;
    }

    public function handleGetCategory() {
        $queryGet = $this->db->table('handbook_categories')
            ->select('id, name, slug')
            ->get();

        $response = [];

        if (!empty($queryGet)):
            $response = $queryGet;
        endif;

        return $response;
    }

    public function handleGetSubCategory($categoryId) {
        $queryGet = $this->db->table('handbook_sub_categories')
            ->select('id, name, slug')
            ->where('handbook_category_id', '=', $categoryId)
            ->get();

        $response = [];

        if (!empty($queryGet)):
            $response = $queryGet;
        endif;

        return $response;
    }

    public function handleGetAllCategory() {
        $queryGet = $this->db->table('handbook_categories')
            ->select('id, name, slug')
            ->get();

        $response = [];

        if (!empty($queryGet)):
            $response = $queryGet;
        endif;

        return $response;
    }

    public function handleGetDetail($handbookId) {
        $queryGet = $this->db->table('handbooks')
            ->select('handbooks.title, handbooks.slug, handbooks.thumbnail, handbooks.descr, handbooks.create_at,
                handbooks.content, handbooks.view_count, handbook_categories.name as main_category_name,
                handbook_categories.slug as main_category_slug, handbook_sub_categories.name as sub_category_name,
                handbook_sub_categories.slug as sub_category_slug, admins.fullname as author')
            ->join('handbook_sub_categories', 'handbook_sub_categories.id = handbooks.handbook_sub_category_id')
            ->join('handbook_categories', 'handbook_categories.id = handbooks.handbook_category_id')
            ->join('admins', 'admins.id = handbooks.admin_id')
            ->where('handbooks.id', '=', $handbookId)
            ->get();

        $response = [];

        if (!empty($queryGet)):
            $response = $queryGet;
        endif;

        return $response;
    }

    public function handleGetListHandbook($filters = [], $keyword = '', $limit) {
        $queryGet = $this->db->table('handbooks')
            ->select('handbooks.id, handbooks.title, handbooks.slug, handbooks.create_at, 
                handbooks.view_count, handbook_categories.name as main_category_name, 
                admins.fullname as author')
            ->join('handbook_categories', 'handbook_categories.id = handbooks.handbook_category_id')
            ->join('admins', 'admins.id = handbooks.admin_id');

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
                    ->where('handbooks.title', 'LIKE', "%$keyword%")
                    ->orWhere('admins.fullname', 'LIKE', "%$keyword%");
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

     // Xử lý hàm tăng view
     public function handleSetViewCount($handbookId) {
        $queryGet = $this->db->table('handbooks')
            ->select('view_count')
            ->where('id', '=', $handbookId)
            ->first();

        $check = false;

        if (!empty($queryGet)):
            $view = $queryGet['view_count'];
            $view++;
            $check = true;
        else:
            if (is_array($queryGet)):
                $view = 1;
                $check = true;
            endif;
        endif;

        if ($check):
            $dataUpdate = [
                'view_count' => $view
            ];

            $this->db->table('handbooks')
                ->where('handbooks.id', '=', $handbookId)
                ->update($dataUpdate);
        endif;
    }

}