<?php
/**
 * Created by PhpStorm.
 * User: njche
 * Date: 2017/10/31
 * Time: 17:18
 */

class Upload extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('InsertModel');
    }

    public function index()
    {
        echo 'index';
        $this->load->view('success', array('error' => ' '));
    }

    public function do_upload()
    {
        /*上传文件配置*/
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 100;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;

        $this->load->library('upload', $config);
        /*将表单存放数据库*/
        $data = array(
            'title' => $this->input->post('title'),
            'price' => $this->input->post('price'),
            'stock' => $this->input->post('stock'),
            'size' => $this->input->post('size'),
            'color' => $this->input->post('color'),
            'introduce' => $this->input->post('introduce'),
            'isSlider' => $this->input->post('isSlider')
        );
        var_dump($data);
        $this->InsertModel->addData($data);

        /**
         *
         * 判断是否成功上传图片*/
        if (!$this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('success', $error);
        } else {
            $data = array('upload_data' => $this->upload->data());
//            $data['title'] = $this->input->get_post('title');

            $this->load->view('index', $data);
        }
    }

    function insertDb()
    {
        $data = array(
            'goods_name' => $this->input->post('name'),
            'title' => $this->input->post('title'),
            'price' => (float)$this->input->post('price'),
            'sale' => (float)$this->input->post('sale'),
            'stock' => (int)$this->input->post('stock'),
            'size' => (int)$this->input->post('size'),
            'color' => $this->input->post('color'),
            'introduce' => $this->input->post('introduce'),
            //'isSlider' => $this->input->post('isSlider')
        );
//        echo json_encode($data);
        echo $this->InsertModel->addData('goods', $data);
    }

    function insertImg()
    {
        /*上传文件配置*/
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 100;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;

        $config['file_name'] = time();//图片名字
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('upload_file')) {
            echo '失败';
        } else {
            $data['image_name'] = $_POST['goods_name'];
            $data['image_type'] = $_POST['type'];
            $data['image_url'] = 'uploads/'.$this->upload->data('file_name');
            $data['goods_id'] = (int)$_POST['goods_id'];
            echo $this->InsertModel->addData('images', $data);
        }
    }

}

?>