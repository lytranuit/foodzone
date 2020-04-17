<?php

class Index extends MY_Controller {

    function __construct() {
        parent::__construct();
        ////////////////////////////////
        ////////////
        $this->data['is_login'] = $this->ion_auth->logged_in();
        $this->data['userdata'] = $this->session->userdata();
        $version = $this->config->item("version");
        $this->data['stylesheet_tag'] = array(
            base_url() . "public/lib/fonts/fontawesome/css/fontawesome-all.css",
            base_url() . "public/lib/bootstrap/css/bootstrap.css",
            base_url() . "public/css/style.css?v=$version"
        );
        array_push($this->data['stylesheet_tag'], base_url() . "public/lib/fastfood/font.css");
        array_push($this->data['stylesheet_tag'], base_url() . "public/lib/fastfood/style.css");

        $this->data['javascript_tag'] = array(
//            base_url() . "public/lib/bootstrap/js/jquery-slim.min.js",
            "https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js",
            base_url() . "public/lib/bootstrap/js/popper.min.js",
            base_url() . "public/lib/bootstrap/js/bootstrap.min.js",
            base_url() . "public/lib/rd_nav/js/jquery.rd-navbar.min.js",
            base_url() . "public/js/main.js?v=$version"
        );
    }

    public function _remap($method, $params = array()) {
        if (!method_exists($this, $method)) {
            show_404();
        }
        $this->$method($params);
    }

    public function page_404() {
        echo $this->blade->view()->make('page/404-page', $this->data)->render();
    }

    public function index() {
        $this->load->model("slider_model");
        $this->load->model("hinhanh_model");

        $arr_slider = $this->slider_model->where(array('deleted' => 0))->as_array()->get_all();
        foreach ($arr_slider as &$slider) {
            $hinh = $this->hinhanh_model->where(array('id_hinhanh' => $slider['id_hinhanh']))->as_array()->get_all();
            $slider['hinh'] = $hinh[0];
        }
        $this->data['list_silder'] = $arr_slider;


        $version = $this->config->item("version");


        array_push($this->data['javascript_tag'], base_url() . "public/lib/swiper/jquery.touchSwiper.js");
        array_push($this->data['javascript_tag'], base_url() . "public/lib/easy_responsive_tabs/js/easyResponsiveTabs.js");
        array_push($this->data['javascript_tag'], base_url() . "public/lib/slick/slick.min.js");
        array_push($this->data['javascript_tag'], base_url() . "public/js/index.js?v=" . $version);
        echo $this->blade->view()->make('page/page', $this->data)->render();
    }

    public function post() {

        echo $this->blade->view()->make('page/page', $this->data)->render();
    }

    public function details() {

        echo $this->blade->view()->make('page/page', $this->data)->render();
    }

    function login() {
        $this->data['title'] = lang('login');
        if ($this->input->post('identity') != "" && $this->input->post('password') != "") {
            // check to see if the user is logging in
            // check for "remember me"
            $remember = (bool) $this->input->post('remember');
            if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember)) {
                redirect('/admin', 'refresh');
            } else {
                // if the login was un-successful
                // redirect them back to the login page
                $this->session->set_flashdata('message', lang('alert_501'));
                redirect('index/login', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
            }
        } else {
            // the user is not logging in so display the login page
            // set the flash data error message if there is one
            $this->data['message'] = $this->session->flashdata('message');
            echo $this->blade->view()->make('page/login', $this->data)->render();
        }
    }

    function cart() {
        $this->data['cart'] = sync_cart();
        //        $this->data['stylesheet_tag'] = array();
        array_push($this->data['stylesheet_tag'], base_url() . "public/assets/checkout.css");

        //        echo "<pre>";
        //        print_r($this->data['']);
        //        die();
        echo $this->blade->view()->make('page/page', $this->data)->render();
    }

    function checkout() {
        $this->data['cart'] = sync_cart();
        $this->load->model("user_model");
        //        $this->data['stylesheet_tag'] = array();
        array_push($this->data['stylesheet_tag'], base_url() . "public/assets/checkout.css");

        //        echo "<pre>";
        //        print_r($this->data['userdata']);
        //        die();
        if (!isset($this->data['userdata']['user_id'])) {
            $this->data['userdata']['user_id'] = 0;
            $this->data['userdata']['name'] = "";
            $this->data['userdata']['email'] = "";
            $this->data['userdata']['address'] = "";
            $this->data['userdata']['phone'] = "";
        } else {
            $user_id = $this->data['userdata']['user_id'];
            $this->data['userdata'] = $this->user_model->where(array("id" => $user_id))->as_array()->get();
            $this->data['userdata']['user_id'] = $user_id;
            $this->data['userdata']['name'] = $this->data['userdata']['last_name'];
        }
        echo $this->blade->view()->make('page/page', $this->data)->render();
    }

    function complete() {
        $cart = sync_cart();
        if (isset($_POST) && count($_POST) && count($cart['details'])) {
            $this->load->model("saleorder_model");
            $this->load->model("saleorderline_model");
            $array = array(
                'order_date' => date("Y-m-d H:i:s"),
                'customer_name' => $_POST['name'],
                'customer_phone' => $_POST['phone'],
                'customer_email' => $_POST['email'],
                'customer_address' => $_POST['address'],
                'user_id' => $_POST['user_id'],
                'notes' => $_POST['notes'],
                'amount' => $cart['amount_product'],
                'total_amount' => $cart['amount_product']
            );
            $order_id = $this->saleorder_model->insert($array);
            foreach ($cart['details'] as $row) {
                $data_up = array(
                    'order_id' => $order_id,
                    'product_id' => $row['product_id'],
                    'image_url' => $row['image_url'],
                    'code' => $row['code'],
                    'name' => $row['name'],
                    'quantity' => $row['qty'],
                    'price' => $row['price'],
                    'amount' => $row['qty'] * $row['price']
                );
                $this->saleorderline_model->insert($data_up);
            }
            /*
             * NEW DEBT
             */
            if ($_POST['user_id'] > 0) {
                $user_id = $_POST['user_id'];
                $this->load->model("debtpaid_model");
                $this->load->model("user_model");
                $data['date'] = time();
                $data['user_id'] = $user_id;
                $data['paid_amount'] = 0 - $cart['amount_product'];
                $data['note'] = "Đơn hàng #$order_id";
                $data_up = $this->debtpaid_model->create_object($data);
                $this->debtpaid_model->insert($data_up);
                $tin = $this->user_model->where(array('id' => $user_id))->with_paids()->as_object()->get();
                $total_paid_amount = 0;
                if ($tin->paids) {
                    foreach ($tin->paids as $row) {
                        $total_paid_amount += $row->paid_amount;
                    }
                }
                $data['debt'] = $total_paid_amount;
                $data_up = $this->user_model->create_object($data);
                $this->user_model->update($data_up, $user_id);
            }
            /////////////////
            $this->data['cart'] = $cart;
            $this->load->helper('cookie');
            delete_cookie("CART");
            array_push($this->data['stylesheet_tag'], base_url() . "public/assets/checkout.css");
            echo $this->blade->view()->make('page/page', $this->data)->render();
        } else {
            redirect("index", 'refresh');
        }
    }

    // log the user out
    function logout() {

        $this->data['title'] = "Logout";

        // log the user out
        $logout = $this->ion_auth->logout();

        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    public function success() {
        echo json_encode(1);
    }

}
