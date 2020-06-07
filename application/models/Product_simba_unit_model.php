<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Product_simba_unit_model extends MY_Model
{

    public function __construct()
    {
        $this->table = 'tbl_unit';
        $this->primary_key = 'id';
        parent::__construct();
    }
}
