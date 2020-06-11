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
    }
    protected function create_date($data)
    {
        $data['order_date'] = date("Y-m-d H:i:s");
        return $data;
    }
}
