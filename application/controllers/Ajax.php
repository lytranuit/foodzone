<?php

class Ajax extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    //    function login() {
    //        if (isset($_POST['identity']) && isset($_POST['password'])) {
    //            $this->load->model("user_model");
    //            // check to see if the user is logging in
    //            if ($this->user_model->login($this->input->post('identity'), $this->input->post('password'))) {
    //                echo json_encode(array('success' => 1, 'username' => $this->session->userdata('identity')));
    //            } else {
    //                echo json_encode(array('success' => 0, 'code' => 501, 'msg' => lang('alert_501')));
    //            }
    //        } else {
    //            echo json_encode(array('success' => 0, 'code' => 501, 'msg' => lang('alert_501')));
    //        }
    //    }
    function images()
    {
        $this->load->model('file_model');
        $data = $this->file_model->where(array("type" => 1, "deleted" => 0))->order_by("id", "desc")->as_array()->get_all();
        echo json_encode($data);
    }

    /*
     * UPload hình ảnh
     */

    public function uploadimage()
    {
        ini_set('post_max_size', '64M');
        ini_set('upload_max_filesize', '64M');
        $this->load->helper('file');
        $date = date("Y-m-d");
        $upload_path_url = "public/uploads/$date/";
        $dir = FCPATH . "public/uploads/$date/";
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }
        $config['upload_path'] = $dir;
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = '10000';
        $this->load->library('upload', $config);
        $files = $_FILES;

        $ext = pathinfo($files['file']['name'], PATHINFO_EXTENSION);
        $_FILES['file']['name'] = time() . "." . $ext;
        $real_name = $files['file']['name'];
        if (!$this->upload->do_upload('file')) {
            $errors = $this->upload->display_errors();
            print_r($errors);
        } else {
            $data = $this->upload->data();
            /*
             * Array
              (
              [file_name] => png1.jpg
              [file_type] => image/jpeg
              [file_path] => /home/ipresupu/public_html/uploads/
              [full_path] => /home/ipresupu/public_html/uploads/png1.jpg
              [raw_name] => png1
              [orig_name] => png.jpg
              [client_name] => png.jpg
              [file_ext] => .jpg
              [file_size] => 456.93
              [is_image] => 1
              [image_width] => 1198
              [image_height] => 1166
              [image_type] => jpeg
              [image_size_str] => width="1198" height="1166"
              )

              // to re-size for thumbnail images un-comment and set path here and in json array
              $config = array();
              $config['image_library'] = 'gd2';
              $config['source_image'] = $data['full_path'];
              $config['create_thumb'] = TRUE;
              $config['new_image'] = $data['file_path'] . 'thumbs/';
              $config['maintain_ratio'] = TRUE;
              $config['thumb_marker'] = '';
              $config['width'] = 75;
              $config['height'] = 50;
              $this->load->library('image_lib', $config);
              $this->image_lib->resize();
             */
            ///resize 1

            ////////////
            $data_up = array(
                'name' => $data['file_name'],
                'real_name' => $real_name,
                'src' => $upload_path_url . $data['file_name'],
                'file_type' => $data['file_type'],
                'size' => $data['file_size'] * 1024,
                'type' => 1,
                'user_id' => $this->session->userdata('user_id')
            );
            $this->load->model('file_model');
            $id_image = $this->file_model->insert($data_up);
            $data_up['id'] = $id_image;
            echo json_encode($data_up);
        }
    }

    public function removeimage()
    {

        $this->load->model('file_model');
        $id = $this->input->post("id");
        $this->file_model->update(array("deleted" => 1), $id);
    }
    function getopencart()
    {

        $this->load->model('productopen_model');

        $items = $this->productopen_model->where(array('deleted' => 0))->as_array()->get_all();

        echo json_encode($items);
    }

    function getcart()
    {
        $cart = json_decode($this->input->post('data'), true);
        $items = array(
            'details' => array(),
            'count_product' => 0,
            'amount_product' => 0
        );
        $this->load->model('product_model');
        if (count($cart) > 0) {
            //            echo "<pre>";
            //            print_r($cart);
            //            die();
            foreach ($cart as $key => $item) {
                $data = array();
                if (!isset($item['id']) || !isset($item['qty'])) {
                    continue;
                }
                $qty = $item['qty'];
                $id = $item['id'];

                $product = $this->product_model->where(array('id' => $id))->with_hinhanh()->as_array()->get();

                $data['id'] = $product['id'];
                $data['image_url'] = isset($product['hinhanh']->src) ? $product['hinhanh']->src : "";
                $data['code'] = $product['code'];
                $data['name'] = $product['name'];
                $data['price'] = $product['price'];

                $data['qty'] = $qty;
                $data['amount_product'] = $qty * $product['price'];


                $items['count_product'] += $qty;
                $items['amount_product'] += $qty * $product['price'];

                $items['details'][] = $data;
            }
        }
        echo json_encode($items);
    }

    function order()
    {
        $cart = json_decode($this->input->post('data'), true);
        $items = array(
            'details' => array(),
            'count_product' => 0,
            'amount_product' => 0
        );
        if (count($cart) > 0) {
            //            echo "<pre>";
            //            print_r($cart);
            //            die();
            $this->load->model('product_model');
            $this->load->model('saleorder_model');
            $this->load->model('saleorderline_model');
            foreach ($cart as $key => $item) {
                $data = array();
                if (!isset($item['id']) || !isset($item['qty'])) {
                    continue;
                }
                $qty = $item['qty'];
                $id = $item['id'];

                $product = $this->product_model->where(array('id' => $id))->with_hinhanh()->as_array()->get();

                $data['id'] = $product['id'];
                $data['image_url'] = isset($product['hinhanh']->src) ? $product['hinhanh']->src : "";
                $data['code'] = $product['code'];
                $data['name'] = $product['name'];
                $data['price'] = $product['price'];

                $data['qty'] = $qty;
                $data['amount_product'] = $qty * $product['price'];


                $items['count_product'] += $qty;
                $items['amount_product'] += $qty * $product['price'];

                $items['details'][] = $data;
            }
            /*
             * 
             */
            $messsage = "";
            $array = array(
                'order_date' => date("Y-m-d H:i:s"),
                'customer_phone' => $this->input->post('phone'),
                'notes' => $this->input->post('note'),
                'amount' => $items['amount_product'],
                'total_amount' => $items['amount_product'],
            );
            $messsage .= $this->input->post('note') . "\n" . $this->input->post('phone') . "\n";


            $order_id = $this->saleorder_model->insert($array);
            foreach ($items['details'] as $row) {
                $data_up = array(
                    'order_id' => $order_id,
                    'product_id' => $row['id'],
                    'image_url' => $row['image_url'],
                    'code' => $row['code'],
                    'name' => $row['name'],
                    'quantity' => $row['qty'],
                    'price' => $row['price'],
                    'amount' => $row['qty'] * $row['price']
                );
                $this->saleorderline_model->insert($data_up);
                $messsage .= "- " . $row['name'] . " x " . $row['qty'] . "\n";
            }
            $messsage .= "Tổng: " . number_format($items['amount_product'], 0, ",", ".") . " đ\n";

            $this->load->helper('cookie');
            delete_cookie("CART");
            //            sendMessage(-313318123, $messsage);
            echo 1;
        } else {
            echo "Lỗi đặt hàng!";
        }
    }

    function cart()
    {

        $userdata = $this->session->userdata();
        //        print_r($userdata);
        $user_id = $userdata['user_id'];
        $user_name = $userdata['name'];
        //        print_r($userdata);
        $table_id = $this->input->post('table_id');
        $cart = json_decode($this->input->post('data'), true);
        $items = array(
            'details' => array(),
            'count_product' => 0,
            'amount_product' => 0
        );
        if (count($cart) > 0) {
            //            echo "<pre>";
            //            print_r($cart);
            //            die();
            $this->load->model('product_model');
            $this->load->model('saleorder_model');
            $this->load->model('saleorderline_model');
            foreach ($cart as $key => $item) {
                $data = array();
                if (!isset($item['id']) || !isset($item['qty'])) {
                    continue;
                }
                $qty = $item['qty'];
                $id = $item['id'];

                $product = $this->product_model->where(array('id' => $id))->with_hinhanh()->as_array()->get();

                $data['id'] = $product['id'];
                $data['image_url'] = isset($product['hinhanh']->src) ? $product['hinhanh']->src : "";
                $data['code'] = $product['code'];
                $data['name'] = $product['name'];
                $data['price'] = $product['price'];

                $data['qty'] = $qty;
                $data['amount_product'] = $qty * $product['price'];


                $items['count_product'] += $qty;
                $items['amount_product'] += $qty * $product['price'];

                $items['details'][] = $data;
            }
            /*
             * 
             */
            $messsage = "";
            $array = array(
                'user_id' => $user_id,
                'table_id' => $table_id,
                'user_name' => $user_name,
                'order_date' => date("Y-m-d H:i:s"),
                'notes' => $this->input->post('note'),
                'amount' => $items['amount_product'],
                'total_amount' => $items['amount_product'],
                'create_at' => date("Y-m-d H:i:s"),
                'status' => 4
            );
            $messsage .= $this->input->post('note') . "\n";


            $order_id = $this->saleorder_model->insert($array);
            foreach ($items['details'] as $row) {
                $data_up = array(
                    'order_id' => $order_id,
                    'product_id' => $row['id'],
                    'image_url' => $row['image_url'],
                    'code' => $row['code'],
                    'name' => $row['name'],
                    'quantity' => $row['qty'],
                    'price' => $row['price'],
                    'amount' => $row['qty'] * $row['price']
                );
                $this->saleorderline_model->insert($data_up);
                $messsage .= "- " . $row['name'] . " x " . $row['qty'] . "\n";
            }
            $messsage .= "Tổng: " . number_format($items['amount_product'], 0, ",", ".") . " đ\n";

            //            sendMessage(-313318123, $messsage);
            echo $order_id;
        } else {
            echo "Lỗi thanh toán!";
        }
    }

    function saveordercategory()
    {
        $this->load->model("category_model");
        $data = json_decode($this->input->post('data'), true);
        foreach ($data as $key => $row) {
            if (isset($row['id'])) {
                $id = $row['id'];
                $parent_id = isset($row['parent_id']) && $row['parent_id'] != "" ? $row['parent_id'] : 0;
                $is_home = isset($row['is_home']) ? $row['is_home'] : 1;
                $is_menu = isset($row['is_menu']) ? $row['is_menu'] : 1;
                $array = array(
                    'parent_id' => $parent_id,
                    'sort' => $key,
                    'is_home' => $is_home,
                    'is_menu' => $is_menu
                );
                print_r($array);
                $this->category_model->update($array, $id);
            }
        }
    }

    function savecategory()
    {
        $this->load->model("category_model");
        $data = json_decode($this->input->post('data'), true);
        $id = $data['id'];
        $data_up = $this->category_model->create_object($data);
        $this->category_model->update($data_up, $id);
    }


    function product()
    {
        $this->load->model("product_model");
        $this->load->model("product_category_model");
        $category = $this->input->get("category_id");
        $search = $this->input->get("search");
        $page = $this->input->get("page");
        $limit = $this->input->get("limit");
        $page = $page != "" ? $page : 1;
        $limit = $limit != "" ? $limit : 12;
        $sql_where = "status = 1 and is_foodzone = 1 ";
        if ($category > 0) {
            $sql_where .= " AND product.id IN (SELECT product_id FROM fz_product_category WHERE category_id = $category)";
        } else {
            echo "";
        }

        if ($search != "") {
            $short_language = short_language_current();
            $sql_where .= " AND (name_" . $short_language . " like '%" . $search . "%' OR (name_vi like '%" . $search . "%' AND name_" . $short_language . " IN(NULL,'')))";
        }

        /*
         * TINH COUNT
         */
        $count = $this->product_model->where($sql_where, NULL, NULL, FALSE, FALSE, TRUE)->count_rows();
        /*
         * LAY DATA
         */
        $data = $this->product_model->where($sql_where, NULL, NULL, FALSE, FALSE, TRUE)->join("fz_product_category", "id", "product_id")->group_by("fz_product_category.product_id")->order_by('fz_product_category.order', 'ASC')->with_units()->with_image()->with_price_km()->paginate($limit, NULL, $page);
        if (!empty($data)) {
            foreach ($data as &$row_format) {
                $row_format = $this->product_model->format($row_format);
            }
        }
        //        echo "<pre>";
        //        print_r($count);
        //        print_r($limit);
        //        die();
        $max_page = ceil($count / $limit);

        $this->data['count'] = $count;
        $this->data['data'] = $data;
        $this->data['current_page'] = $page;
        $this->data['max_page'] = $max_page;

        echo $this->blade->view()->make('ajax/product', $this->data)->render();
    }
    function modalview($params)
    {
        $id = $params;
        $this->load->model("product_model");
        $product = $this->product_model->with_other_image()->with_units()->with_image()->with_price_km('where: NOW() BETWEEN date_from AND date_to and deleted = 0')->with_preservation()->with_origin()->with_category()->get($id);
        if (empty($product))
            show_404();
        $this->data['product'] = $this->product_model->format($product);

        // load_easyzoom($this->data);
        load_fancybox($this->data);
        load_slick($this->data);
        load_autonumberic($this->data);

        // echo "<pre>";
        // print_r($this->data['product']);
        // die();
        echo $this->blade->view()->make('ajax/modalview', $this->data)->render();
    }
    function updatemenu()
    {
        $this->load->model("menu_model");
        $array = json_decode($_POST["data"], true);
        $this->menu_model->delete(array('deleted' => 0));
        $result = 1;
        $msg = 'Success.';
        $return = array('status' => $result, 'msg' => $msg);
        echo json_encode($return);
    }

    function setlanguage()
    {
        $_SESSION['language_current'] = $_POST['language'];
        echo 1;
    }
    ////////////
}
