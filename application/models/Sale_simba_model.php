<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sale_simba_model extends MY_Model
{

    public function __construct()
    {
        $this->table = 'sale_order';
        $this->primary_key = 'id';
        parent::__construct();

        $this->has_many['details'] = array('foreign_model' => 'Sale_line_simba_model', 'foreign_table' => 'sale_order_line', 'foreign_key' => 'order_id', 'local_key' => 'id');
    }
    protected function create_date($data)
    {
        $data['order_date'] = date("Y-m-d H:i:s");
        return $data;
    }
}
