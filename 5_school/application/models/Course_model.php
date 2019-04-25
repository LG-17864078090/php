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
        $sql = 'select *
        from course c,teachers t
        where c.teacherID=t.teacherID
        order by c.courseID';
        $query = $this->db->query($sql);
        return  $query->result();
    }

    //删除课程
    public function  delete_course_by_id($courseID){
        $this->db->delete('grade',array(
            'cID' => $courseID
        ));

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

    //学生选课
    public function choose_course($courseID,$studentID){
        $data = array(
            'sID' => $studentID,
            'cID' => $courseID
        );
        $query = $this->db->insert('grade', $data);
        return $query;
    }

    //获取学生已选课程
    public function get_student_course_list_by_studentID($studentID){
        $sql = 'SELECT course.*, teachers.name
                from course, grade,teachers
                where grade.sID=' ." $studentID ".'and grade.cID=course.courseID and course.teacherID=teachers.teacherID';
        $query = $this->db->query($sql);
        return  $query->result();
    }

    //获取学生成绩
    public function get_student_grade($studentID){

        $sql = 'SELECT grade.*,course.courseName
                from course, grade
                where grade.sID=' ." $studentID ".'and grade.cID=course.courseID';
        $query = $this->db->query($sql);
//        $query = $this->db->get_where('grade',array(
//            'sID' => $studentID
//        ));
        return $query->result();
    }

    //学生退选课程
    public function cancel_choose_course($courseID,$studentID){
        $query = $this->db->delete('grade', array(
            'cID' => $courseID,
            'sID' => $studentID
        ));
        return  $query;

    }

    //检查是否已选该课程
    public function check_choose($courseID,$studentID){
        $query = $this->db->get_where('grade',array(
            'cID' => $courseID,
            'sID' => $studentID
        ));
        return $query->row();
    }




}