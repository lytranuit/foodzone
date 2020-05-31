<?php

require_once("application/core/MY_Administrator.php");

class Menu_slide extends MY_Administrator
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
        // load_datatable($this->data);
        load_sort_nest($this->data);
        $this->load->model("menu_slide_model");
        $category = $this->menu_slide_model->where(array('deleted' => 0))->order_by('order', "ASC")->with_category()->as_array()->get_all();
        // print_r($category);
        // die();
        if (empty($category))
            $category = array();
        $this->data['html_nestable'] = html_nestable($category, 'parent_id', 0, 'menu_slide');
        echo $this->blade->view()->make('page/page', $this->data)->render();
    }

    public function add()
    { /////// trang ca nhan
        if (isset($_POST['dangtin'])) {
            $data = $_POST;
            $this->load->model("menu_slide_model");
            $data_up = $this->menu_slide_model->create_object($data);
            $id = $this->menu_slide_model->insert($data_up);

            redirect('menu_slide', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
        } else {
            // load_editor($this->data);
            $this->load->model("category_model");
            $this->data['categories'] = $this->category_model->where(array('deleted' => 0, 'menu_id' => 1))->order_by('order', "ASC")->get_all();
            $this->data['topics'] = $this->category_model->where(array('deleted' => 0, 'menu_id' => 2))->order_by('order', "ASC")->get_all();
            echo $this->blade->view()->make('page/page', $this->data)->render();
        }
    }

    public function edit($param)
    { /////// trang ca nhan
        $id = $param[0];
        if (isset($_POST['dangtin'])) {
            $this->load->model("menu_slide_model");
            $data = $_POST;
            // print_r($data);
            // die();
            $data_up = $this->menu_slide_model->create_object($data);
            $this->menu_slide_model->update($data_up, $id);
            redirect('menu_slide', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
        } else {
            $this->load->model("menu_slide_model");
            $tin = $this->menu_slide_model->where(array('id' => $id))->as_object()->get();
            $this->data['tin'] = $tin;
            // load_editor($this->data);
            //            load_chossen($this->data);
            $this->load->model("category_model");
            $this->data['categories'] = $this->category_model->where(array('deleted' => 0, 'menu_id' => 1))->order_by('order', "ASC")->get_all();
            $this->data['topics'] = $this->category_model->where(array('deleted' => 0, 'menu_id' => 2))->order_by('order', "ASC")->get_all();
            echo $this->blade->view()->make('page/page', $this->data)->render();
        }
    }

    public function remove($params)
    { /////// trang ca nhan
        $this->load->model("menu_slide_model");
        $id = $params[0];
        $this->menu_slide_model->update(array("deleted" => 1), $id);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    function saveorder()
    {
        $this->load->model("menu_slide_model");
        $data = json_decode($this->input->post('data'), true);
        foreach ($data as $key => $row) {
            if (isset($row['id'])) {
                $id = $row['id'];
                $parent_id = isset($row['parent_id']) && $row['parent_id'] != "" ? $row['parent_id'] : 0;
                $array = array(
                    'parent_id' => $parent_id,
                    'order' => $key
                );
                $this->menu_slide_model->update($array, $id);
            }
        }
    }

    function savemenu()
    {
        $this->load->model("menu_slide_model");
        $data = json_decode($this->input->post('data'), true);
        $id = $data['id'];
        $data_up = $this->menu_slide_model->create_object($data);
        $this->menu_slide_model->update($data_up, $id);
    }
}
