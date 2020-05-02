<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class News_model extends MY_Model
{

    public function __construct()
    {
        $this->table = 'fz_news';
        $this->primary_key = 'id';
        $this->before_create[] = 'create_date';
        parent::__construct();
        $this->has_one['image'] = array('foreign_model' => 'File_model', 'foreign_table' => 'fz_file', 'foreign_key' => 'id', 'local_key' => 'image_id');
        $this->has_one['user'] = array('foreign_model' => 'User_model', 'foreign_table' => 'users', 'foreign_key' => 'id', 'local_key' => 'user_id');
    }
    protected function create_date($data)
    {
        $data['date'] = date("Y-m-d H:i:s");
        return $data;
    }
}
