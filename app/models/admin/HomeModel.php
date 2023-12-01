<?php 
class HomeModel extends Model {
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

    public function handleGetJobCategory() {
        $queryGet = $this->db->table('job_categories')
            ->select('id, name, icon, slug, quantity_job')
            ->get();

        $response = [];

        if (!empty($queryGet)):
            $response = $queryGet;
        endif;
        
        return $response;
    }

}