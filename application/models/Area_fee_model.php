<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Area_fee_model extends MY_Model
{

    public function __construct()
    {
        $this->table = 'fz_area_fee';
        $this->primary_key = 'id';
        parent::__construct();
    }
}
