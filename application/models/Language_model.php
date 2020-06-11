<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Language_model extends MY_Model
{

    public function __construct()
    {
        $this->table = 'fz_language';
        $this->primary_key = 'id';
        parent::__construct();
    }
}
