<?php
// use Hybridauth\Hybridauth; 
class Member extends MY_Controller
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

        if (!$this->ion_auth->logged_in()) {
            //redirect them to the login page
            redirect("index/login", "refresh");
        } elseif ($this->has_right($method, $params)) {
            $this->$method($params);
        } else {
            show_404();
        }
    }
    private function has_right($method, $params = array())
    {

        /*
         * SET PERMISSION
         */
        //        $role_user = $this->session->userdata('role');
        //        $this->user_model->set_permission($role_user);
        //
        //        /* Change method */
        //        switch ($method) {
        //            case 'updatetintuc':
        //                $method = 'edittintuc';
        //                break;
        //            case 'editmenu':
        //                $method = 'quanlymenu';
        //                break;
        //            case 'updatenoibat':
        //                $method = 'editnoibat';
        //                break;
        //            case 'updatenoibo':
        //                $method = 'editnoibo';
        //                break;
        //            case 'updateproduct':
        //                $method = 'editproduct';
        //                break;
        //            case 'viewtin':
        //                $method = 'quanlynoibo';
        //                break;
        //            case 'updatepage':
        //                $method = "editpage";
        //                break;
        //            case 'slider':
        //            case 'saveslider':
        //            case 'gioithieu':
        //            case 'savegioithieu':
        //            case 'quanlycategory':
        //            case 'themcategory':
        //            case 'editcategory':
        //            case 'updatecategory':
        //            case 'removecategory':
        //            case 'quanlyclient':
        //            case 'themclient':
        //            case 'editclient':
        //            case 'updateclient':
        //            case 'removeclient':
        //            case 'quanlyhappy':
        //            case 'themhappy':
        //            case 'edithappy':
        //            case 'updatehappy':
        //            case 'removehappy':
        //                $method = 'trangchu';
        //                break;
        //        }
        //        if (has_permission($method) && !is_permission($method)) {
        //            return false;
        //        }
        /* Tin đăng check */
        //        $fun_tin = array(
        //            "edittin",
        //            "activate_tin",
        //            "deactivate_tin",
        //            "remove_tin",
        //        );
        //        if (in_array($method, $fun_tin)) {
        //            $id = $params[0];
        //            $id_user = $this->session->userdata('user_id');
        //            $this->load->model("tin_model");
        //            $tin = $this->tin_model->where(array('deleted' => 0, 'id_user' => $id_user, 'id_tin' => $id))->as_array()->get_all();
        //            if (!count($tin)) {
        //                return false;
        //            }
        //        }
        return true;
    }
    public function page_404()
    {
        echo $this->blade->view()->make('page/404-page', $this->data)->render();
    }
    function index()
    {
        $id_user = $this->session->userdata('user_id');
        $this->load->model("user_model");
        if (isset($_POST['edit_user'])) {
            $additional_data = array(
                'last_name' => $this->input->post('last_name'),
                'phone' => $this->input->post('phone'),
                'gioitinh' => $this->input->post("gioitinh")
            );
            $this->user_model->update($additional_data, $id_user);
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        } else {
            $user = $this->user_model->where(array('id' => $id_user))->as_object()->get();
            $this->data['user'] = $user;
            //echo $this->data['content'];
            echo $this->blade->view()->make('page/page', $this->data)->render();
        }
    }
    function history()
    {
        $id_user = $this->session->userdata('user_id');
        $this->load->model("sale_simba_model");
        $this->load->model("sale_line_simba_model");

        $data = $this->sale_simba_model->where(array('user_id' => $id_user))->get_all();

        $this->data['data'] = $data;
        //echo $this->data['content'];
        echo $this->blade->view()->make('page/page', $this->data)->render();
    }

    function order_detail($params)
    {
        if (!isset($params[0])) {
            die();
        }
        $code = $params[0];

        $this->load->model("sale_simba_model");

        $data = $this->sale_simba_model->where(array('code' => $code))->with_details()->get();

        $this->data['data'] = $data;
        // echo "<pre>";
        // print_r($this->data['data']);
        // die();
        echo $this->blade->view()->make('page/page', $this->data)->render();
    }

    function huy_don($params)
    {
        if (!isset($params[0])) {
            die();
        }
        $code = $params[0];

        $this->load->model("sale_simba_model");
        $this->sale_simba_model->where(array('code' => $code))->update(array("status" => 5));
        redirect('member/history', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
    }
    function changepass()
    {
        $id_user = $this->session->userdata('user_id');
        $this->load->model("user_model");
        if (!isset($_POST['password']) || (isset($_POST['password']) && $this->ion_auth->hash_password_db($id_user, $_POST['password']) === FALSE)) {
            echo json_encode(array('code' => 402, "msg" => "Mật khẩu cũ không đúng."));
            die();
        }
        if (!isset($_POST['confirmpassword']) || !isset($_POST['newpassword']) || (isset($_POST['newpassword']) && isset($_POST['confirmpassword']) && $_POST['newpassword'] != $_POST['confirmpassword'])) {
            echo json_encode(array('code' => 403, "msg" => "Xác nhận mật khẩu mới không đúng."));
            die();
        }
        $this->ion_auth->change_password($this->session->userdata('identity'), $this->input->post('password'), $this->input->post('newpassword'));
        echo json_encode(array('code' => 400, "msg" => "Thay đổi mật khẩu thành công."));
        die();
    }
}
