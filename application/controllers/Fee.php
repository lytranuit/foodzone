<?php

require_once("application/core/MY_Administrator.php");

class Fee extends MY_Administrator
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
            $this->load->model("area_model");
            if (isset($data['products'])) {
                $data['product'] = implode(",", $data['products']);
            }
            $data_up = $this->area_model->create_object($data);
            $id = $this->area_model->insert($data_up);

            $this->load->model("area_fee_model");
            // print_r($data['dvt']);
            // die();
            if (isset($data['fee'])) {
                foreach ($data['fee'] as $row) {
                    $array = array(
                        'area_id' => $id
                    );
                    $this->area_fee_model->update($array, $row);
                }
            }
            redirect('fee', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
        } else {
            $this->load->model("product_model");
            load_datatable($this->data);
            $this->data['product'] = $this->product_model->where(array("status" => 1, 'is_foodzone' => 1))->get_all();
            echo $this->blade->view()->make('page/page', $this->data)->render();
        }
    }

    public function edit($param)
    { /////// trang ca nhan
        $id = $param[0];
        if (isset($_POST['dangtin'])) {
            $this->load->model("area_model");
            $data = $_POST;

            if (isset($data['products'])) {
                $data['product'] = implode(",", $data['products']);
            }
            $data_up = $this->area_model->create_object($data);
            $this->area_model->update($data_up, $id);

            $this->load->model("area_fee_model");
            if (isset($data['fee'])) {
                foreach ($data['fee'] as $row) {
                    $array = array(
                        'area_id' => $id
                    );
                    $this->area_fee_model->update($array, $row);
                }
            }
            redirect('fee', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
        } else {
            $this->load->model("area_model");
            $tin = $this->area_model->where(array('id' => $id))->with_fee()->as_array()->get();
            $this->data['tin'] = $tin;
            // echo "<pre>";
            // print_r($tin);
            // die();
            load_datatable($this->data);
            echo $this->blade->view()->make('page/page', $this->data)->render();
        }
    }

    public function remove($params)
    { /////// trang ca nhan
        $this->load->model("area_model");
        $id = $params[0];
        $this->area_model->update(array("deleted" => 1), $id);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
    public function save_fee()
    {
        if (isset($_POST['cap_nhat'])) {
            $data = $_POST;
            $id = $data['id'];
            $this->load->model("area_fee_model");
            $data_up = $this->area_fee_model->create_object($data);
            if ($id > 0) {
                unset($data_up['id']);
                $this->area_fee_model->update($data_up, $id);
            } else {
                if (isset($data_up['id']))
                    unset($data_up['id']);
                $id = $this->area_fee_model->insert($data_up);
            }
            $unit =  $this->area_fee_model->get($id);
            echo json_encode($unit);
        }
    }
    public function table()
    {
        $this->load->model("area_model");
        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $page = ($start / $limit) + 1;
        $where = $this->area_model->where(array("deleted" => 0));

        $totalData = $where->count_rows();
        $totalFiltered = $totalData;

        // if (empty($this->input->post('search')['value'])) {
        //            $max_page = ceil($totalFiltered / $limit);

        $where = $this->area_model->where(array("deleted" => 0));

        $posts = $where->order_by("id", "DESC")->paginate($limit, NULL, $page);
        //        echo "<pre>";
        //        print_r($posts);
        //        die();
        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $nestedData['id'] = $post->id;
                $nestedData['name'] = $post->name;
                $nestedData['action'] = '<a href="' . base_url() . 'fee/edit/' . $post->id . '" class="btn btn-warning btn-sm mr-2" title="edit">'
                    . '<i class="fas fa-pencil-alt">'
                    . '</i>'
                    . '</a>'
                    . '<a href="' . base_url() . 'fee/remove/' . $post->id . '" class="btn btn-danger btn-sm" data-type="confirm" title="remove">'
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
