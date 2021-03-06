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

    //通过ID获取公告
    public function get_announce_by_id($announce_id){
        $query = $this->db->get_where('announces',array(
            'id'=> $announce_id
        ));
        return $query->row();
    }

    //通过内容模糊匹配搜索公告
    public function find_announce($text){
        $this->db->select('*');
        $this->db->from('announces');
        $this->db->like('title',$text);
        $this->db->or_like('content',$text);
        return $this->db->get()->result();
    }

    //删除公告
    public function  delete_announce_by_id($announce_id){
        $query = $this->db->delete('announces', array(
            'id' => $announce_id
        ));
        return  $query;
    }

    //获取公告列表
    public function  get_announce_list(){
        $sql = 'select * from announces order by announces.time desc';
        $query = $this->db->query($sql);
        return  $query->result();

    }

    //获取学校信息
    public function  get_school_info(){
        $query = $this->db->get('school_info');
        return $query->row();
    }

    //变更学校信息
    public function  change_school_info($id,$intro,$about){
        $data = array(
            'intro' => $intro,
            'about' => $about,
        );
        $this->db->where('id', $id);
        $query = $this->db->update('school_info', $data);
        return $query;
    }
}