<?php
/**
 * Created by PhpStorm.
 * User: njche
 * Date: 2017/10/31
 * Time: 15:48
 */

class InsertModel extends CI_Model
{
    function __construct()
    {
        $this->load->database();
    }

    function addData($data)
    {
        $query = $this->db->insert('product', $data);
    }

    function deleteData($data)
    {
        $deleteone = array(
            username => "zhangsan"
        );

        $this->db->delete('users', $deleteone);

    }

    function modifyData($data)
    {
        $setrule = array(
            "username" => "lisi",
            "password" => md5("1234567")
        );

        $this->db->update('users', $setrule, 'username=\'zhangsan\'');
    }

    function queryData($data)
    {
        $result = $this->db->select('username', 'password')
            ->from('users')
            ->where('username=\'lisi\'')
            ->limit('2,3')
            ->order_by('email')
            ->get();
    }
}