<?php
/**
 * Created by PhpStorm.
 * User: LG
 * Date: 2018/10/20
 * Time: 15:14
 */

class Course_model extends CI_Model
{
//    //保存公告
//    public function save_announce($adminID,$title,$content,$time){
//        $data = array(
//            'title' => $title,
//            'content' => $content,
//            'time' => $time,
//            'publisherID' => $adminID
//        );
//        $query = $this->db->insert('announces', $data);
//        return $query;
//    }
//
//    public function get_announce_by_id($announce_id){
//        $query = $this->db->get_where('announces',array(
//            'id'=> $announce_id
//        ));
//        return $query->row();
//
//    }

    //课程ID检查
    public function get_course_by_ID($courseID){
        $query = $this->db->get_where('course',array(
            'courseID'=> $courseID
        ));
        return $query->row();
    }

    //获取课程列表
    public function  get_course_list(){
        $sql = 'select * from course c,teachers t where c.teacherID=t.teacherID order by c.courseID';

        $sql = 'select *,(select count(*) from course c,teachers t where c.teacherID=t.teacherID) num
        from course c,teachers t
        where c.teacherID=t.teacherID
        order by c.courseID';
        $query = $this->db->query($sql);
        return  $query->result();
    }

    //删除课程
    public function  delete_course_by_id($courseID){

        $query = $this->db->delete('course', array(
            'courseID' => $courseID
        ));

        return  $query;
    }

    //添加课程
    public function add_course($courseID,$courseName,$classroomNum,$teacherID,$startweek,$endweek){
        $data = array(
            'courseID' => $courseID,
            'courseName' => $courseName,
            'classroomNum' => $classroomNum,
            'teacherID' => $teacherID,
            'startweek' => $startweek,
            'endweek' => $endweek,
        );
        $query = $this->db->insert('course', $data);
        return $query;
    }

//    //获取学校信息
//    public function  get_school_info(){
//        $query = $this->db->get('school_info');
//        return $query->row();
//    }
//
//    //变更学校信息
//    public function  change_school_info($id,$intro,$about){
////        $query = $this->db->get('school_info');
////        return $query->row();
//        $data = array(
//            'intro' => $intro,
//            'about' => $about,
//        );
//
//        $this->db->where('id', $id);
//        $query = $this->db->update('school_info', $data);
//        return $query;
//    }
}