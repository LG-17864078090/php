<?php
/**
 * Created by PhpStorm.
 * User: LG
 * Date: 2018/10/20
 * Time: 15:14
 */

class Feedback_model extends CI_Model
{
    //保存问题反馈
    public function save_feedback($problem,$studentID,$time,$work,$receiveID){
        $data = array(
            'problem' => $problem,
            'time' => $time,
            'feedbackerID' => $studentID,
            'feedbackerWork' => $work,
            'receiverID' => $receiveID
        );
        $query = $this->db->insert('feedback', $data);
        return $query;
    }

    //老师获取反馈列表
    public function get_feedback_list_by_teacherID($teacherID){
        $query = $this->db->get_where('feedback',array(
            'receiverID' => $teacherID
        ));
        return $query->result();
    }

}