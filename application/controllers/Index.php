<?php
// use Hybridauth\Hybridauth; 
class Index extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        ////////////////////////////////
        ////////////
        $this->data['is_login'] = $this->ion_auth->logged_in();
        $this->data['userdata'] = $this->session->userdata();

        // print_r( $this->data['userdata']);die();
        $version = $this->config->item("version");
        $this->data['stylesheet_tag'] = array(
            base_url() . "public/lib/fonts/fontawesome/css/fontawesome-all.css",
            base_url() . "public/lib/bootstrap/css/bootstrap.css"
        );
        array_push($this->data['stylesheet_tag'], base_url() . "public/lib/fastfood/font.css?v=$version");
        array_push($this->data['stylesheet_tag'], base_url() . "public/lib/fastfood/style.css?v=$version");
        array_push($this->data['stylesheet_tag'], base_url() . "public/css/style.css?v=$version");

        $this->data['javascript_tag'] = array(
            //            base_url() . "public/lib/bootstrap/js/jquery-slim.min.js",
            "https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js",
            base_url() . "public/lib/bootstrap/js/popper.min.js",
            base_url() . "public/lib/bootstrap/js/bootstrap.min.js",
            base_url() . "public/lib/cookie/jquery.cookies.2.2.0.min.js",

            // base_url() . "public/lib/UItoTop/easing.js",
            // base_url() . "public/lib/UItoTop/jquery.ui.totop.js",
            base_url() . "public/lib/rd_nav/js/jquery.rd-navbar.min.js", // navbar
            "https://sp.zalo.me/plugins/sdk.js",
            base_url() . "public/js/main.js?v=$version"
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
        load_fancybox($this->data);
        load_slick($this->data);
        // load_swiper($this->data);
        // load_easyResponsiveTabs($this->data);
        // load_autonumberic($this->data);
        array_push($this->data['javascript_tag'], base_url() . "public/js/index.js?v=" . $version);

        $this->load->model("category_model");
        $this->load->model("product_model");
        $list_category = $this->category_model->where(array('deleted' => 0, 'active' => 1, 'is_home' => 1, 'parent_id' => 0, 'menu_id' => 1))->order_by('order', 'ASC')->get_all();
        foreach ($list_category as &$row) {
            $row->product = $this->product_model->where("deleted = 0 and active = 1 and id IN(SELECT product_id FROM fz_product_category WHERE category_id = $row->id)", null, null, null, null, true)->order_by('order', 'DESC')->with_units()->with_price_km()->with_image()->limit(12)->get_all();
            foreach ($row->product as &$row_format) {
                $row_format = $this->product_model->format($row_format);
            }
        }
        $list_topics = $this->category_model->where(array('deleted' => 0, 'active' => 1, 'is_home' => 1, 'parent_id' => 0, 'menu_id' => 2))->with_image()->order_by('order', 'ASC')->get_all();
        // foreach ($list_category as &$row) {
        //     $row->product = $this->product_model->where("deleted = 0 and active = 1 and id IN(SELECT product_id FROM fz_product_category WHERE category_id = $row->id)", null, null, null, null, true)->order_by('order', 'DESC')->with_units()->with_price_km()->with_image()->limit(12)->get_all();
        //     foreach ($row->product as &$row_format) {
        //         $row_format = $this->product_model->format($row_format);
        //     }
        // }
        $this->data['topics'] = $list_topics;
        $this->data['category'] = $list_category;
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
        $product = $this->product_model->with_other_image()->with_units()->with_image()->with_price_km('where: NOW() BETWEEN date_from AND date_to and deleted = 0')->with_preservation()->with_origin()->with_category()->get($id);
        if (empty($product))
            show_404();
        $this->data['title'] = $product->{pick_language($product, 'name_')};
        $this->data['product'] = $this->product_model->format($product);

        // load_easyzoom($this->data);
        load_fancybox($this->data);
        load_easyResponsiveTabs($this->data);
        load_froala_view($this->data);
        load_slick($this->data);
        load_autonumberic($this->data);
        $list_category_id = array_map(function ($item) {
            return $item->id;
        }, array_values((array) $this->data['product']->category));
        if (isset($this->data['product']->category) && !empty($this->data['product']->category)) {
            // print_r($this->data['product']->category);
            // die();
            $categories = array_values((array) $this->data['product']->category);
            $this->data['category'] = $categories[0];
        }
        // die();
        $this->data['product_related'] = $this->product_model->where("deleted = 0 and id IN(SELECT product_related_id FROM fz_product_related WHERE product_id = $id)", null, null, null, null, true)->with_units()->with_image()->with_price_km('order_inside:date_from desc')->get_all();
        if (!count($this->data['product_related'])) {
            $this->data['product_related'] = $this->product_model->where("deleted = 0 and id IN(SELECT product_id FROM fz_product_category WHERE category_id IN(" . implode(",", $list_category_id) . "))", null, null, null, null, true)->with_units()->with_image()->with_price_km('order_inside:date_from desc')->get_all();
        }
        foreach ($this->data['product_related'] as &$row_format) {
            $row_format = $this->product_model->format($row_format);
        }
        // echo "<pre>";
        // print_r($this->data['product']);
        // die();
        array_push($this->data['javascript_tag'], base_url() . "public/js/index.js?v=" . $version);
        echo $this->blade->view()->make('page/page', $this->data)->render();
    }
    public function register()
    {
        if (isset($_POST['dangtin'])) {
            $data = $_POST;
            $this->load->model("user_model");
            $this->load->model("usergroup_model");
            $data_up = $this->user_model->create_object($data);
            $id = $this->user_model->insert($data_up);

            $result = $this->ion_auth_model->reset_password($_POST['username'], $_POST['newpassword']);
            $array = array(
                'group_id' => 2, //// MEMBER
                'user_id' => $id
            );
            $this->usergroup_model->insert($array);
            redirect('/index/login', 'refresh');
        } else {
            $version = $this->config->item("version");

            array_push($this->data['javascript_tag'], base_url() . "public/js/index.js?v=" . $version);
            echo $this->blade->view()->make('page/page', $this->data)->render();
        }
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
        $page = $this->input->get("page");
        $limit = $this->input->get("limit");
        $page = $page != "" ? $page : 1;
        $limit = $limit != "" ? $limit : 20;
        $this->load->model("category_model");
        $this->load->model("product_model");
        $row =  $this->category_model->get($id);
        if (empty($row))
            redirect("", "refresh");
        $sql_where = "deleted = 0 and active = 1 and id IN(SELECT product_id FROM fz_product_category WHERE category_id = $row->id)";
        /*
         * TINH COUNT
         */
        $count = $this->product_model->where($sql_where, NULL, NULL, FALSE, FALSE, TRUE)->count_rows();
        $max_page = ceil($count / $limit);

        $data = $this->product_model->where($sql_where, null, null, null, null, true)->order_by('order', 'DESC')->with_units()->with_price_km()->with_image()->limit($limit, ($page - 1) * $limit)->get_all();
        foreach ($data as &$row_format) {
            $row_format = $this->product_model->format($row_format);
        }
        $row->product = $data;
        $this->data['row'] = $row;
        // echo "<pre>";
        // print_r($limit);
        // print_r($page);
        $this->data['count'] = $count;
        $this->data['current_page'] = $page;
        $this->data['max_page'] = $max_page;
        $this->data['site'] = base_url() . "index/category/$id?";
        $version = $this->config->item("version");

        load_froala_view($this->data);
        load_fancybox($this->data);
        array_push($this->data['javascript_tag'], base_url() . "public/lib/isotope/isotope.min.js");
        array_push($this->data['javascript_tag'], base_url() . "public/js/index.js?v=" . $version);
        echo $this->blade->view()->make('page/page', $this->data)->render();
    }
    public function khuyen_mai()
    {
        $page = $this->input->get("page");
        $limit = $this->input->get("limit");
        $page = $page != "" ? $page : 1;
        $limit = $limit != "" ? $limit : 20;
        $this->load->model("category_model");
        $this->load->model("product_model");
        $sql_where = "deleted = 0 and active = 1 and id IN(SELECT product_id FROM fz_product_price WHERE NOW() BETWEEN date_from AND date_to AND deleted = 0)";
        /*
         * TINH COUNT
         */

        $count = $this->product_model->where($sql_where, NULL, NULL, FALSE, FALSE, TRUE)->count_rows();
        $max_page = ceil($count / $limit);

        $data = $this->product_model->where($sql_where, null, null, null, null, true)->order_by('order', 'DESC')->with_units()->with_price_km()->with_image()->limit($limit, ($page - 1) * $limit)->get_all();
        foreach ($data as &$row_format) {
            $row_format = $this->product_model->format($row_format);
        }
        $this->data['products'] = $data;
        // echo "<pre>";
        // print_r($limit);
        // print_r($page);
        $this->data['count'] = $count;
        $this->data['current_page'] = $page;
        $this->data['max_page'] = $max_page;
        $this->data['site'] = base_url() . "index/khuyen_mai";
        $version = $this->config->item("version");

        load_froala_view($this->data);
        load_fancybox($this->data);
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
            $next = $this->input->post('next');
            $remember = (bool) $this->input->post('remember');
            if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember)) {
                if ($next != "") {
                    redirect($next, 'refresh');
                } else {
                    if ($this->ion_auth->is_admin()) {
                        redirect('/admin', 'refresh');
                    } else {
                        redirect('', 'refresh');
                    }
                }
            } else {
                // if the login was un-successful
                // redirect them back to the login page
                $this->session->set_flashdata('message', lang('alert_501'));
                redirect('index/login', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
            }
        } else {
            // the user is not logging in so display the login page
            // set the flash data error message if there is one

            $this->data['next'] = $this->input->get('next');
            $this->data['message'] = $this->session->flashdata('message');
            $version = $this->config->item("version");
            array_push($this->data['javascript_tag'], base_url() . "public/js/index.js?v=" . $version);
            echo $this->blade->view()->make('page/page', $this->data)->render();
        }
    }
    function login_admin()
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
                redirect('index/login_admin', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
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
        // array_push($this->data['stylesheet_tag'], base_url() . "public/assets/checkout.css");

        // echo "<pre>";
        // print_r($this->data['cart']);
        // die();

        $version = $this->config->item("version");
        array_push($this->data['javascript_tag'], base_url() . "public/js/index.js?v=" . $version);
        echo $this->blade->view()->make('page/page', $this->data)->render();
    }

    function checkout()
    {
        $this->data['cart'] = sync_cart();
        $version = $this->config->item("version");
        array_push($this->data['javascript_tag'], base_url() . "public/js/index.js?v=" . $version);
        echo $this->blade->view()->make('page/page', $this->data)->render();
    }

    function complete()
    {
        $cart = sync_cart();
        if (isset($_POST) && count($_POST) && count($cart['details'])) {
            $this->load->model("sale_model");
            $this->load->model("sale_line_model");
            $array = $_POST;
            $array['amount'] = $cart['amount_product'];
            $array['total_amount'] = $cart['amount_product'] + 0;
            $array['data'] = json_encode($cart);
            $data = $this->sale_model->create_object($array);
            // echo "<pre>";
            // print_r($data);
            // die();
            $order_id = $this->sale_model->insert($data);
            $this->sale_model->where("id", $order_id)->update(array("code" => "FZ-$order_id"));
            foreach ($cart['details'] as $row) {
                $data_up = array(
                    'order_id' => $order_id,
                    'product_id' => $row->id,
                    'quantity' => $row->qty,
                    'unit_id' => $row->unit_id,
                    'data' => json_encode($row)
                );
                $this->sale_line_model->insert($data_up);
            }
            /////////////////
            $this->load->helper('cookie');
            delete_cookie("DATA_CART");

            $this->data['cart'] = $cart;
            $version = $this->config->item("version");
            array_push($this->data['javascript_tag'], base_url() . "public/js/index.js?v=" . $version);
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
    public function login_connect()
    {
        //First step is to build a configuration array to pass to `Hybridauth\Hybridauth`
        $config = [
            //Location where to redirect users once they authenticate with a provider
            'callback' => 'http://foodzone.local/callback',

            //Providers specifics
            'providers' => [
                'Twitter' => [
                    'enabled' => true,     //Optional: indicates whether to enable or disable Twitter adapter. Defaults to false
                    'keys' => [
                        'key'    => '...', //Required: your Twitter consumer key
                        'secret' => '...'  //Required: your Twitter consumer secret
                    ]
                ],
                'Google'   => ['enabled' => true, 'keys' => ['id'  => '16945869109-vu353bmb6cmufgdgb46u1pldhsdl9gs6.apps.googleusercontent.com', 'secret' => 'Eb5N8lKTmy8ErDfodVhnX4dK']], //To populate in a similar way to Twitter
                'Facebook' => ['enabled' => true, 'keys' => ['id'  => '854767185024890', 'secret' => '367b0ee2f1f2b36efb5c520b3c00be3a']]  //And so on
            ]
        ];

        try {
            //Feed configuration array to Hybridauth
            $hybridauth = new Hybridauth\Hybridauth($config);

            //Then we can proceed and sign in with Twitter as an example. If you want to use a diffirent provider, 
            //simply replace 'Twitter' with 'Google' or 'Facebook'.

            //Attempt to authenticate users with a provider by name
            $adapter = $hybridauth->authenticate('Google');

            //Returns a boolean of whether the user is connected with Twitter
            $isConnected = $adapter->isConnected();

            //Retrieve the user's profile
            $userProfile = $adapter->getUserProfile();

            //Inspect profile's public attributes
            var_dump($userProfile);

            //Disconnect the adapter 
            $adapter->disconnect();
        } catch (\Exception $e) {
            echo 'Oops, we ran into an issue! ' . $e->getMessage();
        }
    }
}
