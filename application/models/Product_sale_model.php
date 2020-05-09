<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Product_sale_model extends MY_Model
{

    public function __construct()
    {
        $this->table = 'fz_product_sale';
        $this->primary_key = 'id';
        // $this->before_create[] = 'create_date';
        parent::__construct();
    }
}
