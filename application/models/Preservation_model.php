<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Preservation_model extends MY_Model
{

    public function __construct()
    {
        $this->table = 'preservation';
        $this->primary_key = 'id';
        // $this->before_create[] = 'create_date';
        parent::__construct();
    }
}
