<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Option_model extends MY_Model
{

    public function __construct()
    {
        $this->table = 'fz_options';
        $this->primary_key = 'id';
        parent::__construct();
    }
    function get_group($group)
    {
        $options = $this->where(array('deleted' => 0, 'group' => $group))->as_object()->get_all();
        $data_options = array();
        foreach ($options as $option) {
            $data_options[$option->key] = $option->value;
        }
        return $data_options;
    }
    function all_option()
    {
        $options = $this->where(array('deleted' => 0))->as_object()->get_all();
        $data_options = array();
        foreach ($options as $option) {
            $data_options[$option->key] = $option->value;
        }
        return $data_options;
    }
}
