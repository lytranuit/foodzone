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
        //        $this->data['is_login'] = $this->CI->user_model->logged_in();
        //        $this->data['userdata'] = $this->CI->session->userdata();
        ////////////////////////////////
        $views = APPPATH . "views/";
        $cache = APPPATH . "cache/";
        $this->blade = new Blade($views, $cache);
    }

    public function header()
    {

        $this->CI->load->model("option_model");
        $this->data['options'] = $this->CI->option_model->all_option();
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
        echo $this->blade->view()->make('widget/right', $this->data)->render();
    }

    public function nav_menu_mobile()
    {
        $this->CI->load->model("category_model");
        $all_category = $this->CI->category_model->where(array("deleted" => 0, 'is_menu' => 1, 'active' => 1))->order_by('sort', "ASC")->with_hinhanh()->as_array()->get_all();

        $cate_level1 = array_values(array_filter($all_category, function ($item) {
            return $item['parent_id'] == 0;
        }));
        foreach ($cate_level1 as &$cate) {
            $cate_id = $cate['id'];
            $child = array_values(array_filter($all_category, function ($item) use ($cate_id) {
                return $item['parent_id'] == $cate_id;
            }));
            $cate['child'] = $child;
        }
        $this->data['cate_level1'] = $cate_level1;
        echo $this->blade->view()->make('widget/nav_menu_mobile', $this->data)->render();
    }

    public function nav_menu()
    {
        $this->CI->load->model("category_model");
        $all_category = $this->CI->category_model->where(array("deleted" => 0, 'is_menu' => 1, 'active' => 1))->order_by('sort', "ASC")->with_hinhanh()->as_array()->get_all();

        $cate_level1 = array_values(array_filter($all_category, function ($item) {
            return $item['parent_id'] == 0;
        }));
        foreach ($cate_level1 as &$cate) {
            $cate_id = $cate['id'];
            $child = array_values(array_filter($all_category, function ($item) use ($cate_id) {
                return $item['parent_id'] == $cate_id;
            }));
            $cate['child'] = $child;
        }
        $this->data['cate_level1'] = $cate_level1;
        echo $this->blade->view()->make('widget/nav_menu', $this->data)->render();
    }

    public function index_slider()
    {
        $this->CI->load->model("slider_model");
        $this->data['list_silder'] = $this->CI->slider_model->where(array('deleted' => 0))->with_image()->get_all();

        echo $this->blade->view()->make('widget/index_slider', $this->data)->render();
    }
    public function index_eat()
    {
        // $this->CI->load->model("category_model");
        $this->CI->load->model("category_model");
        $this->CI->load->model("product_category_model");
        $this->CI->load->model("product_model");
        $list_category = $this->CI->category_model->where(array('deleted' => 0, 'active' => 1, 'menu_id' => 1))->order_by('order', 'ASC')->get_all();
        foreach ($list_category as &$row) {
            $row->product = $this->CI->product_model->where("deleted = 0 and id IN(SELECT product_id FROM fz_product_category WHERE category_id = $row->id)", null, null, null, null, true)->with_price_km('where: NOW() BETWEEN date_from AND date_to')->with_image()->limit(20)->get_all();
        }
        // echo "<pre>";
        // print_r($list_category);
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

    function index_lookbook()
    {
        $this->CI->load->model("lookbook_model");
        $this->data['all_obj'] = $this->CI->lookbook_model->where(array("deleted" => 0, 'active' => 1))->order_by('date', "DESC")->with_hinhanh()->as_object()->get_all();

        echo $this->blade->view()->make('widget/index_lookbook', $this->data)->render();
    }

    public function index_contact()
    {
        echo $this->blade->view()->make('widget/index_contact', $this->data)->render();
    }

    function seen()
    {
        echo $this->blade->view()->make('widget/widget_seen', $this->data)->render();
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