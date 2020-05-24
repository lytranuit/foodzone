<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Menu_header_model extends MY_Model
{

    public function __construct()
    {
        $this->table = 'fz_menu';
        $this->primary_key = 'id';
        // $this->before_create[] = 'create_date';
        $this->has_one['category'] = array('foreign_model' => 'Category_model', 'foreign_table' => 'fz_category', 'foreign_key' => 'id', 'local_key' => 'category_id');
        parent::__construct();
    }
}
