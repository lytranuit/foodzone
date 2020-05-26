<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Product_model extends MY_Model
{

    public function __construct()
    {
        $this->table = 'fz_product';
        $this->primary_key = 'id';
        $this->before_create[] = 'create_date';
        parent::__construct();
        $this->has_one['image'] = array('foreign_model' => 'File_model', 'foreign_table' => 'fz_file', 'foreign_key' => 'id', 'local_key' => 'image_id');
        $this->has_one['origin'] = array('foreign_model' => 'Origin_model', 'foreign_table' => 'origin_country', 'foreign_key' => 'id', 'local_key' => 'origin_id');
        $this->has_one['preservation'] = array('foreign_model' => 'Preservation_model', 'foreign_table' => 'preservation', 'foreign_key' => 'id', 'local_key' => 'preservation_id');
        $this->has_many['price_km'] = array('foreign_model' => 'product_price_model', 'foreign_table' => 'fz_product_price', 'foreign_key' => 'product_id', 'local_key' => 'id');
        $this->has_many['units'] = array('foreign_model' => 'product_unit_model', 'foreign_table' => 'fz_product_unit', 'foreign_key' => 'product_id', 'local_key' => 'id');

        $this->has_many_pivot['category'] = array(
            'foreign_model' => 'Category_model',
            'pivot_table' => 'fz_product_category',
            'local_key' => 'id',
            'pivot_local_key' => 'product_id', /* this is the related key in the pivot table to the local key
              this is an optional key, but if your column name inside the pivot table
              doesn't respect the format of "singularlocaltable_primarykey", then you must set it. In the next title
              you will see how a pivot table should be set, if you want to  skip these keys */
            'pivot_foreign_key' => 'category_id', /* this is also optional, the same as above, but for foreign table's keys */
            'foreign_key' => 'id',
            'get_relate' => TRUE /* another optional setting, which is explained below */
        );
        $this->has_many_pivot['other_image'] = array(
            'foreign_model' => 'File_model',
            'pivot_table' => 'fz_product_image',
            'local_key' => 'id',
            'pivot_local_key' => 'product_id', /* this is the related key in the pivot table to the local key
              this is an optional key, but if your column name inside the pivot table
              doesn't respect the format of "singularlocaltable_primarykey", then you must set it. In the next title
              you will see how a pivot table should be set, if you want to  skip these keys */
            'pivot_foreign_key' => 'image_id', /* this is also optional, the same as above, but for foreign table's keys */
            'foreign_key' => 'id',
            'get_relate' => TRUE /* another optional setting, which is explained below */
        );
    }
    protected function create_date($data)
    {
        $data['date'] = date("Y-m-d H:i:s");
        return $data;
    }
    function get_max_order()
    {
        $sql = "SELECT MAX(`order`) as max FROM fz_product";
        //        echo $sql;
        //        die();
        $query = $this->db->query($sql);
        $result = $query->result();
        if (empty($result)) {
            $data = 1;
        } else {
            $data = (int) $result[0]->max + 1;
        }
        return $data;
    }
    function format($product)
    {
        // echo "<pre>";
        $price_km = isset($product->price_km) ?  array_values((array) $product->price_km) : array();
        $price_km = array_values(array_filter($price_km, function ($item) {
            return $item->deleted ==  0;
        }));
        // echo "<pre>";
        // print_r($price_km);
        // die();
        // print_r($product->units);
        // $product->units = array_values($product->units);
        if (!empty($product->units)) {
            $product->units = array_values($product->units);
            foreach ($product->units as $key => &$unit) {
                if ($unit->deleted == 1) {
                    unset($product->units[$key]);
                    break;
                }
                $unit_id = $unit->id;

                $unit_km = array_values(array_filter($price_km, function ($item) use ($unit_id) {
                    return $item->unit_id == $unit_id;
                }));
                if (!empty($unit_km)) {
                    $unit->km_price = $unit_km[0]->price;
                    $unit->prev_price = $unit->price;
                    $unit->price = $unit->km_price;
                }

                // print_r($unit);
            }
        } else {

            $list_km = array();
            foreach ($price_km as $row1) {
                $now =  date("Y-m-d H:i:s");
                if ($row1->date_from <= $now && $row1->date_to >= $now)
                    $list_km[] = $row1;
            }
            if (isset($list_km[0]->price)) {
                $product->km_price = $list_km[0]->price;
                $product->prev_price = $product->price;
                $product->price = $product->km_price;
            }
        }

        // print_r($product->prev_price);
        // die();
        return $product;
    }
}
