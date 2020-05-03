<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Origin_model extends MY_Model
{

    public function __construct()
    {
        $this->table = 'origin_country';
        $this->primary_key = 'id';
        // $this->before_create[] = 'create_date';
        parent::__construct();
    }
}
