<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sale_model extends MY_Model
{

    public function __construct()
    {
        $this->table = 'fz_sale';
        $this->primary_key = 'id';
        $this->before_create[] = 'create_date';
        parent::__construct();
    }
    protected function create_date($data)
    {
        $data['order_date'] = date("Y-m-d H:i:s");
        return $data;
    }
}
