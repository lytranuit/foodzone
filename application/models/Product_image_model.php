<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Product_image_model extends MY_Model
{

    public function __construct()
    {
        $this->table = 'fz_product_image';
        $this->primary_key = 'id';
        parent::__construct();
    }
}
