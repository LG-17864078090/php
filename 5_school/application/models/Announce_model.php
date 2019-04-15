<?php
/**
 * Created by PhpStorm.
 * User: LG
 * Date: 2018/10/20
 * Time: 15:14
 */

class Announce_model extends CI_Model
{
    //保存公告
    public function save_announce($adminID,$title,$content,$time){
        $data = array(
            'title' => $title,
            'content' => $content,
            'time' => $time,
            'publisherID' => $adminID
        );
        $query = $this->db->insert('announces', $data);
        return $query;
    }

    //获取公告列表
    public function  get_announce_list(){
        $query = $this->db->get('announces');
        return $query->result();
    }

    //获取学校信息
    public function  get_school_info(){
        $query = $this->db->get('school_info');
        return $query->row();
    }
}