<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Product_price_model extends MY_Model
{

    public function __construct()
    {
        $this->table = 'fz_product_price';
        $this->primary_key = 'id';
        parent::__construct();
        $this->has_one['product'] = array('foreign_model' => 'Product_model', 'foreign_table' => 'fz_product', 'foreign_key' => 'id', 'local_key' => 'product_id');
        $this->has_one['unit'] = array('foreign_model' => 'Product_unit_model', 'foreign_table' => 'fz_product_unit', 'foreign_key' => 'id', 'local_key' => 'unit_id');
    }
}
