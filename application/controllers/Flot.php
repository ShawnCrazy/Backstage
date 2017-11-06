<?php
/**
 * Created by PhpStorm.
 * User: njche
 * Date: 2017/10/31
 * Time: 11:04
 */

class Flot extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('DBModel');
    }
    function index(){
        $data['goods'] = $this->DBModel->getInfo();
        $this->load->view('flot',$data);
    }

}