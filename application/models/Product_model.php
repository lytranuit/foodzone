<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Product_model extends MY_Model
{

    public function __construct()
    {
        $this->table = 'product';
        $this->primary_key = 'id';
        $this->before_create[] = 'create_date';
        parent::__construct();
        // $this->has_one['image'] = array('foreign_model' => 'File_model', 'foreign_table' => 'fz_file', 'foreign_key' => 'id', 'local_key' => 'image_id');
        $this->has_one['origin'] = array('foreign_model' => 'Origin_model', 'foreign_table' => 'origin_country', 'foreign_key' => 'id', 'local_key' => 'origin_country_id');
        $this->has_one['preservation'] = array('foreign_model' => 'Preservation_model', 'foreign_table' => 'preservation', 'foreign_key' => 'id', 'local_key' => 'preservation_id');
        $this->has_many['price_km'] = array('foreign_model' => 'product_price_model', 'foreign_table' => 'fz_product_price', 'foreign_key' => 'product_id', 'local_key' => 'id');
        $this->has_many['units'] = array('foreign_model' => 'product_unit_model', 'foreign_table' => 'fz_product_unit', 'foreign_key' => 'product_id', 'local_key' => 'id');
        $this->has_one['foodzone'] = array('foreign_model' => 'product_fz_model', 'foreign_table' => 'fz_product', 'foreign_key' => 'code', 'local_key' => 'code');

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
        $sql = "SELECT MAX(`sort`) as max FROM product";
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
        if (isset($product->foodzone)) {
            if ($product->foodzone->name_vi != "")
                $product->name_vi = $product->foodzone->name_vi;
            if ($product->foodzone->name_en != "")
                $product->name_en = $product->foodzone->name_en;
            if ($product->foodzone->name_jp != "")
                $product->name_jp = $product->foodzone->name_jp;

            if ($product->foodzone->volume_vi != "")
                $product->volume_vi = $product->foodzone->volume_vi;
            if ($product->foodzone->volume_en != "")
                $product->volume_en = $product->foodzone->volume_en;
            if ($product->foodzone->volume_jp != "")
                $product->volume_jp = $product->foodzone->volume_jp;

            if ($product->foodzone->description_vi != "")
                $product->description_vi = $product->foodzone->description_vi;

            if ($product->foodzone->description_en != "")
                $product->description_en = $product->foodzone->description_en;
            if ($product->foodzone->description_jp != "")
                $product->description_jp = $product->foodzone->description_jp;

            if ($product->foodzone->detail_vi != "")
                $product->detail_vi = $product->foodzone->detail_vi;
            if ($product->foodzone->detail_en != "")
                $product->detail_en = $product->foodzone->detail_en;
            if ($product->foodzone->detail_jp != "")
                $product->detail_jp = $product->foodzone->detail_jp;

            if ($product->foodzone->guide_vi != "")
                $product->guide_vi = $product->foodzone->guide_vi;
            if ($product->foodzone->guide_en != "")
                $product->guide_en = $product->foodzone->guide_en;
            if ($product->foodzone->guide_jp != "")
                $product->guide_jp = $product->foodzone->guide_jp;
            if ($product->foodzone->price != "")
                $product->retail_price = $product->foodzone->price;
        }
        // echo "<pre>";
        // print_r($price_km);
        // die();
        // print_r($product->units);
        // $product->units = array_values($product->units);
        $product->price = $product->retail_price;

        if (!empty($product->units)) {
            $product->units = array_values((array) $product->units);
            usort($product->units, function ($a, $b) {
                return $a->price > $b->price;
            });
            $product->units = array_filter($product->units, function ($item) {
                return $item->is_foodzone == 1;
            });
            foreach ($product->units as $key => &$unit) {
                // if ($unit->deleted == 1) {
                //     unset($product->units[$key]);
                //     break;
                // }
                $unit_id = $unit->id;

                $unit_km = array_values(array_filter($price_km, function ($item) use ($unit_id) {
                    return $item->unit_id == $unit_id;
                }));
                // print_r($price_km);
                if (!empty($unit_km)) {
                    $unit->km_price = $unit_km[0]->price;
                    $unit->prev_price = $unit->price;
                    $unit->price = $unit->km_price;
                    $unit->down_per = round(($unit->price - $unit->prev_price) * 100 / $unit->prev_price, 0);
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
                $product->down_per = round(($product->price - $product->prev_price) * 100 / $product->prev_price, 0);
            }
        }
        // echo "<pre>";
        //         print_r($product);
        //         die();
        return $product;
    }
}
