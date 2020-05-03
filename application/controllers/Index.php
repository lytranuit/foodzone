<?php

class Index extends MY_Controller
{

    function __construct()
    {
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
        array_push($this->data['stylesheet_tag'], base_url() . "public/lib/fastfood/font.css?v=$version");
        array_push($this->data['stylesheet_tag'], base_url() . "public/lib/fastfood/style.css?v=$version");

        $this->data['javascript_tag'] = array(
            //            base_url() . "public/lib/bootstrap/js/jquery-slim.min.js",
            "https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js",
            base_url() . "public/lib/bootstrap/js/popper.min.js",
            base_url() . "public/lib/bootstrap/js/bootstrap.min.js",

            base_url() . "public/lib/rd_nav/js/jquery.rd-navbar.min.js", // navbar
            "https://sp.zalo.me/plugins/sdk.js",
            // base_url() . "public/js/main.js?v=$version"
        );
    }

    public function _remap($method, $params = array())
    {
        if (!method_exists($this, $method)) {
            show_404();
        }
        $this->$method($params);
    }

    public function page_404()
    {
        echo $this->blade->view()->make('page/404-page', $this->data)->render();
    }

    public function index()
    {
        $version = $this->config->item("version");


        load_slick($this->data);
        load_swiper($this->data);
        load_easyResponsiveTabs($this->data);
        array_push($this->data['javascript_tag'], base_url() . "public/js/index.js?v=" . $version);
        echo $this->blade->view()->make('page/page', $this->data)->render();
    }

    public function post($params)
    {
        $id = $params[0];
        $this->load->model("news_model");
        $post = $this->news_model->where(array('id' => $id, 'deleted' => 0))->with_user()->with_image()->get();
        if (empty($post))
            show_404();
        $this->data['post'] = $post;
        // echo "<pre>";
        // print_r($post);
        // die();
        $this->data['title'] = $post->title;
        load_froala_view($this->data);
        $version = $this->config->item("version");
        array_push($this->data['javascript_tag'], base_url() . "public/js/index.js?v=" . $version);
        echo $this->blade->view()->make('page/page', $this->data)->render();
    }

    public function details($params)
    {
        $id = $params[0];
        $version = $this->config->item("version");
        $this->load->model("product_model");
        $product = $this->product_model->with_image()->with_price_km('where: NOW() BETWEEN date_from AND date_to')->with_category()->get($id);
        if (empty($product))
            show_404();
        $this->data['title'] = $product->{pick_language($product, 'name_')};
        $this->data['product'] = $product;
        load_easyzoom($this->data);
        load_easyResponsiveTabs($this->data);
        load_froala_view($this->data);
        $this->data['product']->str_list_category = implode(" / ", array_map(function ($item) {
            return $item->{pick_language($item, "name_")};
        }, array_values((array) $this->data['product']->category)));
        if (!empty($this->data['product']->price_km)) {
            $price_km = array_values((array) $this->data['product']->price_km);
            $this->data['product']->km_price = $price_km[0]->price;
        }
        // echo "<pre>";
        // print_r($this->data['product']);
        // die();
        array_push($this->data['javascript_tag'], base_url() . "public/js/index.js?v=" . $version);
        echo $this->blade->view()->make('page/page', $this->data)->render();
    }
    public function set_language($params)
    {
        $language = $params[0];
        $_SESSION['language_current'] = $language;

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    public function category($params)
    {
        $id = $params[0];
        if ($id == 1) {
            $this->data['title'] = "Ready to Eat";
        } else {
            $this->data['title'] = "Ready to Cook";
        }

        $this->load->model("category_model");
        $this->load->model("product_category_model");
        $this->load->model("product_model");
        $list_category = $this->category_model->where(array('deleted' => 0, 'active' => 1, 'menu_id' => $id))->order_by('order', 'ASC')->get_all();
        foreach ($list_category as &$row) {
            $row->product = $this->product_model->where("deleted = 0 and active = 1 and id IN(SELECT product_id FROM fz_product_category WHERE category_id = $row->id)", null, null, null, null, true)->order_by('order', 'ASC')->with_price_km('where: NOW() BETWEEN date_from AND date_to')->with_image()->limit(20)->get_all();
        }
        $this->data['list_category'] = $list_category;
        $version = $this->config->item("version");

        array_push($this->data['javascript_tag'], base_url() . "public/lib/isotope/isotope.min.js");
        array_push($this->data['javascript_tag'], base_url() . "public/js/index.js?v=" . $version);
        echo $this->blade->view()->make('page/page', $this->data)->render();
    }

    public function search()
    {

        $version = $this->config->item("version");
        array_push($this->data['javascript_tag'], base_url() . "public/js/index.js?v=" . $version);
        echo $this->blade->view()->make('page/page', $this->data)->render();
    }

    public function contact()
    {


        $this->load->model("option_model");
        $this->data['options'] = $this->option_model->all_option();
        $version = $this->config->item("version");
        array_push($this->data['javascript_tag'], base_url() . "public/js/index.js?v=" . $version);
        echo $this->blade->view()->make('page/page', $this->data)->render();
    }

    public function news()
    {
        $this->load->model("news_model");
        $list = $this->news_model->where(array('deleted' => 0))->with_user()->with_image()->order_by('id', 'DESC')->get_all();

        $this->data['list'] = $list;
        $version = $this->config->item("version");
        array_push($this->data['javascript_tag'], base_url() . "public/js/index.js?v=" . $version);
        echo $this->blade->view()->make('page/page', $this->data)->render();
    }
    function login()
    {
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

    function cart()
    {
        $this->data['cart'] = sync_cart();
        //        $this->data['stylesheet_tag'] = array();
        array_push($this->data['stylesheet_tag'], base_url() . "public/assets/checkout.css");

        //        echo "<pre>";
        //        print_r($this->data['']);
        //        die();
        echo $this->blade->view()->make('page/page', $this->data)->render();
    }

    function checkout()
    {
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

    function complete()
    {
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
    function logout()
    {

        $this->data['title'] = "Logout";

        // log the user out
        $logout = $this->ion_auth->logout();

        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    public function success()
    {
        echo json_encode(1);
    }
}
