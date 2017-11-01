<?php
/**
 * Created by PhpStorm.
 * User: njche
 * Date: 2017/10/31
 * Time: 17:18
 */

class Upload extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('InsertModel');
    }

    public function index()
    {
        echo 'index';
        $this->load->view('success', array('error' => ' ' ));
    }

    public function do_upload()
    {
        /*上传文件配置*/
        $config['upload_path']      = './uploads/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']     = 100;
        $config['max_width']        = 1024;
        $config['max_height']       = 768;

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
        if ( ! $this->upload->do_upload('userfile'))
        {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('success', $error);
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
//            $data['title'] = $this->input->get_post('title');

            $this->load->view('index', $data);
        }
    }
}
?>