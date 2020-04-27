<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Category_model extends MY_Model
{

    public function __construct()
    {
        $this->table = 'fz_category';
        $this->primary_key = 'id';
        // $this->before_create[] = 'create_date';
        parent::__construct();
        $this->has_one['image'] = array('foreign_model' => 'File_model', 'foreign_table' => 'fz_file', 'foreign_key' => 'id', 'local_key' => 'image_id');
        $this->has_many_pivot['product'] = array(
            'foreign_model' => 'Product_model',
            'pivot_table' => 'fz_product_category',
            'local_key' => 'id',
            'pivot_local_key' => 'category_id', /* this is the related key in the pivot table to the local key
              this is an optional key, but if your column name inside the pivot table
              doesn't respect the format of "singularlocaltable_primarykey", then you must set it. In the next title
              you will see how a pivot table should be set, if you want to  skip these keys */
            'pivot_foreign_key' => 'product_id', /* this is also optional, the same as above, but for foreign table's keys */
            'foreign_key' => 'id',
            'get_relate' => TRUE /* another optional setting, which is explained below */
        );
    }
    protected function create_date($data)
    {
        $data['date'] = date("Y-m-d H:i:s");
        return $data;
    }
    function get_product($category_id)
    {
        $sql = "SELECT * FROM fz_product as p JOIN fz_product_category as pc ON p.id = pc.product_id where category_id = $category_id and p.deleted = 0";
        //        echo $sql;
        //        die();
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
}
