<?php

require_once("application/core/MY_Administrator.php");

class Sale extends MY_Administrator
{

    function __construct()
    {
        parent::__construct();
        $this->data['is_admin'] = $this->ion_auth->is_admin();
        $this->data['userdata'] = $this->session->userdata();
        $this->data['template'] = "admin";
        $this->data['title'] = "Admin";
    }

    public function _remap($method, $params = array())
    {
        if (!method_exists($this, $method)) {
            show_404();
        }
        $group = array('admin', 'manager');

        if (!$this->ion_auth->in_group($group)) {
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

        return true;
    }

    public function index()
    { /////// trang ca nhan
        load_datatable($this->data);
        echo $this->blade->view()->make('page/page', $this->data)->render();
    }

    public function add()
    { /////// trang ca nhan
        if (isset($_POST['dangtin'])) {
            $data = $_POST;
            $data['user_id'] = $this->session->userdata('user_id');
            $this->load->model("sale_model");
            $data_up = $this->sale_model->create_object($data);
            $id = $this->sale_model->insert($data_up);

            redirect('sale', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
        } else {
            load_editor($this->data);
            echo $this->blade->view()->make('page/page', $this->data)->render();
        }
    }

    public function edit($param)
    { /////// trang ca nhan
        $id = $param[0];
        if (isset($_POST['dangtin'])) {
            $this->load->model("sale_model");
            $data = $_POST;
            $data_up = $this->sale_model->create_object($data);
            $this->sale_model->update($data_up, $id);
            redirect('sale', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
        } else {
            $this->data['menu_active'] = "order";
            $this->load->model("sale_model");
            ///INFO
            $tin = $this->sale_model->where(array('id' => $id))->as_object()->get();
            $tin->data = json_decode($tin->data);
            $this->data['tin'] = $tin;
                    //    echo "<pre>";
                    //    print_r($tin);
                    //    die();
            ///CHILD PRODUCT
            //            $this->data['child'] = $child;
            load_datatable($this->data);
            echo $this->blade->view()->make('page/page', $this->data)->render();
        }
    }

    public function remove($params)
    { /////// trang ca nhan
        $this->load->model("sale_model");
        $id = $params[0];
        $this->sale_model->update(array("deleted" => 1), $id);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    public function table()
    {
        $this->load->model("sale_model");
        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $page = ($start / $limit) + 1;
        $where = $this->sale_model->where(array("deleted" => 0));

        $totalData = $where->count_rows();
        $totalFiltered = $totalData;

        if (empty($this->input->post('search')['value'])) {
            //            $max_page = ceil($totalFiltered / $limit);

            $where = $this->sale_model->where(array("deleted" => 0));
        } else {
            $search = $this->input->post('search')['value'];
            $sWhere = "deleted = 0";
            $where = $this->sale_model->where($sWhere, NULL, NULL, FALSE, FALSE, TRUE);
            $totalFiltered = $where->count_rows();
            $where = $this->sale_model->where($sWhere, NULL, NULL, FALSE, FALSE, TRUE);
        }

        $posts = $where->order_by("id", "DESC")->paginate($limit, NULL, $page);
        //        echo "<pre>";
        //        print_r($posts);
        //        die();
        $array_status = array(
            "1" => "Mới đặt hàng",
            "2" => "Đã xác nhận",
            "3" => "Đang vận chuyển",
            "4" => "<span class='text-success'>Đã thanh toán<span>",
            "5" => "<span class='text-danger'>Ghi nợ<span>"
        );
        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $nestedData['id'] = $post->id;
                $nestedData['code'] = $post->code;
                $nestedData['name'] = $post->name;
                $nestedData['phone'] = $post->phone;
                $nestedData['address'] = $post->address;
                $nestedData['total_amount'] = number_format($post->total_amount, 0, ",", ".") . "đ";
                $nestedData['status'] = $array_status[$post->status];
                $nestedData['order_date'] =  date("d/m/Y", strtotime($post->order_date));

                $action = '<a href="' . base_url() . 'sale/edit/' . $post->id . '" class="btn btn-warning btn-sm mr-2" title="Sửa">'
                    . '<i class="fas fa-pencil-alt">'
                    . '</i>'
                    . '</a>'
                    . '<a href="' . base_url() . 'sale/remove/' . $post->id . '" class="btn btn-danger btn-sm" data-type="confirm" title="Xóa">'
                    . '<i class="far fa-trash-alt">'
                    . '</i>'
                    . '</a>';
                if ($post->status != 4) {
                    $action .= '<a href="#" class="btn btn-success btn-xs mx-1 add_paid btn-sm" data-order_id="' . $post->id . '" title="Thanh toán">'
                        . '<i class="fas fa-hand-holding-usd">'
                        . '</i>'
                        . '</a>';
                }
                $nestedData['action'] = $action;
                $data[] = $nestedData;
            }
        }

        $json_data = array(
            "draw" => intval($this->input->post('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        );

        echo json_encode($json_data);
    }
}
