<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Product_simba_model extends MY_Model
{

    public function __construct()
    {
        $this->table = 'product';
        $this->primary_key = 'id';
        // $this->before_create[] = 'create_date';
        parent::__construct();
        $this->has_one['image'] = array('foreign_model' => 'File_model', 'foreign_table' => 'fz_file', 'foreign_key' => 'src', 'local_key' => 'image_url');
    }
}
