<?php
/**
 * Created by PhpStorm.
 * User: LG
 * Date: 2018/10/20
 * Time: 15:14
 */

class User_model extends CI_Model
{
    public function save($email,$name,$pwd,$sex){
        $data = array(
            'name' => $name,
            'password' => $pwd,
            'email'=>$email,
            'sex'=>$sex
        );
        $query = $this->db->insert('t_user', $data);
        return $query;
    }

    public function get_user_by_name_and_pwd($username,$password){
        $query = $this->db->get_where('t_user',array(
            'name'=>$username,
            'password'=>$password
        ));
        //返回一个对象
        return $query->row();

        //返回一个数组，用于查找到多条数据的批量操作
        //return $query->result();
    }

    public function get_user_by_email($email){
        $query = $this->db->get_where('t_user',array(
            'email'=>$email
        ));
        return $query->row();
    }

}