<?php

require_once("application/core/MY_Administrator.php");

class Product extends MY_Administrator
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
    public function get($params)
    {
        $id = $params[0];
        $this->load->model("product_model");
        $json_data = $this->product_model->where(array('id' => $id))->as_object()->get();
        echo json_encode($json_data);
    }

    public function add()
    { /////// trang ca nhan
        if (isset($_POST['dangtin'])) {
            $data = $_POST;
            $data['user_id'] = $this->session->userdata('user_id');
            $this->load->model("product_model");
            $data_up = $this->product_model->create_object($data);
            $id = $this->product_model->insert($data_up);
            /*
             * Category
             */

            $this->load->model("productcategory_model");
            if (isset($data['category_list'])) {
                foreach ($data['category_list'] as $row) {
                    $array = array(
                        'category_id' => $row,
                        'product_id' => $id
                    );
                    $this->productcategory_model->insert($array);
                }
            }
            redirect('product', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
        } else {
            load_editor($this->data);
            $this->load->model("category_model");
            $this->data['eat'] = $this->category_model->where(array("deleted" => 0, 'menu_id' => 1))->get_all();
            $this->data['cook'] = $this->category_model->where(array("deleted" => 0, 'menu_id' => 2))->get_all();
            echo $this->blade->view()->make('page/page', $this->data)->render();
        }
    }

    public function edit($param)
    { /////// trang ca nhan
        $id = $param[0];
        if (isset($_POST['dangtin'])) {
            $this->load->model("product_model");
            $data = $_POST;
            $data_up = $this->product_model->create_object($data);
            $this->product_model->update($data_up, $id);


            /* CATEGORY */
            $this->load->model("productcategory_model");
            $array = $this->productcategory_model->where('product_id', $id)->as_array()->get_all();
            $categroy_old = array_map(function ($item) {
                return $item['category_id'];
            }, $array);
            $categroy_new = array();
            if (isset($data['category_list'])) {
                $categroy_new = array_merge($categroy_new, $data['category_list']);
            }
            $array_delete = array_diff($categroy_old, $categroy_new);
            $array_add = array_diff($categroy_new, $categroy_old);
            foreach ($array_add as $row) {
                $array = array(
                    'category_id' => $row,
                    'product_id' => $id
                );
                $this->productcategory_model->insert($array);
            }
            foreach ($array_delete as $row) {
                $array = array(
                    'category_id' => $row,
                    'product_id' => $id
                );
                $this->productcategory_model->where($array)->delete();
            }

            redirect('product', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
        } else {
            $this->load->model("product_model");
            $tin = $this->product_model->where(array('id' => $id))->with_image()->with_category()->as_object()->get();
            if (isset($tin->category)) {
                $cate_id = array();
                foreach ($tin->category as $key => $cate) {
                    $cate_id[] = $key;
                }
                $tin->category_list = $cate_id;
            }
            $this->data['tin'] = $tin;

            load_editor($this->data);
            $this->load->model("category_model");
            $this->data['eat'] = $this->category_model->where(array("deleted" => 0, 'menu_id' => 1))->get_all();
            $this->data['cook'] = $this->category_model->where(array("deleted" => 0, 'menu_id' => 2))->get_all();
            echo $this->blade->view()->make('page/page', $this->data)->render();
        }
    }

    public function remove($params)
    { /////// trang ca nhan
        $this->load->model("product_model");
        $id = $params[0];
        $this->product_model->update(array("deleted" => 1), $id);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
    public function table()
    { /////// trang ca nhan
        $this->load->model("product_model");
        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $page = ($start / $limit) + 1;
        $where = $this->product_model;

        $totalData = $where->count_rows();
        $totalFiltered = $totalData;

        if (empty($this->input->post('search')['value'])) {
            //            $max_page = ceil($totalFiltered / $limit);

            $where = $this->product_model->where(array("deleted" => 0));
        } else {
            $search = $this->input->post('search')['value'];
            $sWhere = "deleted = 0";
            $where = $this->product_model->where($sWhere, NULL, NULL, FALSE, FALSE, TRUE);
            $totalFiltered = $where->count_rows();
            $where = $this->product_model->where($sWhere, NULL, NULL, FALSE, FALSE, TRUE);
        }

        $posts = $where->order_by("id", "DESC")->with_image()->paginate($limit, NULL, $page);
        //        echo "<pre>";
        //        print_r($posts);
        //        die();
        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $nestedData['id'] = $post->id;
                $nestedData['code'] = $post->code;
                $nestedData['name_vi'] = $post->name_vi;
                $nestedData['price'] = number_format($post->price, 0, ",", ".") . " VND";
                // $nestedData['date'] =  date("d/m/Y", strtotime($post->date));
                $nestedData['action'] = '<a href="' . base_url() . 'product/edit/' . $post->id . '" class="btn btn-warning btn-sm mr-2" title="edit">'
                    . '<i class="fas fa-pencil-alt">'
                    . '</i>'
                    . '</a>'
                    . '<a href="' . base_url() . 'product/remove/' . $post->id . '" class="btn btn-danger btn-sm" data-type="confirm" title="remove">'
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
