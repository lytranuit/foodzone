<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Product_category_model extends MY_Model
{

    public function __construct()
    {
        $this->table = 'fz_product_category';
        $this->primary_key = 'id';
        $this->has_one['product'] = array('foreign_model' => 'Product_model', 'foreign_table' => 'product', 'foreign_key' => 'id', 'local_key' => 'product_id');

        parent::__construct();
    }
}
