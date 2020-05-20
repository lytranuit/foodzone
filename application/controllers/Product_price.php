<?php

require_once("application/core/MY_Administrator.php");

class Product_price extends MY_Administrator
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
    public function get_units($params)
    {
        $id = $params[0];
        $this->load->model("product_unit_model");
        $json_data = $this->product_unit_model->where(array('product_id' => $id))->as_object()->get_all();
        echo json_encode($json_data);
    }
    public function add()
    { /////// trang ca nhan
        if (isset($_POST['dangtin'])) {
            $data = $_POST;
            $date = explode(" - ", $data['daterange']);
            $data['date_from'] = date("Y-m-d", strtotime($date[0]));
            $data['date_to'] = date("Y-m-d", strtotime($date[1]));
            $this->load->model("product_price_model");
            $data_up = $this->product_price_model->create_object($data);
            $id = $this->product_price_model->insert($data_up);
            redirect('product_price', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
        } else {
            load_daterangepicker($this->data);
            load_chossen($this->data);
            $this->load->model("product_model");
            $this->data['products'] = $this->product_model->where(array("deleted" => 0))->get_all();
            echo $this->blade->view()->make('page/page', $this->data)->render();
        }
    }

    public function edit($param)
    { /////// trang ca nhan
        $id = $param[0];
        if (isset($_POST['dangtin'])) {
            $this->load->model("product_price_model");
            $data = $_POST;

            $date = explode(" - ", $data['daterange']);
            $data['date_from'] = date("Y-m-d", strtotime($date[0]));
            $data['date_to'] = date("Y-m-d", strtotime($date[1]));
            $data_up = $this->product_price_model->create_object($data);
            $this->product_price_model->update($data_up, $id);

            redirect('product_price', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
        } else {
            $this->load->model("product_price_model");
            $this->load->model("product_model");
            $tin = $this->product_price_model->where(array('id' => $id))->with_image()->with_category()->as_object()->get();
            if (isset($tin->category)) {
                $cate_id = array();
                foreach ($tin->category as $key => $cate) {
                    $cate_id[] = $key;
                }
                $tin->category_list = $cate_id;
            }
            $product = $this->product_model->where(array("id" => $tin->product_id))->with_units()->get();
            // print_r($product);
            // die();
            $this->data['units'] = $product->units;
            $this->data['tin'] = $tin;
            load_daterangepicker($this->data);
            load_chossen($this->data);
            $this->data['products'] = $this->product_model->where(array("deleted" => 0))->get_all();
            echo $this->blade->view()->make('page/page', $this->data)->render();
        }
    }

    public function remove($params)
    { /////// trang ca nhan
        $this->load->model("product_price_model");
        $id = $params[0];
        $this->product_price_model->update(array("deleted" => 1), $id);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
    public function table()
    { /////// trang ca nhan
        $this->load->model("product_price_model");
        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $page = ($start / $limit) + 1;
        $where = $this->product_price_model->where(array("deleted" => 0));

        $totalData = $where->count_rows();
        $totalFiltered = $totalData;

        if (empty($this->input->post('search')['value'])) {
            //            $max_page = ceil($totalFiltered / $limit);

            $where = $this->product_price_model->where(array("deleted" => 0));
        } else {
            $search = $this->input->post('search')['value'];
            $sWhere = "deleted = 0";
            $where = $this->product_price_model->where($sWhere, NULL, NULL, FALSE, FALSE, TRUE);
            $totalFiltered = $where->count_rows();
            $where = $this->product_price_model->where($sWhere, NULL, NULL, FALSE, FALSE, TRUE);
        }

        $posts = $where->order_by("id", "DESC")->with_unit()->with_product()->paginate($limit, NULL, $page);
        //        echo "<pre>";
        //        print_r($posts);
        //        die();
        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $nestedData['id'] = $post->id;
                $nestedData['code'] = isset($post->product->code) ? $post->product->code : "";
                $nestedData['name_vi'] = isset($post->product->name_vi) ? $post->product->name_vi : "";
                $nestedData['unit_name'] = isset($post->unit->name_vi) ? $post->unit->name_vi : "";
                $nestedData['price'] = number_format($post->price, 0, ",", ".") . " VND";
                $nestedData['date_from'] = date("d/m/Y", strtotime($post->date_from));
                $nestedData['date_to'] = date("d/m/Y", strtotime($post->date_to));
                // $nestedData['date'] =  date("d/m/Y", strtotime($post->date));
                $nestedData['action'] = '<a href="' . base_url() . 'product_price/edit/' . $post->id . '" class="btn btn-warning btn-sm mr-2" title="edit">'
                    . '<i class="fas fa-pencil-alt">'
                    . '</i>'
                    . '</a>'
                    . '<a href="' . base_url() . 'product_price/remove/' . $post->id . '" class="btn btn-danger btn-sm" data-type="confirm" title="remove">'
                    . '<i class="far fa-trash-alt">'
                    . '</i>'
                    . '</a>';

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
