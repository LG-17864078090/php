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
    public function save_feedback($problem,$studentID,$time,$work){
        $data = array(
            'problem' => $problem,
            'time' => $time,
            'feedbackerID' => $studentID,
            'feedbackerWork' => $work
        );
        $query = $this->db->insert('feedback', $data);
        return $query;
    }
}