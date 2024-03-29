<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
if (!function_exists('sendMessage')) {

    function sendMessage($chatID, $messaggio)
    {
        $token = "606461497:AAH68TUT1mB3adaIxlud48-r-7fi2vADkRU";
        $url = "https://api.telegram.org/bot" . $token . "/sendMessage?chat_id=" . $chatID;
        $url = $url . "&text=" . urlencode($messaggio);
        $ch = curl_init();
        $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
        );
        curl_setopt_array($ch, $optArray);
        $result = curl_exec($ch);
        curl_close($ch);
    }
}
if (!function_exists("input_params")) {

    function input_params($params)
    {
        $type = $params['type'];
        $selector = $params['selector'];

        $params['date_from'] = "";
        $params['date_to'] = "";
        $params['date_from_prev'] = "";
        $params['date_to_prev'] = "";
        if ($type == "Year") {
            $params['date_from'] = $selector . "-01-01";
            $params['date_to'] = $selector . "-12-31";
            $params['date_from_prev'] = ($selector - 1) . "-01-01";
            $params['date_to_prev'] = ($selector - 1) . "-12-31";
        } else if ($type == "HalfYear") {
            $spilt = explode("-", $selector);

            $year = $spilt[0];
            if ($spilt[1] == 1) {
                $params['date_from'] = date("Y-m-d", strtotime($year . "-01-01"));
                $params['date_to'] = date("Y-m-t", strtotime($year . "-06-01"));
                $params['date_from_prev'] = date("Y-m-01", strtotime("-6 month", strtotime($params['date_from'])));
                $params['date_to_prev'] = date("Y-m-t", strtotime("-6 month", strtotime($params['date_from'])));
            } else {
                $params['date_from'] = date("Y-m-d", strtotime($year . "-07-01"));
                $params['date_to'] = date("Y-m-t", strtotime($year . "-12-01"));
                $params['date_from_prev'] = date("Y-m-01", strtotime("-6 month", strtotime($params['date_from'])));
                $params['date_to_prev'] = date("Y-m-t", strtotime("-6 month", strtotime($params['date_from'])));
            }
        } else if ($type == "Quarter") {
            $spilt = explode("-", $selector);

            $year = $spilt[0];
            if ($spilt[1] == 1) {
                $params['date_from'] = date("Y-m-d", strtotime($year . "-01-01"));
                $params['date_to'] = date("Y-m-t", strtotime($year . "-03-01"));
                $params['date_from_prev'] = date("Y-m-01", strtotime("-3 month", strtotime($params['date_from'])));
                $params['date_to_prev'] = date("Y-m-t", strtotime("-3 month", strtotime($params['date_from'])));
            } else if ($spilt[1] == 2) {
                $params['date_from'] = date("Y-m-d", strtotime($year . "-04-01"));
                $params['date_to'] = date("Y-m-t", strtotime($year . "-06-01"));
                $params['date_from_prev'] = date("Y-m-01", strtotime("-3 month", strtotime($params['date_from'])));
                $params['date_to_prev'] = date("Y-m-t", strtotime("-3 month", strtotime($params['date_from'])));
            } else if ($spilt[1] == 3) {
                $params['date_from'] = date("Y-m-d", strtotime($year . "-07-01"));
                $params['date_to'] = date("Y-m-t", strtotime($year . "-09-01"));
                $params['date_from_prev'] = date("Y-m-01", strtotime("-3 month", strtotime($params['date_from'])));
                $params['date_to_prev'] = date("Y-m-t", strtotime("-3 month", strtotime($params['date_from'])));
            } else {
                $params['date_from'] = date("Y-m-d", strtotime($year . "-10-01"));
                $params['date_to'] = date("Y-m-t", strtotime($year . "-12-01"));
                $params['date_from_prev'] = date("Y-m-01", strtotime("-3 month", strtotime($params['date_from'])));
                $params['date_to_prev'] = date("Y-m-t", strtotime("-3 month", strtotime($params['date_from'])));
            }
        } else if ($type == "Month") {
            $params['date_from'] = date("Y-m-d", strtotime($selector . "-01"));
            $params['date_to'] = date("Y-m-t", strtotime($selector . "-01"));
            $params['date_from_prev'] = date("Y-m-01", strtotime("-1 month", strtotime($params['date_from'])));
            $params['date_to_prev'] = date("Y-m-t", strtotime("-1 month", strtotime($params['date_from'])));
        } else {
            $daterange = $params['daterange'];
            $list_date = explode(" - ", $daterange);
            $params['date_from'] = date("Y-m-d", strtotime($list_date[0]));
            $params['date_to'] = date("Y-m-d", strtotime($list_date[1]));
            $params['date_from_prev'] = "";
            $params['date_to_prev'] = "";
        }
        return $params;
    }
}
if (!function_exists('getRandomColor')) {

    function getRandomColor()
    {
        $letters = '0123456789ABCDEF';
        $color = '#';
        //        echo rand(0, 16) . "<br>";
        //        echo rand(0, 16);
        //        die();
        for ($i = 0; $i < 6; $i++) {
            $color .= $letters[rand(0, 15)];
        }
        return $color;
    }
}
if (!function_exists('is_Date')) {

    function is_Date($str)
    {
        $str = str_replace('/', '-', $str);
        $stamp = strtotime($str);
        if (is_numeric($stamp)) {
            $month = date('m', $stamp);
            $day = date('d', $stamp);
            $year = date('Y', $stamp);
            return checkdate($month, $day, $year);
        }
        return false;
    }
}
if (!function_exists('config_item')) {

    function config_item($str)
    {
        $CI = &get_instance();
        $item = $CI->config->item($str);
        return $item;
    }
}
if (!function_exists('sluggable')) {

    function sluggable($str)
    {
        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);
        return $str;
    }
}
if (!function_exists('get_url_seo')) {

    function get_url_seo($func, $param = array())
    {
        $url = $func;
        $CI = &get_instance();
        $CI->load->model('page_model');
        $CI->load->helper('url');
        $page = $CI->page_model->where(array("link" => $func, "deleted" => 0))->as_array()->get_all();
        if (count($page)) {
            $url = $page[0]['seo_url'] != "" ? $page[0]['seo_url'] : $url;
            $pos = 0;
            foreach ($param as $row) {
                if (strpos($url, "(:num)", $pos) !== FALSE) {
                    $pos = strpos($url, "(:num)", $pos);
                    $length = 6;
                } elseif (strpos($url, "(.*)", $pos)) {
                    $pos = strpos($url, "(.*)", $pos);
                    $length = 4;
                } else {
                    break;
                }
                $url = substr_replace($url, $row, $pos, $length);
            }
        }
        return base_url() . $url;
    }
}

if (!function_exists('get_option')) {

    function get_option($key)
    {
        $value = "";
        $CI = &get_instance();
        $CI->load->model('option_model');
        $option = $CI->option_model->where(array("key" => $key))->as_object()->get();
        if (!empty($option)) {
            $value = $option->value;
        }
        return $value;
    }
}
if (!function_exists('get_url_page')) {

    function get_url_page($id)
    {
        $url = "";
        $CI = &get_instance();
        $CI->load->model('pageweb_model');
        $CI->load->helper('url');
        $page = $CI->pageweb_model->where(array("id" => $id))->as_array()->get_all();
        if (count($page)) {
            $url = "page/$id-" . sluggable($page[0]['title']) . ".html";
        }
        return base_url() . $url;
    }
}

if (!function_exists('get_url_product')) {

    function get_url_product($id, $title)
    {
        $url = "product/$id-" . sluggable($title) . ".html";
        return base_url() . $url;
    }
}

if (!function_exists('get_url_category')) {

    function get_url_category($id, $title)
    {
        $url = "category/$id-" . sluggable($title) . ".html";
        return base_url() . $url;
    }
}

if (!function_exists('area_current')) {

    function area_current()
    {
        $CI = &get_instance();
        $area_current = "";
        if (isset($_SESSION['area_current'])) {
            $area_current = $_SESSION['area_current'];
        }
        return $area_current;
    }
}
if (!function_exists('language_current')) {

    function language_current()
    {
        $CI = &get_instance();
        $language_current = $CI->config->item('language');
        if (isset($_SESSION['language_current'])) {
            $language_current = $_SESSION['language_current'];
        }
        return $language_current;
    }
}

if (!function_exists('short_language_current')) {

    function short_language_current()
    {
        $CI = &get_instance();
        $language_current = $CI->config->item('language');
        // print_r($language_current);die();
        $arr_lang = $CI->config->item('language_list');
        if (isset($_SESSION['language_current'])) {
            $language_current = $_SESSION['language_current'];
        }

        return $arr_lang[$language_current];
    }
}

if (!function_exists('pick_language')) {

    function pick_language($data, $struct = 'name_')
    {
        $CI = &get_instance();
        $short_lang = short_language_current();
        $data = (array) $data;
        if (isset($data[$struct . $short_lang]) && $data[$struct . $short_lang] != "") {
            return $struct . $short_lang;
        } else {
            return $struct . 'vi';
        }
    }
}

if (!function_exists('strtofloat')) {

    function strtofloat($str)
    {
        $str = str_replace(".", "", $str); // replace dots (thousand seps) with blancs 
        $str = str_replace(",", ".", $str); // replace ',' with '.'
        if (preg_match("#([0-9\.]+)#", $str, $match)) { // search for number that may contain '.' 
            return floatval($match[0]);
        } else {
            return floatval($str); // take some last chances with floatval 
        }
    }
}
if (!function_exists('split_string')) {

    function split_string($str, $length)
    {
        $str = strip_tags($str);
        if (strlen($str) > $length) {
            $str = mb_substr($str, 0, $length) . "...";
        }
        return $str;
    }
}
if (!function_exists('is_permission')) {

    function is_permission($func)
    {
        $array_permission = $_SESSION['permission'];
        $role = $_SESSION['role'];
        if ($role == 1 || in_array($func, $array_permission)) {
            return true;
        } else {
            return false;
        }
    }
}

if (!function_exists('has_permission')) {

    function has_permission($func)
    {
        $CI = &get_instance();
        $CI->load->model('permission_model');
        $permission = $CI->permission_model->where(array("function" => $func, 'deleted' => 0))->as_array()->get_all();
        if (count($permission)) {
            return true;
        } else {
            return false;
        }
    }
}

if (!function_exists('nestable')) {

    function nestable($array, $column, $parent)
    {
        $return = array_filter((array) $array, function ($item) use ($column, $parent) {
            return $item[$column] == $parent;
        });
        foreach ($return as &$row) {
            $row['child'] = nestable((array) $array, $column, $row['id']);
        }

        return $return;
    }
}

if (!function_exists('array_child_category')) {

    function array_child_category($array, $parent)
    {
        $return = array_filter((array) $array, function ($item) use ($parent) {
            return $item['parent_id'] == $parent;
        });
        $data = array();
        foreach ($return as $row) {
            $data[] = $row['id'];
            $child = array_child_category((array) $array, $row['id']);
            array_merge($data, $child);
        }

        return $data;
    }
}
if (!function_exists('html_menu')) {

    function html_menu()
    {
        $CI = &get_instance();
        $CI->load->model('category_model');
        $category = $CI->category_model->where(array("active" => 1, 'deleted' => 0, 'is_menu' => 1))->order_by('sort', "ASC")->as_array()->get_all();
        //        echo "<pre>";
        //        print_r($)
        echo html_menu_lv1($category, 0);
    }
}
if (!function_exists('html_menu_lv1')) {

    function html_menu_lv1($array, $parent)
    {
        $html = "";
        $return = array_filter((array) $array, function ($item) use ($parent) {
            return $item['parent_id'] == $parent;
        });
        ///Bebin Tag
        $html .= '';
        ///Content
        foreach ($return as $row) {
            //            $id = $row['id'];
            //            $child = array_filter($array, function($item) use($id) {
            //                return $item['parent_id'] == $id;
            //            });
            //            if (count($child) > 0) {
            //                $type = "cm-menu-item-responsive";
            //            } else {
            //                $type = 
            //            }
            $html .= '<li class="item_' . $row['id'] . ' ty-menu__item cm-menu-item-responsive">
                        <a href="' . get_url_category($row['id'], $row['name']) . '" class="ty-menu__item-link">
                            ' . $row['name'] . '
                        </a>';
            $html .= html_menu_lv2($array, $row['id']);
            $html .= '</li>';
        }
        ///End Tag
        $html .= '';

        return $html;
    }
}
if (!function_exists('html_menu_lv2')) {

    function html_menu_lv2($array, $parent)
    {
        $html = "";
        $return = array_filter((array) $array, function ($item) use ($parent) {
            return $item['parent_id'] == $parent;
        });
        if (count($return)) {

            ///Content
            $has_child = FALSE;
            foreach ($return as $row) {
                $id = $row['id'];
                $child = array_filter((array) $array, function ($item) use ($id) {
                    return $item['parent_id'] == $id;
                });
                if (count($child)) {
                    $has_child = true;
                }
            }

            ///Bebin Tag
            if ($has_child) {
                $html .= '<div class="ty-menu__submenu">
                        <ul class="ty-menu__submenu-items ty-menu__submenu-items-multiple cm-responsive-menu-submenu">';
                foreach ($return as $row) {
                    $has_child = true;
                    $html .= '<li class="ty-top-mine__submenu-col">
                                <div class="ty-menu__submenu-item-header">
                                    <a href="' . get_url_category($row['id'], $row['name']) . '" class="ty-menu__submenu-link">' . $row['name'] . '</a>
                                </div>';
                    $html .= html_menu_lv3($array, $row['id']);
                    $html .= '</li>';
                }
            } else {
                $html .= '<div class="ty-menu__submenu">
                        <ul class="ty-menu__submenu-items ty-menu__submenu-items-simple cm-responsive-menu-submenu">';
                foreach ($return as $row) {
                    $html .= '<li class="ty-menu__submenu-item">
                                <a class="ty-menu__submenu-link" href="' . get_url_category($row['id'], $row['name']) . '">' . $row['name'] . '</a>';
                    $html .= '</li>';
                }
            }

            ///End Tag
            $html .= '</ul>
                    </div>';
        }
        return $html;
    }
}
if (!function_exists('html_menu_lv3')) {

    function html_menu_lv3($array, $parent)
    {
        $html = "";
        $return = array_filter((array) $array, function ($item) use ($parent) {
            return $item['parent_id'] == $parent;
        });
        if (count($return)) {

            ///Bebin Tag
            $html .= '<div class="ty-menu__submenu">
                        <ul class="ty-menu__submenu-list cm-responsive-menu-submenu">';
            ///Content
            foreach ($return as $row) {
                $html .= '<li class="ty-menu__submenu-item">
                                <a class="ty-menu__submenu-link" href="' . get_url_category($row['id'], $row['name']) . '">' . $row['name'] . '</a>';
                $html .= '</li>';
            }
            ///End Tag
            $html .= '</ul>
                    </div>';
        }
        return $html;
    }
}


if (!function_exists('html_select_category')) {

    function html_select_category($array, $column, $parent)
    {
        $html = "";
        $return = array_filter((array) $array, function ($item) use ($column, $parent) {
            return $item[$column] == $parent;
        });
        ///Bebin Tag
        //        $html .= '';
        ///Content
        foreach ($return as $row) {
            $html .= '<option value = "' . $row['id'] . '">' . $row['name'] . '</option>';
            $html .= html_select_category($array, $column, $row['id']);
        }
        ///End Tag
        //        $html .= '</ol>';

        return $html;
    }
}

if (!function_exists('html_nestable')) {

    function html_nestable($array, $column, $parent, $controller = '')
    {
        $html = "";
        $return = array_filter((array) $array, function ($item) use ($column, $parent) {
            return $item[$column] == $parent;
        });
        ///Bebin Tag
        if ($parent == 0) {
            $id_nestable = "id='nestable'";
        } else {
            $id_nestable = "";
        }
        $html .= '<ol class="dd-list" ' . $id_nestable . '>';
        ///Content
        foreach ($return as $row) {
            $sub_html = "";
            if ($controller == "menu_header" || $controller == "menu_slide") {
                if ($row['type'] == 1) {
                    $sub_html = "<span class='text-info mr-1'>[Link='" . $row['link'] . "']</span>";
                } elseif ($row['type'] == 2) {
                    $sub_html = "<span class='text-success mr-1'>[Category='" . $row['category']->name_vi . "']</span>";
                } elseif ($row['type'] == 3) {
                    $sub_html = "<span class='text-warning mr-1'>[Topic='" . $row['category']->name_vi . "']</span>";
                } elseif ($row['type'] == 4) {
                    $sub_html = "<span class='text-primary mr-1'>[Khuyến mãi]</span>";
                } elseif ($row['type'] == 5) {
                    $sub_html = "<span class='text-primary mr-1'>[Bài viết]</span>";
                }
            }
            $html .= '<li class="dd-item" id="menuItem_' . $row['id'] . '" data-id="' . $row['id'] . '">
                            <div class="dd-handle">
                             ' . $sub_html . '
                                <div>' . $row['name_vi'] . '</div>
                                <div class="dd-nodrag btn-group ml-auto">
                                    <a class="btn btn-sm btn-outline-light" href="' . base_url() .  "$controller/edit/" . $row['id'] . '">Edit</a> 
                                    <button class="btn btn-sm btn-outline-light dd-item-delete">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </div>
                            </div>';
            $html .= html_nestable((array) $array, $column, $row['id'], $controller);
            $html .= '</li>';
        }
        ///End Tag
        $html .= '</ol>';

        return $html;
    }
}
if (!function_exists('html_page_footer')) {

    function html_page_footer()
    {
        $html = "";
        $CI = &get_instance();
        $CI->load->model('pageweb_model');
        $page = $CI->pageweb_model->where(array("active" => 1, 'deleted' => 0))->as_array()->get_all();
        foreach ($page as $row) {
            $html .= '<li class="ty-footer-menu__item"><a href="' . get_url_page($row['id']) . '">' . $row['title'] . '</a></li>';
        }
        return $html;
    }
}
if (!function_exists('breadcrumbs_category')) {

    function breadcrumbs_category($id, $name, $parent)
    {
        $html = "";
        if ($parent == 0) {
            $html .= '<a href="' . get_url_category($id, $name) . '" class="ty-breadcrumbs__a">' . $name . '</a>';
        } else {
            $CI = &get_instance();
            $CI->load->model('category_model');
            $data_parent = $CI->category_model->where(array("id" => $parent))->as_array()->get();
            $html .= breadcrumbs_category($data_parent['id'], $data_parent['name'], $data_parent['parent_id']);
            $html .= '<span class="ty-breadcrumbs__slash">/</span><a href="' . get_url_category($id, $name) . '" class="ty-breadcrumbs__a">' . $name . '</a>';
        }
        return $html;
    }
}
if (!function_exists('sync_cart')) {

    function sync_cart()
    {

        $CI = &get_instance();
        $items = array(
            'details' => array(),
            'count_product' => 0,
            'amount_product' => 0,
            'paid_amount' => 0,
            'service_fee' => -1
        );
        $CI->load->helper(array('cookie'));
        $CI->load->model('product_model');
        $CI->load->model('user_model');
        $CI->load->model('area_model');

        $cart = array();
        if (get_cookie("DATA_CART") && get_cookie("DATA_CART") != "") {
            $cart = json_decode(get_cookie("DATA_CART"), true);
        }
        if (isset($cart['details']) && count($cart['details']) > 0) {
            //            echo "<pre>";
            //            print_r($cart);
            //            die();
            // $cart =
            foreach ($cart['details'] as $key => $item) {
                $data = array();
                if (!isset($item['id']) || !isset($item['qty'])) {
                    continue;
                }
                $qty = $item['qty'];
                $id = $item['id'];
                $unit_id = isset($item['unit']) ? $item['unit'] : 0;

                $product = $CI->product_model->where(array('id' => $id))->with_foodzone()->with_units()->with_price_km()->get();
                $product = $CI->product_model->format($product);
                $price_this = $product->price;
                if ($unit_id > 0) {
                    foreach ($product->units as $row) {
                        if ($row->id == $unit_id) {
                            $price_this = $row->price;
                        }
                    }
                }
                $product->qty = $qty;
                $product->unit_id = $unit_id;
                $product->amount = $qty * $price_this;
                $items['count_product'] += $qty;
                $items['amount_product'] += $qty * $price_this;

                $items['details'][] = $product;
            }
            //            echo "<pre>";
            //            print_r($items);
            //            die();
            //            $cookie = array(
            //                'name' => 'CART',
            //                'value' => json_encode($items),
            //                'secure' => TRUE
            //            );
            //            $CI->input->set_cookie($co
        }

        $items['paid_amount'] = $items['amount_product'];
        if (get_cookie("AREA_ID") && get_cookie("AREA_ID") != "") {
            $area_id = get_cookie("AREA_ID");

            $area = $CI->area_model->with_fee()->get($area_id);
            if (empty($area)) {
                goto end;
            }
            if (empty($area->fee)) {
                goto end;
            }
            $fees = $area->fee;
            // echo "<pre>";
            // print_r($fees);
            // die();
            foreach ($fees as $fee) {
                $items['service_fee'] = 0;
                $min = $fee->min;
                $max = $fee->max;
                if ($min == 0 || $min == "") {
                    if ($items['paid_amount'] > $max) {
                        continue;
                    }
                } elseif ($max == 0 || $max == "") {
                    if ($items['paid_amount'] <= $min) {
                        continue;
                    }
                } elseif ($items['paid_amount'] <= $min || $items['paid_amount'] > $max) {
                    continue;
                }

                $items['service_fee'] = $fee->fee;
                $items['paid_amount'] += $items['service_fee'];
                break;
            }
        }
        end:
        return $items;
    }
}

if (!function_exists('NumberToText')) {

    function NumberToText($total)
    {
        // return (language_current());
        return "";
        if (language_current() == "english") {
            return NumberToTextEN($total) . " dong";
        } else {
            return NumberToTextVN($total);
        }
    }
}
if (!function_exists('NumberToTextVN')) {

    function NumberToTextVN($total)
    {

        $rs = "";
        $total = round($total, 0);
        $ch = array("không", "một", "hai", "ba", "bốn", "năm", "sáu", "bảy", "tám", "chín");
        $rch = array("lẻ", "mốt", "", "", "", "lăm");
        $u = array("", "mươi", "trăm", "ngàn", "", "", "triệu", "", "", "tỷ", "", "", "ngàn", "", "", "triệu");
        $nstr = (string) $total;

        $len = strlen($nstr);

        for ($i = 0; $i < $len; $i++) {
            $n[$len - 1 - $i] = substr($nstr, $i, 1);
        }
        // print_r($n);
        for ($i = $len - 1; $i >= 0; $i--) {
            if ($i % 3 == 2) // số 0 ở hàng trăm
            {
                if ($n[$i] == 0 && $n[$i - 1] == 0 && $n[$i - 2] == 0) continue; //nếu cả 3 số là 0 thì bỏ qua không đọc
            } else if ($i % 3 == 1) // số ở hàng chục
            {
                if ($n[$i] == 0) {
                    if ($n[$i - 1] == 0) {
                        continue;
                    } // nếu hàng chục và hàng đơn vị đều là 0 thì bỏ qua.
                    else {
                        $rs .= " " . $rch[$n[$i]];
                        continue; // hàng chục là 0 thì bỏ qua, đọc số hàng đơn vị
                    }
                }
                if ($n[$i] == 1) //nếu số hàng chục là 1 thì đọc là mười
                {
                    $rs .= " mười";
                    continue;
                }
            } else if ($i != $len - 1) // số ở hàng đơn vị (không phải là số đầu tiên)
            {
                if ($n[$i] == 0) // số hàng đơn vị là 0 thì chỉ đọc đơn vị
                {
                    if ($i + 2 <= $len - 1 && $n[$i + 2] == 0 && $n[$i + 1] == 0) continue;
                    $rs .= " " . ($i % 3 == 0 ? $u[$i] : $u[$i % 3]);
                    continue;
                }
                if ($n[$i] == 1) // nếu là 1 thì tùy vào số hàng chục mà đọc: 0,1: một / còn lại: mốt
                {
                    $rs .= " " . (($n[$i + 1] == 1 || $n[$i + 1] == 0) ? $ch[$n[$i]] : $rch[$n[$i]]);
                    $rs .= " " . ($i % 3 == 0 ? $u[$i] : $u[$i % 3]);
                    continue;
                }
                if ($n[$i] == 5) // cách đọc số 5
                {
                    if ($n[$i + 1] != 0) //nếu số hàng chục khác 0 thì đọc số 5 là lăm
                    {
                        $rs .= " " . $rch[$n[$i]]; // đọc số
                        $rs .= " " . ($i % 3 == 0 ? $u[$i] : $u[$i % 3]); // đọc đơn vị
                        continue;
                    }
                }
            }

            $rs .= ($rs == "" ? " " : ", ") . $ch[$n[$i]]; // đọc số
            $rs .= " " . ($i % 3 == 0 ? $u[$i] : $u[$i % 3]); // đọc đơn vị
        }
        // print_r($rs);
        if ($rs[strlen($rs) - 1] != ' ')
            $rs .= " đồng";
        else
            $rs .= "đồng";

        if (strlen($rs) > 2) {
            $rs1 = substr($rs, 0, 2);
            $rs1 = strtoupper($rs1);
            $rs = substr($rs, 2);
            $rs = $rs1 . $rs;
        }
        $rs = trim($rs);
        $rs = str_replace("lẻ,", "lẻ", $rs);
        $rs = str_replace("mươi,", "mươi", $rs);
        $rs = str_replace("trăm,", "trăm", $rs);
        $rs = str_replace("mười,", "mười", $rs);

        return $rs;
    }
}

if (!function_exists('NumberToTextJP')) {

    function NumberToTextJP($total)
    {

        $rs = "";
        $total = round($total, 0);
        $ch = array("ゼロ", "一", "ニ", "三", "四", "五", "六", "七", "八", "九");
        $rch = array("十", "一", "", "", "", "五");
        $u = array("", "十", "百", "千", "", "", "百万", "", "", "十億", "", "", "千", "", "", "百万");

        $nstr = (string) $total;

        $len = strlen($nstr);

        for ($i = 0; $i < $len; $i++) {
            $n[$len - 1 - $i] = substr($nstr, $i, 1);
        }
        // print_r($n);
        for ($i = $len - 1; $i >= 0; $i--) {
            if ($i % 3 == 2) // số 0 ở hàng trăm
            {
                if ($n[$i] == 0 && $n[$i - 1] == 0 && $n[$i - 2] == 0) continue; //nếu cả 3 số là 0 thì bỏ qua không đọc
            } else if ($i % 3 == 1) // số ở hàng chục
            {
                if ($n[$i] == 0) {
                    if ($n[$i - 1] == 0) {
                        continue;
                    } // nếu hàng chục và hàng đơn vị đều là 0 thì bỏ qua.
                    else {
                        $rs .= " " . $rch[$n[$i]];
                        continue; // hàng chục là 0 thì bỏ qua, đọc số hàng đơn vị
                    }
                }
                if ($n[$i] == 1) //nếu số hàng chục là 1 thì đọc là mười
                {
                    $rs .= " 十";
                    continue;
                }
            } else if ($i != $len - 1) // số ở hàng đơn vị (không phải là số đầu tiên)
            {
                if ($n[$i] == 0) // số hàng đơn vị là 0 thì chỉ đọc đơn vị
                {
                    if ($i + 2 <= $len - 1 && $n[$i + 2] == 0 && $n[$i + 1] == 0) continue;
                    $rs .= " " . ($i % 3 == 0 ? $u[$i] : $u[$i % 3]);
                    continue;
                }
                if ($n[$i] == 1) // nếu là 1 thì tùy vào số hàng chục mà đọc: 0,1: một / còn lại: mốt
                {
                    $rs .= " " . (($n[$i + 1] == 1 || $n[$i + 1] == 0) ? $ch[$n[$i]] : $rch[$n[$i]]);
                    $rs .= " " . ($i % 3 == 0 ? $u[$i] : $u[$i % 3]);
                    continue;
                }
                if ($n[$i] == 5) // cách đọc số 5
                {
                    if ($n[$i + 1] != 0) //nếu số hàng chục khác 0 thì đọc số 5 là lăm
                    {
                        $rs .= " " . $rch[$n[$i]]; // đọc số
                        $rs .= " " . ($i % 3 == 0 ? $u[$i] : $u[$i % 3]); // đọc đơn vị
                        continue;
                    }
                }
            }

            $rs .= ($rs == "" ? " " : ", ") . $ch[$n[$i]]; // đọc số
            $rs .= " " . ($i % 3 == 0 ? $u[$i] : $u[$i % 3]); // đọc đơn vị
        }
        // print_r($rs);
        if ($rs[strlen($rs) - 1] != ' ')
            $rs .= " đồng";
        else
            $rs .= "đồng";

        if (strlen($rs) > 2) {
            $rs1 = substr($rs, 0, 2);
            $rs1 = strtoupper($rs1);
            $rs = substr($rs, 2);
            $rs = $rs1 . $rs;
        }
        $rs = trim($rs);
        $rs = str_replace("lẻ,", "lẻ", $rs);
        $rs = str_replace("mươi,", "mươi", $rs);
        $rs = str_replace("trăm,", "trăm", $rs);
        $rs = str_replace("mười,", "mười", $rs);

        return $rs;
    }
}

if (!function_exists('NumberToTextEN')) {

    function NumberToTextEN($number)
    {

        if (($number < 0) || ($number > 999999999)) {
            throw new Exception("Number is out of range");
        }

        $Gn = floor($number / 1000000);
        /* Millions (giga) */
        $number -= $Gn * 1000000;
        $kn = floor($number / 1000);
        /* Thousands (kilo) */
        $number -= $kn * 1000;
        $Hn = floor($number / 100);
        /* Hundreds (hecto) */
        $number -= $Hn * 100;
        $Dn = floor($number / 10);
        /* Tens (deca) */
        $n = $number % 10;
        /* Ones */

        $res = "";

        if ($Gn) {
            $res .= NumberToTextEN($Gn) .  "Million";
        }

        if ($kn) {
            $res .= (empty($res) ? "" : " ") . NumberToTextEN($kn) . " Thousand";
        }

        if ($Hn) {
            $res .= (empty($res) ? "" : " ") . NumberToTextEN($Hn) . " Hundred";
        }

        $ones = array("", "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen", "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eightteen", "Nineteen");
        $tens = array("", "", "Twenty", "Thirty", "Fourty", "Fifty", "Sixty", "Seventy", "Eigthy", "Ninety");

        if ($Dn || $n) {
            if (!empty($res)) {
                $res .= " and ";
            }

            if ($Dn < 2) {
                $res .= $ones[$Dn * 10 + $n];
            } else {
                $res .= $tens[$Dn];

                if ($n) {
                    $res .= "-" . $ones[$n];
                }
            }
        }

        if (empty($res)) {
            $res = "zero";
        }

        return $res;
    }
}
if (!function_exists('is_wishlist')) {

    function is_wishlist($product_id)
    {
        $wish_list = array();
        if (get_cookie("WISHLIST") && get_cookie("WISHLIST") != "") {
            $wish_list = json_decode(get_cookie("WISHLIST"), true);
        }
        //            echo $product_id;
        //            print_r($wish_list);
        //            var_dump(in_array($product_id, $wish_list));
        //            die();
        return in_array($product_id, $wish_list);
    }
}

if (!function_exists('html_img_second')) {

    function html_img_second($product_id)
    {

        $db = &DB();
        $where = "WHERE a.product_id = $product_id";
        $sql = "SELECT b.* FROM product_hinhanh as a JOIN tbl_hinhanh as b ON a.hinhanh_id = b.id_hinhanh $where ";
        //        echo $sql . "<br>";
        $query = $db->query($sql);
        $rows = $query->result_array();
        if (empty($rows))
            return "";
        if (count($rows) == 1) {
            $row = $rows[0];
        } else {
            $row = $rows[1];
        }
        $html = "<img src='" . base_url() . $row['src'] . "' alt='" . $row['real_hinhanh'] . "'/>";


        return $html;
    }
}

if (!function_exists('time_elapsed_string')) {
    function time_elapsed_string($datetime, $full = false)
    {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }
}
