<?php
/**
 * Created by PhpStorm.
 * User: njche
 * Date: 2017/10/31
 * Time: 11:03
 */

class Buttons extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }
    function index(){
        $this->load->view('buttons');
    }

}