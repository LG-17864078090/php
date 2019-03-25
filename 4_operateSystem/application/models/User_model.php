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
}