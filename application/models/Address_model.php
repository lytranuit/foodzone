<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Address_model extends MY_Model
{

    public function __construct()
    {
        $this->table = 'fz_address';
        $this->primary_key = 'id';
        parent::__construct();
        $this->has_one['area'] = array('foreign_model' => 'Fee_model', 'foreign_table' => 'fz_fee', 'foreign_key' => 'id', 'local_key' => 'area_id');
    }
}
