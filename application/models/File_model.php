<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class File_model extends MY_Model
{

    public function __construct()
    {
        $this->table = 'fz_file';
        $this->primary_key = 'id';
        $this->before_create[] = 'create_date';
        parent::__construct();
    }

    protected function create_date($data)
    {
        $data['date'] = date("Y-m-d H:i:s");
        return $data;
    }
    function create_object($data)
    {
        $array = array(
            'name', 'date', 'src', 'user_id', 'size', 'file_type', 'real_name', 'type', 'deleted'
        );
        $obj = array();
        foreach ($array as $key) {
            if (isset($data[$key])) {
                $obj[$key] = $data[$key];
            } else
                continue;
        }

        return $obj;
    }
}
