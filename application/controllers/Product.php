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
    public function get_simba($params)
    {
        $id = $params[0];
        $this->load->model("product_simba_model");
        $json_data = $this->product_simba_model->where(array('id' => $id))->with_units()->with_image()->as_object()->get();
        echo json_encode($json_data);
    }
    public function save_dvt()
    {
        if (isset($_POST['cap_nhat'])) {
            $data = $_POST;
            $id = $data['id'];
            $this->load->model("product_unit_model");
            $data_up = $this->product_unit_model->create_object($data);
            if ($id > 0)
                $this->product_unit_model->update($data_up, $id);
            else {
                if (isset($data_up['id']))
                    unset($data_up['id']);
                $id = $this->product_unit_model->insert($data_up);
            }
            $unit =  $this->product_unit_model->get($id);
            echo json_encode($unit);
        }
    }
    public function add()
    { /////// trang ca nhan
        // echo "<pre>";
        // print_r($_POST);
        // die();
        if (isset($_POST['dangtin'])) {
            $data = $_POST;
            $data['user_id'] = $this->session->userdata('user_id');
            $this->load->model("product_model");
            $data_up = $this->product_model->create_object($data);
            $id = $this->product_model->insert($data_up);
            /*
             * Category
             */

            $this->load->model("product_category_model");
            if (isset($data['category_list'])) {
                foreach ($data['category_list'] as $row) {
                    $array = array(
                        'category_id' => $row,
                        'product_id' => $id
                    );
                    $this->product_category_model->insert($array);
                }
            }

            /*
             * SP lien quan
             */

            $this->load->model("product_related_model");
            if (isset($data['related'])) {
                foreach ($data['related'] as $row) {
                    $array = array(
                        'product_related_id' => $row,
                        'product_id' => $id
                    );
                    $this->product_related_model->insert($array);
                }
            }
            /*
             * DVT
             */

            $this->load->model("product_unit_model");
            // print_r($data['dvt']);
            // die();
            if (isset($data['dvt'])) {
                foreach ($data['dvt'] as $row) {
                    $array = array(
                        'product_id' => $id,
                        'deleted' => 0,
                    );
                    $this->product_unit_model->update($array, $row);
                }
            }
            /*
             * Image_other
             */

            $this->load->model("product_image_model");
            // print_r($data['dvt']);
            // die();
            if (isset($data['image_other'])) {
                foreach ($data['image_other'] as $row) {
                    $array = array(
                        'product_id' => $id,
                        'image_id' => $row
                    );
                    $this->product_image_model->insert($array);
                }
                // die();
            }
            redirect('product', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
        } else {
            load_editor($this->data);
            load_chossen($this->data);
            load_datatable($this->data);
            $this->load->model("category_model");
            $this->load->model("origin_model");
            $this->load->model("preservation_model");
            $this->load->model("product_simba_model");
            $this->load->model("product_model");
            $this->data['max_order'] = $this->product_model->get_max_order();
            $this->data['product'] = $this->product_model->where(array("deleted" => 0))->get_all();
            $this->data['eat'] = $this->category_model->where(array("deleted" => 0, 'menu_id' => 1))->get_all();
            $this->data['cook'] = $this->category_model->where(array("deleted" => 0, 'menu_id' => 2))->get_all();
            $this->data['origin'] = $this->origin_model->get_all();
            $this->data['preservation'] = $this->preservation_model->get_all();
            $this->data['product_simba'] = $this->product_simba_model->where(array("status" => 1))->get_all();
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
            $this->load->model("product_category_model");
            $array = $this->product_category_model->where('product_id', $id)->as_array()->get_all();
            $related_old = array_map(function ($item) {
                return $item['category_id'];
            }, (array) $array);
            $related_new = array();
            if (isset($data['category_list'])) {
                $related_new = array_merge($related_new, $data['category_list']);
            }
            $array_delete = array_diff($related_old, $related_new);
            $array_add = array_diff($related_new, $related_old);
            foreach ($array_add as $row) {
                $array = array(
                    'category_id' => $row,
                    'product_id' => $id
                );
                $this->product_category_model->insert($array);
            }
            foreach ($array_delete as $row) {
                $array = array(
                    'category_id' => $row,
                    'product_id' => $id
                );
                $this->product_category_model->where($array)->delete();
            }

            /* SP lien quan */
            $this->load->model("product_related_model");
            $array = $this->product_related_model->where('product_id', $id)->as_array()->get_all();
            $related_old = array_map(function ($item) {
                return $item['product_related_id'];
            }, (array) $array);
            $related_new = array();
            if (isset($data['related'])) {
                $related_new = array_merge($related_new, $data['related']);
            }
            $array_delete = array_diff($related_old, $related_new);
            $array_add = array_diff($related_new, $related_old);
            foreach ($array_add as $row) {
                $array = array(
                    'product_related_id' => $row,
                    'product_id' => $id
                );
                $this->product_related_model->insert($array);
            }
            foreach ($array_delete as $row) {
                $array = array(
                    'product_related_id' => $row,
                    'product_id' => $id
                );
                $this->product_related_model->where($array)->delete();
            }
            /*
             * DVT
             */

            $this->load->model("product_unit_model");
            // print_r($data['dvt']);
            // die();
            if (isset($data['dvt'])) {
                foreach ($data['dvt'] as $row) {
                    $array = array(
                        'product_id' => $id,
                        'deleted' => 0,
                    );
                    $this->product_unit_model->update($array, $row);
                }
            }
            /*
             * Image_other
             */

            $this->load->model("product_image_model");
            // print_r($data['dvt']);
            // die();
            $this->product_image_model->where(array('product_id' => $id))->delete();
            if (isset($data['image_other'])) {
                foreach ($data['image_other'] as $row) {
                    $array = array(
                        'product_id' => $id,
                        'image_id' => $row
                    );
                    $this->product_image_model->insert($array);
                }
                // die();
            }
            redirect('product', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
        } else {
            $this->load->model("product_model");
            $this->load->model("product_related_model");
            $this->load->model("product_category_model");
            $tin = $this->product_model->where(array('id' => $id))->with_other_image()->with_units()->with_image()->as_object()->get();
            $product_related = $this->product_related_model->where(array('product_id' => $id))->as_object()->get_all();
            $category = $this->product_category_model->where(array('product_id' => $id))->as_object()->get_all();
            if (!empty($category)) {
                $cate_id = array();
                foreach ($category as $key => $cate) {
                    $cate_id[] = $cate->category_id;
                }
                $tin->category_list = $cate_id;
            }
            if (!empty($product_related)) {
                $related_id = array();
                foreach ($product_related as $key => $related) {
                    $related_id[] = $related->product_related_id;
                }
                $tin->related = $related_id;
            }
            if (!empty($tin->units)) {
                $tin->units = array_values((array) $tin->units);
            }
            if (!empty($tin->other_image)) {
                $tin->other_image = array_values((array) $tin->other_image);
                // echo "<pre>";
                // print_r($tin->other_image);
                // die();
            }
            $this->data['tin'] = $tin;

            load_editor($this->data);
            load_datatable($this->data);
            load_chossen($this->data);
            $this->load->model("category_model");
            $this->load->model("origin_model");
            $this->load->model("preservation_model");
            $this->load->model("product_simba_model");

            $this->data['max_order'] = $this->product_model->get_max_order();
            $this->data['product'] = $this->product_model->where(array("deleted" => 0))->get_all();
            $this->data['eat'] = $this->category_model->where(array("deleted" => 0, 'menu_id' => 1))->get_all();
            $this->data['cook'] = $this->category_model->where(array("deleted" => 0, 'menu_id' => 2))->get_all();
            $this->data['origin'] = $this->origin_model->get_all();
            $this->data['preservation'] = $this->preservation_model->get_all();
            $this->data['product_simba'] = $this->product_simba_model->where(array("status" => 1))->get_all();
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
        $where = $this->product_model->where(array("deleted" => 0));

        $totalData = $where->count_rows();
        $totalFiltered = $totalData;

        if (empty($this->input->post('search')['value'])) {
            //            $max_page = ceil($totalFiltered / $limit);

            $where = $this->product_model->where(array("deleted" => 0));
        } else {
            $search = $this->input->post('search')['value'];
            $sWhere = "deleted = 0 AND (LOWER(code) LIKE LOWER('%$search%') OR name_vi like '%" . $search . "%')";
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
