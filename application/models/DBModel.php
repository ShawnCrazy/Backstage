<?php
/**
 * Created by PhpStorm.
 * User: njche
 * Date: 2017/10/27
 * Time: 16:23
 */

class DBModel extends CI_Model
{
    function __construct()
    {
        $this->load->database();
    }

    /*获取图片*/
    function getImage($type)
    {
//        $sql = "select * from images WHERE image_type = 'slider'";
//        $query = $this->db->query($sql);
//        return $query->result_array();
        $result = $this->db->select('*')
            ->from('images')
            ->where("image_type='$type'")
            ->get();
        return $result->result_array();
    }
    /*获取商品详情*/
    function getInfo()
    {
        $result = $this->db->select('*')
            ->from('goods')
            ->get();
        return $result->result_array();
    }
    function getData($table, $type)
    {
        $result = $this->db->select('*')
            ->from($table)
            ->where("image_type='$type'")
            ->get();
        return $result->result_array();
    }
}