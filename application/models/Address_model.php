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
    }
}
