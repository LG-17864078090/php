<?php
/**
 * Created by PhpStorm.
 * User: LG
 * Date: 2018/10/20
 * Time: 15:14
 */

class Course_model extends CI_Model
{


    //课程ID检查
    public function get_course_by_ID($courseID){
        $query = $this->db->get_where('course',array(
            'courseID'=> $courseID
        ));
        return $query->row();
    }

    //获取课程列表
    public function  get_course_list(){
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
    public function add_course($courseID,$courseName,$classroomNum,$teacherID,$startweek,$endweek,$starttime){
        $data = array(
            'courseID' => $courseID,
            'courseName' => $courseName,
            'classroomNum' => $classroomNum,
            'teacherID' => $teacherID,
            'startweek' => $startweek,
            'endweek' => $endweek,
            'starttime' => $starttime
        );
        $query = $this->db->insert('course', $data);
        return $query;
    }


}