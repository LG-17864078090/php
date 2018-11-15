<?php
/**
 * Created by PhpStorm.
 * User: LG
 * Date: 2018/10/20
 * Time: 15:14
 */

class User_model extends CI_Model
{
    public function saveToDB($name,$password){
        $data = array(
            'name' => $name,
            'password' => $password
        );
        $query = $this->db->insert('t_userTest', $data);
        return $query;
    }

    public function get_user_by_name_and_pwd($username,$password){
        $query = $this->db->get_where('t_userTest',array(
            'name'=>$username,
            'password'=>$password
        ));
        //返回一个对象
        return $query->row();

        //返回一个数组，用于查找到多条数据的批量操作
        //return $query->result();

    }

}