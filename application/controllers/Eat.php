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
        // load_datatable($this->data);
        load_sort_nest($this->data);
        $this->load->model("category_model");
        $category = $this->category_model->where(array('deleted' => 0, 'menu_id' => $this->menu_id))->order_by('order', "ASC")->as_array()->get_all();
        $this->data['html_nestable'] = html_nestable($category, 'parent_id', 0, 'eat');
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
            $this->load->model("product_category_model");
            $data = $_POST;
            $data_up = $this->category_model->create_object($data);
            $this->category_model->update($data_up, $id);

            if (isset($data['product_category'])) {
                foreach ($data['product_category'] as $key => $row) {
                    $data_up = array(
                        'order' => $key,
                        'category_id' => $id
                    );
                    $this->product_category_model->update($data_up, $row);
                }
            }
            redirect('eat', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
        } else {
            $this->load->model("category_model");
            $tin = $this->category_model->where(array('id' => $id))->with_image()->as_object()->get();
            $this->data['tin'] = $tin;
            load_editor($this->data);
            load_sort_nest($this->data);
            load_chossen($this->data);
            $this->load->model("product_category_model");
            $this->data['products'] = $this->product_category_model->where(array('category_id' => $id))->with_product()->order_by('order', "ASC")->get_all();

            $this->load->model("product_model");
            $this->data['products_add'] = $this->product_model->where(array("status" => 1, 'is_foodzone' => 1))->get_all();
            // echo "<pre>";
            // print_r($this->data['products']);
            // die();
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
    public function remove_product($params)
    { /////// trang ca nhan
        $this->load->model("product_category_model");
        $id = $params[0];
        $this->product_category_model->where(array("id" => $id))->delete();
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
        // } else {
        //     $search = $this->input->post('search')['value'];
        //     $sWhere = "deleted = 0";
        //     $where = $this->category_model->where($sWhere, NULL, NULL, FALSE, FALSE, TRUE);
        //     $totalFiltered = $where->count_rows();
        //     $where = $this->category_model->where($sWhere, NULL, NULL, FALSE, FALSE, TRUE);
        // }

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
                $nestedData['order'] = $post->order;
                $nestedData['active']  = $post->active == 1 ? "Có" : "Không";
                $image = isset($post->image->src) ? base_url() . $post->image->src : "";
                $nestedData['image'] = "<img src='$image' width='100'/>";
                $nestedData['action'] = '<a href="' . base_url() . 'cook/edit/' . $post->id . '" class="btn btn-warning btn-sm mr-2" title="edit">'
                    . '<i class="fas fa-pencil-alt">'
                    . '</i>'
                    . '</a>'
                    . '<a href="' . base_url() . 'cook/remove/' . $post->id . '" class="btn btn-danger btn-sm" data-type="confirm" title="remove">'
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
    public function addproductcategory()
    {
        $this->load->model("product_category_model");
        $data = json_decode($this->input->post('data'), true);
        $category_id = $this->input->post('category_id');

        $list = $this->product_category_model->where(array("category_id" => $category_id))->get_all();
        $max_order = 0;
        foreach ($list as $row) {
            if ($max_order < $row->order) {
                $max_order = $row->order;
            }
        }
        $list_product = array_map(function ($item) {
            return $item->product_id;
        }, (array) $list);
        $data = array_diff($data, $list_product);
        $max_order++;
        foreach ($data as $key => $product_id) {

            $array = array(
                'product_id' => $product_id,
                'category_id' => $category_id,
                'order' => $max_order
            );
            $this->product_category_model->insert($array);
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
                $array = array(
                    'parent_id' => $parent_id,
                    'order' => $key
                );
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
        unset($data_up['id']);
        $this->category_model->update($data_up, $id);
    }
}
