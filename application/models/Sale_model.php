<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sale_model extends MY_Model
{

    public function __construct()
    {
        $this->table = 'sale_order';
        $this->primary_key = 'id';
        $this->before_create[] = 'create_date';
        $this->has_many['details'] = array('foreign_model' => 'Sale_line_model', 'foreign_table' => 'sale_order_line', 'foreign_key' => 'order_id', 'local_key' => 'id');
        parent::__construct();
    }
    protected function create_date($data)
    {
        $data['order_date'] = date("Y-m-d H:i:s");
        return $data;
    }
}
