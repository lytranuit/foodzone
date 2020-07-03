<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sale_line_model extends MY_Model
{

    public function __construct()
    {
        $this->table = 'sale_order_line';
        $this->primary_key = 'id';
        parent::__construct();

        $this->has_one['unit'] = array('foreign_model' => 'product_unit_model', 'foreign_table' => 'fz_product_unit', 'foreign_key' => 'id', 'local_key' => 'unit_id_fz');
    }
}
