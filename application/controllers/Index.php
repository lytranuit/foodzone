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
        );

        load_slick($this->data);
        load_autonumberic($this->data);
        load_toast($this->data);
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
        load_froala_view($this->data);
        // load_swiper($this->data);
        // load_easyResponsiveTabs($this->data);
        // load_autonumberic($this->data);
        array_push($this->data['javascript_tag'], base_url() . "public/js/index.js?v=" . $version);

        $this->load->model("category_model");
        $this->load->model("product_model");
        $list_category = $this->category_model->where(array('deleted' => 0, 'active' => 1, 'is_home' => 1, 'parent_id' => 0, 'menu_id' => 1))->order_by('order', 'ASC')->get_all();
        foreach ($list_category as &$row) {
            // $row->product = $this->product_model->where("deleted = 0 and active = 1 AND category_id = $row->id", null, null, null, null, true)->join("fz_product_category", "id", "product_id")->order_by('fz_product_category.order', 'ASC')->with_units()->with_price_km()->with_image()->limit(12)->get_all();
            // // echo "<pre>";
            // // print_r($row->product);
            // // die();
            // if (!empty($row->product)) {
            //     foreach ($row->product as &$row_format) {
            //         $row_format = $this->product_model->format($row_format);
            //     }
            // }
            /* COUNT PRODUCT */
            $row->count_product = $this->product_model->where("status = 1 and is_foodzone = 1 AND category_id = $row->id", null, null, null, null, true)->join("fz_product_category", "id", "product_id")->count_rows();
            /* SUB */
            $row->child = $this->category_model->where(array('deleted' => 0, 'active' => 1, 'parent_id' => $row->id))->order_by('order', 'ASC')->get_all();
        }
        // echo "<pre>";
        // print_r($this->data['template']);
        // die();
        $list_topics = $this->category_model->where(array('deleted' => 0, 'active' => 1, 'is_home' => 1, 'menu_id' => 2))->with_image()->order_by('order', 'ASC')->get_all();
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
        $product = $this->product_model->with_foodzone()->with_other_image()->with_units()->with_image()->with_price_km('where: NOW() BETWEEN date_from AND date_to and deleted = 0')->with_preservation()->with_origin()->with_category()->get($id);
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
        $this->data['product_related'] = $this->product_model->where("status = 1 and is_foodzone = 1 and id IN(SELECT product_related_id FROM fz_product_related WHERE product_id = $id)", null, null, null, null, true)->with_units()->with_image()->with_price_km('order_inside:date_from desc')->get_all();
        // print_r($this->data['product_related']);
        // die();
        if (empty($this->data['product_related'])) {
            $this->data['product_related'] = $this->product_model->where("status = 1 and is_foodzone = 1 and id IN(SELECT product_id FROM fz_product_category WHERE category_id IN(" . implode(",", $list_category_id) . "))", null, null, null, null, true)->with_units()->with_image()->with_price_km('order_inside:date_from desc')->get_all();
        }
        if (!empty($this->data['product_related'])) {
            foreach ($this->data['product_related'] as &$row_format) {
                $row_format = $this->product_model->format($row_format);
            }
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
            if (!isset($data['username']) || !isset($data['email']))
                die();
            $username = $data['username'];
            $email = $data['email'];

            $check = $this->user_model->where(array("username" => $username))->as_array()->get();
            // account_creation_duplicate_identity
            // account_creation_duplicate_email
            if (!empty($check)) {

                redirect('/index/register?msg=1', 'refresh');
                die();
            }
            $check = $this->user_model->where(array("email" => $email))->as_array()->get();
            if (!empty($check)) {
                redirect('/index/register?msg=2', 'refresh');
                die();
            }
            $data_up = $this->user_model->create_object($data);
            $id = $this->user_model->insert($data_up);

            $result = $this->ion_auth_model->reset_password($_POST['username'], $_POST['newpassword']);
            $array = array(
                'group_id' => 2, //// MEMBER
                'user_id' => $id
            );
            $this->usergroup_model->insert($array);
            // die();
            redirect('/index/login', 'refresh');
        } else {
            $version = $this->config->item("version");
            $msg = $this->input->get("msg");
            // print_r($msg);
            // die();
            $this->data['msg'] = $msg;
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
        $order = $this->input->get("order");
        $page = $page != "" ? $page : 1;
        $limit = $limit != "" ? $limit : 20;
        $order = $order != "" ? $order : 1;
        $this->load->model("category_model");
        $this->load->model("product_model");

        // print_r($page . "<br>");
        // print_r($limit. "<br>");
        $row =  $this->category_model->get($id);
        if (empty($row))
            redirect("", "refresh");
        $sql_where = "status = 1 and is_foodzone = 1 and category_id = $row->id";
        /*
         * TINH COUNT
         */
        $count = $this->product_model->where($sql_where, NULL, NULL, FALSE, FALSE, TRUE)->join("fz_product_category", "id", "product_id")->count_rows();
        $max_page = ceil($count / $limit);

        $data = $this->product_model->where($sql_where, NULL, NULL, FALSE, FALSE, TRUE)->join("fz_product_category", "id", "product_id")->with_foodzone()->with_units()->with_image()->with_price_km();
        if ($order == 1) {
            $data = $data->order_by('fz_product_category.order', 'ASC');
        } else if ($order == 2) {
            $data = $data->order_by('product.retail_price', 'DESC');
        } else if ($order == 3) {
            $data = $data->order_by('product.retail_price', 'ASC');
        }
        $data = $data->limit($limit, ($page - 1) * $limit)->get_all();
        if (!empty($data)) {
            foreach ($data as &$row_format) {
                $row_format = $this->product_model->format($row_format);
            }
        }
        // echo "<pre>";
        // print_r($data);
        // die();
        $row->product = $data;
        $this->data['row'] = $row;
        // echo "<pre>";
        // print_r($limit);
        // print_r($page);
        $this->data['count'] = $count;
        $this->data['current_page'] = $page;
        $this->data['max_page'] = $max_page;
        $this->data['params'] = array('page' => $page, 'order' => $order);
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
        $sql_where = "status = 1 and is_foodzone = 1 and id IN(SELECT product_id FROM fz_product_price WHERE NOW() BETWEEN date_from AND date_to AND deleted = 0)";
        /*
         * TINH COUNT
         */

        $count = $this->product_model->where($sql_where, NULL, NULL, FALSE, FALSE, TRUE)->count_rows();
        $max_page = ceil($count / $limit);

        $data = $this->product_model->where($sql_where, null, null, null, null, true)->order_by('sort', 'DESC')->with_foodzone()->with_units()->with_price_km()->with_image()->limit($limit, ($page - 1) * $limit)->get_all();
        if (!empty($data)) {
            foreach ($data as &$row_format) {
                $row_format = $this->product_model->format($row_format);
            }
        }
        // echo "<pre>";
        // print_r($data);
        // die();
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
        // array_push($this->data['javascript_tag'], base_url() . "public/lib/isotope/isotope.min.js");
        array_push($this->data['javascript_tag'], base_url() . "public/js/index.js?v=" . $version);
        echo $this->blade->view()->make('page/page', $this->data)->render();
    }

    public function search()
    {
        $search = $this->input->get("q");
        $this->load->model("product_model");
        $page = $this->input->get("page");
        $limit = $this->input->get("limit");
        $page = $page != "" ? $page : 1;
        $limit = $limit != "" ? $limit : 20;
        $this->load->model("category_model");
        $this->load->model("product_model");

        $sql_where = "status = 1 and is_foodzone = 1 ";
        if ($search != "") {
            $short_language = short_language_current();
            $sql_where .= " AND (code like '%" .
                $this->db->escape_like_str($search) . "%' ESCAPE '!' OR  name_" . $short_language . " like '%" .
                $this->db->escape_like_str($search) . "%' ESCAPE '!' OR (name_vi like '%" .
                $this->db->escape_like_str($search) . "%' ESCAPE '!' AND name_" . $short_language . " IN(NULL,'')))";
        }

        $count = $this->product_model->where($sql_where, NULL, NULL, FALSE, FALSE, TRUE)->count_rows();
        $max_page = ceil($count / $limit);

        $data = $this->product_model->where($sql_where, null, null, null, null, true)->order_by('code', 'ASC')->with_foodzone()->with_units()->with_price_km()->with_image()->limit($limit, ($page - 1) * $limit)->get_all();
        if (!empty($data)) {
            foreach ($data as &$row_format) {
                $row_format = $this->product_model->format($row_format);
            }
        }
        $this->data['products'] = $data;
        // echo "<pre>";
        // print_r($limit);
        // print_r($page);
        $this->data['count'] = $count;
        $this->data['current_page'] = $page;
        $this->data['max_page'] = $max_page;
        $this->data['site'] = base_url() . "index/search";
        $this->data['search'] = $search;
        //        echo "<pre>";
        //        print_r($data);
        //        die();
        $version = $this->config->item("version");

        load_froala_view($this->data);
        load_fancybox($this->data);
        // array_push($this->data['javascript_tag'], base_url() . "public/lib/isotope/isotope.min.js");
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
        // print_r(NumberToText($this->data['cart']['amount_product']));
        // die();

        $version = $this->config->item("version");
        array_push($this->data['javascript_tag'], base_url() . "public/js/index.js?v=" . $version);
        echo $this->blade->view()->make('page/page', $this->data)->render();
    }

    function checkout()
    {
        if ($this->data['is_login']) {
            $this->load->model("address_model");
            $user_id =  $this->data['userdata']['user_id'];
            $address = $this->address_model->where(array("user_id" => $user_id, 'deleted' => 0))->with_area()->get_all();
            // print_r($address);
            // die();
            $this->data['address'] = $address;
        }

        $this->load->model("area_model");
        $area = $this->area_model->where(array('deleted' => 0))->order_by("order", "ASC")->get_all();
        $this->data['area'] = $area;
        $this->data['cart'] = sync_cart();
        $version = $this->config->item("version");
        array_push($this->data['javascript_tag'], base_url() . "public/js/index.js?v=" . $version);
        echo $this->blade->view()->make('page/page', $this->data)->render();
    }

    function complete()
    {
        $cart = sync_cart();
        if (isset($_POST) && count($_POST) && count($cart['details'])) {
            $this->load->model("address_model");
            $this->load->model("sale_line_model");
            $this->load->model("sale_simba_model");
            $this->load->model("sale_line_simba_model");
            $this->load->model("area_model");
            $array = $_POST;

            $arrray_lang = $this->config->item("language_list");
            $area_id = isset($array['area_id']) ? $array['area_id'] : 0;
            $area = $this->area_model->get($area_id);
            // echo "<pre>";
            // print_r($cart['details']);
            // die();
            $array['amount'] = $cart['amount_product'];
            $array['service_fee'] = $cart['service_fee'];
            $array['total_amount'] = $cart['paid_amount'];
            $array['is_send'] = 0;
            // $array['data_fz'] = json_encode($cart);
            // $data = $this->sale_model->create_object($array);
            // // echo "<pre>";
            // // print_r($data);
            // // die();
            // $order_id = $this->sale_model->insert($data);
            // $this->sale_model->where("id", $order_id)->update(array("code" => "FOZ-$order_id"));

            ///UPDATE SIMBA
            $array['order_date'] = date("Y-m-d H:i:s");
            $array['delivery_date'] = date("Y-m-d");
            $array['code'] = "FOZ" . date("YmdHisz");
            $array['type'] = 7;
            $array['language'] =  $arrray_lang[language_current()];
            $array['customer_name'] = $array['name'];
            $array['customer_phone'] =  $array['phone'];
            $array['customer_email'] =  $array['email'];
            $array['customer_address'] =  $array['address'];

            $array['receiver_name'] = $array['name'];
            $array['receiver_phone'] =  $array['phone'];
            $array['receiver_email'] =  $array['email'];
            $array['receiver_address'] =  $array['address'];
            $array['receiver_area'] =  isset($area->name) ? $area->name : "";


            $array['customer_id'] =  7544;
            if ($this->data['is_login']) {
                $array['user_id'] =  $this->data['userdata']['user_id'];
            }
            if (isset($array['address_id']) && $array['address_id'] > 0) {
                // $address_id = $array['address_id'];
                // $address = $this->address_model->get($address_id);

            } else {
                $data = $this->address_model->create_object($array);
                $this->address_model->insert($data);
            }
            $data = $this->sale_simba_model->create_object($array);
            $order_simba_id = $this->sale_simba_model->insert($data);

            foreach ($cart['details'] as $row) {
                ///UPDATE SIMBA
                $data_up = array(
                    'order_id' => $order_simba_id,
                    'quantity' => $row->qty,
                    'unit_price' => $row->price,
                    'subtotal' => $row->amount,
                    'name' => $row->name_vi,
                    'code' => $row->code,
                    'product_id' => $row->id,
                    'image_url' => $row->image_url
                );

                if (isset($row->unit_id)) {
                    $data_up['unit_id_fz'] = $row->unit_id;
                    $unit = array_values(array_filter($row->units, function ($item) use ($data_up) {
                        return $item->id == $data_up['unit_id_fz'];
                    }));
                    $unit = $unit[0];
                    $data_up['unit_price'] = $unit->special_unit > 0 ? round($data_up['subtotal'] / $unit->special_unit / $data_up['quantity'], 0) : 0;
                    $data_up['special_unit'] = $unit->special_unit;
                    $data_up['volume_order'] = $unit->name_vi;
                    $data_up['volume_order_en'] = $unit->name_en;
                    $data_up['volume_order_jp'] = $unit->name_jp;
                }
                $this->sale_line_simba_model->insert($data_up);
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
    // public function sync_dvt()
    // {
    //     $this->load->model("product_simba_model");

    //     $this->load->model("product_unit_model");
    //     $this->load->model("product_model");
    //     $products = $this->product_model->with_units()->fields("code,id,price")->get_all();
    //     echo "<pre>";
    //     foreach ($products as $product) {
    //         // print_r($product);
    //         if (!isset($product->units)) {
    //             $product_simba = $this->product_simba_model->where("code", $product->code)->with_units()->fields("code,id")->get();
    //             // print_r($product_simba);
    //             if (isset($product_simba->units)) {
    //                 foreach ($product_simba->units as $unit) {
    //                     $data_up = array(
    //                         'name_vi' => $unit->name_vi,
    //                         'name_en' => $unit->name_en,
    //                         'name_jp' => $unit->name_jp,
    //                         'special_unit' => $unit->special_unit,
    //                         'product_id' => $product->id,
    //                         'price' => $unit->special_unit * $product->price
    //                     );
    //                     $this->product_unit_model->insert($data_up);
    //                 }
    //             }
    //         }
    //     }
    //     // echo "<pre>";
    //     // print_r($products);
    //     // die();
    // }

    public function cronjobsendmail()
    {
        $this->load->model("sale_simba_model");
        $this->load->model("option_model");
        $sales = $this->sale_simba_model->where(array("is_send" => 0))->with_details()->get_all();
        if (!empty($sales)) {
            $conf = $this->option_model->get_group("send_mail");
            // echo "<pre>";
            // print_r($conf);
            // die();
            $config = array(
                'mailtype' => 'html',
                'protocol' => "smtp",
                'smtp_host' => $conf['email_server'],
                'smtp_user' => $conf['email_username'], // actual values different
                'smtp_pass' => $conf['email_password'],
                'charset' => "utf-8",
                'smtp_crypto' => $conf['email_security'],
                'wordwrap' => TRUE,
                'smtp_port' => $conf['email_port'],
                'starttls' => true,
                'newline' => "\r\n"
            );
            $this->load->library("email", $config);
            foreach ($sales as $row) {
                $this->email->clear(TRUE);
                // echo "<pre>";
                // print_r(json_decode($row->data));
                // die();
                $this->email->from($conf['email_email'], $conf['email_name']);
                $this->email->to($conf['email_contact']); /// $conf['email_contact']
                $this->email->subject("Thông báo Đơn hàng mới - New PO Alert")
                    ->set_mailtype('html');

                $html = "";
                $this->data['details'] = $row->details;
                $this->data['total'] = $row->total_amount;
                $this->data['service_fee'] = $row->service_fee;
                $this->data['notes'] = $row->notes;
                $this->data['code'] = $row->code;
                $this->data['name'] = $row->receiver_name;
                $this->data['email'] = $row->receiver_email;
                $this->data['phone'] = $row->receiver_phone;
                $this->data['address'] = $row->receiver_address;
                $this->data['order_date'] = $row->order_date;

                $html = $this->blade->view()->make('page/mail', $this->data)->render();
                // echo $html;
                // die();
                $this->email->message($html);
                // if (!empty($logbook->files)) {
                //     foreach ($logbook->files as $row) {
                //         $this->email->attach(base_url() . $row->src);
                //     }
                // }


                $this->sale_simba_model->update(array("is_send" => 1), $row->id);
                if ($this->email->send()) {
                    //                echo json_encode(array('code' => 400, 'msg' => lang('alert_400')));
                } else {
                    $file_log = './log_' . $row->id . '.log';
                    file_put_contents($file_log, $this->email->print_debugger(), FILE_APPEND);
                }
            }
        }
        echo 1;
    }


    function remove_address($params)
    {
        $this->load->model("address_model");
        $id = $params[0];
        $this->address_model->update(array("deleted" => 1), $id);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
}
