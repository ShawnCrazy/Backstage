<?php
/**
 * Created by PhpStorm.
 * User: njche
 * Date: 2017/10/31
 * Time: 11:05
 */

class Grid extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }
    function index(){
        $this->load->view('grid');
    }

}