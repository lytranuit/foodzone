<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Area_model extends MY_Model
{

    public function __construct()
    {
        $this->table = 'fz_area';
        $this->primary_key = 'id';
        parent::__construct();
        $this->has_many['fee'] = array('foreign_model' => 'Area_fee_model', 'foreign_table' => 'fz_area_fee', 'foreign_key' => 'area_id', 'local_key' => 'id');
    }
}
