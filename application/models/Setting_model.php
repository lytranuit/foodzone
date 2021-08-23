<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Setting_model extends MY_Model
{

    public function __construct()
    {
        $this->table = 'settings';
        $this->primary_key = 'id';
        parent::__construct();
    }

    function get_setting($key, $group)
    {
        $option = $this->where(array('opt_key' => $key, 'group_name' => $group))->as_object()->get();

        if (!empty($option))
            return $option->opt_value;
        return "";
    }
}
