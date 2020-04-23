<?php

require_once("application/core/MY_Administrator.php");

class Eat extends MY_Administrator
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

    public function get($params)
    {
        $id = $params[0];
        $this->load->model("category_model");
        $json_data = $this->category_model->where(array('id' => $id))->as_object()->get();
        echo json_encode($json_data);
    }

    public function add()
    { /////// trang ca nhan
        if (isset($_POST['dangtin'])) {
            $data = $_POST;
            $data['menu_id'] = $this->menu_id;
            $this->load->model("category_model");
            $data_up = $this->category_model->create_object($data);
            $id = $this->category_model->insert($data_up);

            redirect('eat', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
        } else {
            load_editor($this->data);
            echo $this->blade->view()->make('page/page', $this->data)->render();
        }
    }

    public function edit($param)
    { /////// trang ca nhan
        $id = $param[0];
        if (isset($_POST['dangtin'])) {
            $this->load->model("category_model");
            $data = $_POST;
            $data_up = $this->category_model->create_object($data);
            $this->category_model->update($data_up, $id);
            redirect('eat', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
        } else {
            $this->load->model("category_model");
            $tin = $this->category_model->where(array('id' => $id))->with_image()->as_object()->get();
            $this->data['tin'] = $tin;
            load_editor($this->data);
            //            load_chossen($this->data);
            echo $this->blade->view()->make('page/page', $this->data)->render();
        }
    }

    public function remove($params)
    { /////// trang ca nhan
        $this->load->model("category_model");
        $id = $params[0];
        $this->category_model->update(array("deleted" => 1), $id);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    public function table()
    {
        $this->load->model("category_model");
        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $page = ($start / $limit) + 1;
        $where = $this->category_model->where(array("deleted" => 0, 'menu_id' => $this->menu_id));

        $totalData = $where->count_rows();
        $totalFiltered = $totalData;

        // if (empty($this->input->post('search')['value'])) {
        //            $max_page = ceil($totalFiltered / $limit);

        $where = $this->category_model->where(array("deleted" => 0, 'menu_id' => $this->menu_id));

        $posts = $where->order_by("id", "DESC")->with_image()->paginate($limit, NULL, $page);
        //        echo "<pre>";
        //        print_r($posts);
        //        die();
        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $nestedData['id'] = $post->id;
                $nestedData['name_vi'] = $post->name_vi;
                $nestedData['description_vi'] = $post->description_vi;
                $image = isset($post->image->src) ? base_url() . $post->image->src : "";
                $nestedData['image'] = "<img src='$image' width='100'/>";
                $nestedData['action'] = '<a href="' . base_url() . 'eat/edit/' . $post->id . '" class="btn btn-warning btn-sm mr-2" title="edit">'
                    . '<i class="fas fa-pencil-alt">'
                    . '</i>'
                    . '</a>'
                    . '<a href="' . base_url() . 'eat/remove/' . $post->id . '" class="btn btn-danger btn-sm" data-type="confirm" title="remove">'
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
