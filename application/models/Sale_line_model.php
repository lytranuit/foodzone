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
    }
}
