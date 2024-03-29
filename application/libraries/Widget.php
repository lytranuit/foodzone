<?php

use Philo\Blade\Blade;

class Widget
{

    private $data = array();
    protected $CI;

    function __construct()
    {
        $this->CI = &get_instance();
        $this->CI->lang->load(array('home'));
        //        $this->CI->load->model("user_model");
        ////////////////////////////////
        $views = APPPATH . "views/";
        $cache = APPPATH . "cache/";
        $this->blade = new Blade($views, $cache);
    }

    public function header()
    {
        $this->CI->load->model("user_model");
        $this->CI->load->model("setting_model");

        $this->data['is_login'] = $this->CI->user_model->logged_in();
        $this->data['userdata'] = $this->CI->session->userdata();
        $this->CI->load->model("option_model");
        $this->data['options'] = $this->CI->option_model->all_option();
        $this->data['popup'] = $this->CI->setting_model->get_setting("popup", "system_popup");
        // print_r($this->data['popup']);
        // die();
        $this->CI->load->model("menu_header_model");
        $list_menu = $this->CI->menu_header_model->where(array('deleted' => 0))->order_by('order', 'ASC')->get_all();
        $list_parent = array_filter((array) $list_menu, function ($item) {
            return $item->parent_id == 0;
        });
        foreach ($list_parent as &$row) {
            $child = array_filter((array) $list_menu, function ($item) use ($row) {
                return $item->parent_id == $row->id;
            });
            foreach ($child as &$row2) {
                $child2 = array_filter((array) $list_menu, function ($item) use ($row2) {
                    return $item->parent_id == $row2->id;
                });
                $row2->child = $child2;
            }
            $row->child = $child;
        }
        // echo "<pre>";
        // print_r($list_menu);
        // die();
        $this->data['list_menu'] = $list_parent;
        echo $this->blade->view()->make('widget/header', $this->data)->render();
    }

    public function footer()
    {
        $this->CI->load->model("option_model");
        $this->data['options'] = $this->CI->option_model->all_option();
        echo $this->blade->view()->make('widget/footer', $this->data)->render();
    }

    public function post_header($name)
    {
        $this->data['name'] = $name;
        echo $this->blade->view()->make('widget/post_header', $this->data)->render();
    }

    public function right()
    {
        $this->CI->load->model("category_model");
        $list_category = $this->CI->category_model->where(array('deleted' => 0, 'active' => 1))->order_by('order', 'ASC')->get_all();
        $this->data['list_cate'] = array_filter((array) $list_category, function ($item) {
            return $item->menu_id == 1;
        });
        $this->data['list_topics'] = array_filter((array) $list_category, function ($item) {
            return $item->menu_id == 2 && $item->parent_id != 0;
        });
        $this->CI->load->model("news_model");
        $this->data['news'] = $this->CI->news_model->where(array('deleted' => 0))->with_image()->order_by("id", "DESC")->limit(5)->get_all();
        echo $this->blade->view()->make('widget/right', $this->data)->render();
    }

    public function index_slider()
    {
        $this->CI->load->model("slider_model");
        $this->data['list_slider'] = $this->CI->slider_model->where(array('deleted' => 0))->order_by('order', 'ASC')->with_image()->get_all();


        $this->CI->load->model("menu_slide_model");
        $list_menu = $this->CI->menu_slide_model->where(array('deleted' => 0))->order_by('order', 'ASC')->get_all();
        if (!empty($list_menu)) {
            $list_parent = array_filter((array) $list_menu, function ($item) {
                return $item->parent_id == 0;
            });
            foreach ($list_parent as &$row) {
                $child = array_filter((array) $list_menu, function ($item) use ($row) {
                    return $item->parent_id == $row->id;
                });
                $row->child = $child;
            }
        } else {
            $list_parent = array();
        }
        // echo "<pre>";
        // print_r($list_menu);
        // die();
        $this->data['list_menu'] = $list_parent;
        echo $this->blade->view()->make('widget/index_slider', $this->data)->render();
    }
    public function index_eat()
    {
        // $this->CI->load->model("category_model");
        $this->CI->load->model("category_model");
        $this->CI->load->model("product_category_model");
        $this->CI->load->model("product_model");
        $list_category = $this->CI->category_model->where(array('deleted' => 0, 'active' => 1, 'menu_id' => 1))->order_by('order', 'ASC')->get_all();
        $count = 0;
        // echo "<pre>";
        foreach ($list_category as &$row) {
            $row->product = $this->CI->product_model->where("deleted = 0 and id IN(SELECT product_id FROM fz_product_category WHERE category_id = $row->id)", null, null, null, null, true)->with_image()->with_price_km('order_inside:date_from desc')->get_all();
            // print_r($row->product);

            $count += count($row->product);
        }
        // echo "<pre>";
        // print_r($count);
        // die();
        $this->data['list_category'] = $list_category;
        echo $this->blade->view()->make('widget/index_eat', $this->data)->render();
    }
    public function index_cook()
    {
        $this->CI->load->model("category_model");
        $this->CI->load->model("product_category_model");
        $this->CI->load->model("product_model");
        $list_category = $this->CI->category_model->where(array('deleted' => 0, 'active' => 1, 'menu_id' => 2))->order_by('order', 'ASC')->get_all();
        foreach ($list_category as &$row) {
            $row->product = $this->CI->product_model->where("deleted = 0 and active = 1 and id IN(SELECT product_id FROM fz_product_category WHERE category_id = $row->id)", null, null, null, null, true)->order_by('order', 'ASC')->with_price_km('where: NOW() BETWEEN date_from AND date_to')->with_image()->limit(20)->get_all();
        }
        $this->data['list_category'] = $list_category;
        echo $this->blade->view()->make('widget/index_cook', $this->data)->render();
    }
    function index_banner()
    {
        $this->CI->load->model("banner_model");
        $this->data['banner'] = $this->CI->banner_model->where(array('deleted' => 0))->with_hinhanh()->as_object()->get_all();
        echo $this->blade->view()->make('widget/index_banner', $this->data)->render();
    }

    function index_product()
    {
        $this->CI->load->model("product_model");
        $this->CI->load->model("category_model");
        $all_category = $this->CI->category_model->where(array("deleted" => 0, 'is_home' => 1, 'active' => 1, 'parent_id' => 0))->order_by('sort', "ASC")->as_array()->get_all();
        foreach ($all_category as &$row) {
            $row['product'] = $this->CI->product_model->get_product_by_category($row['id'], "", NULL, NULL, 8);
        }
        $this->data['category'] = $all_category;
        echo $this->blade->view()->make('widget/index_product', $this->data)->render();
    }



    function page()
    {

        $this->CI->load->model("pageweb_model");
        $this->data['all_page'] = $this->CI->pageweb_model->where(array("deleted" => 0, 'active' => 1))->as_array()->get_all();

        echo $this->blade->view()->make('widget/widget_page', $this->data)->render();
    }

    function product_hot()
    {
        $this->CI->load->model("product_model");
        $this->data['product'] = $this->CI->product_model->get_product_by_category(29);
        echo $this->blade->view()->make('widget/widget_product_hot', $this->data)->render();
    }
}
