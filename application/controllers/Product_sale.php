<?php

require_once("application/core/MY_Administrator.php");

class Product_sale extends MY_Administrator
{
    private $menu_id = 1;
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
            $this->load->model("product_sale_model");
            if (isset($data['products'])) {
                $data['product'] = implode(",", $data['products']);
            }
            $data_up = $this->product_sale_model->create_object($data);
            $id = $this->product_sale_model->insert($data_up);

            redirect('product_sale', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
        } else {
            $this->load->model("product_model");
            load_editor($this->data);
            load_chossen($this->data);
            $this->data['product'] = $this->product_model->where(array("status" => 1, 'is_foodzone' => 1))->get_all();
            echo $this->blade->view()->make('page/page', $this->data)->render();
        }
    }

    public function edit($param)
    { /////// trang ca nhan
        $id = $param[0];
        if (isset($_POST['dangtin'])) {
            $this->load->model("product_sale_model");
            $data = $_POST;

            if (isset($data['products'])) {
                $data['product'] = implode(",", $data['products']);
            }
            $data_up = $this->product_sale_model->create_object($data);
            $this->product_sale_model->update($data_up, $id);
            redirect('product_sale', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
        } else {
            $this->load->model("product_sale_model");
            $this->load->model("product_model");
            $tin = $this->product_sale_model->where(array('id' => $id))->with_image()->as_object()->get();
            $tin->products = explode(",", $tin->product);
            $this->data['tin'] = $tin;
            load_editor($this->data);
            load_chossen($this->data);

            $this->data['product'] = $this->product_model->where(array("status" => 1, 'is_foodzone' => 1))->get_all();
            echo $this->blade->view()->make('page/page', $this->data)->render();
        }
    }

    public function remove($params)
    { /////// trang ca nhan
        $this->load->model("product_sale_model");
        $id = $params[0];
        $this->product_sale_model->update(array("deleted" => 1), $id);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    public function table()
    {
        $this->load->model("product_sale_model");
        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $page = ($start / $limit) + 1;
        $where = $this->product_sale_model->where(array("deleted" => 0));

        $totalData = $where->count_rows();
        $totalFiltered = $totalData;

        // if (empty($this->input->post('search')['value'])) {
        //            $max_page = ceil($totalFiltered / $limit);

        $where = $this->product_sale_model->where(array("deleted" => 0));

        $posts = $where->order_by("id", "DESC")->paginate($limit, NULL, $page);
        //        echo "<pre>";
        //        print_r($posts);
        //        die();
        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $nestedData['id'] = $post->id;
                $nestedData['name'] = $post->name;
                $nestedData['description'] = $post->description;
                $nestedData['action'] = '<a href="' . base_url() . 'product_sale/edit/' . $post->id . '" class="btn btn-warning btn-sm mr-2" title="edit">'
                    . '<i class="fas fa-pencil-alt">'
                    . '</i>'
                    . '</a>'
                    . '<a href="' . base_url() . 'product_sale/remove/' . $post->id . '" class="btn btn-danger btn-sm" data-type="confirm" title="remove">'
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
