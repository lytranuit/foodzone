<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sale_line_simba_model extends MY_Model
{

    public function __construct()
    {
        $this->table = 'sale_order_line';
        $this->primary_key = 'id';
        parent::__construct();

        $this->has_one['product'] = array('foreign_model' => 'product_model', 'foreign_table' => 'product', 'foreign_key' => 'id', 'local_key' => 'product_id');
    }
}
