<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class SaleLine_model extends MY_Model
{

    public function __construct()
    {
        $this->table = 'fz_sale_line';
        $this->primary_key = 'id';
        parent::__construct();
    }
}
