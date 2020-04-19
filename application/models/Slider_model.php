<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Slider_model extends MY_Model
{

    public function __construct()
    {
        $this->table = 'fz_slider';
        $this->primary_key = 'id';
        parent::__construct();
        $this->has_one['image'] = array('foreign_model' => 'File_model', 'foreign_table' => 'fz_file', 'foreign_key' => 'id', 'local_key' => 'image_id');
 
    }
    function create_object($data)
    {
        $array = array(
            'image_id', 'order', 'deleted'
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
