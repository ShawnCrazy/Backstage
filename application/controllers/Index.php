<?php
/**
 * Created by PhpStorm.
 * User: njche
 * Date: 2017/10/31
 * Time: 10:57
 */

class Index extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }
    function index(){
        $this->load->view('index');
    }
}