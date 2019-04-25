<?php
/**
 * Created by PhpStorm.
 * User: LG
 * Date: 2018/10/20
 * Time: 15:14
 */

class User_model extends CI_Model
{
    //通过ID查找学生
    public function get_student_by_ID($ID){
        $query = $this->db->get_where('students',array(
            'studentID'=> $ID,
            'exist' => 1
        ));
        return $query->row();
    }

    //通过ID查找家长
    public function get_parent_by_ID($ID){
        $query = $this->db->get_where('parents',array(
            'childID'=> $ID,
            'exist' => '1'
        ));
        return $query->row();
    }

    //通过ID查找老师
    public function get_teacher_by_ID($ID){
        $query = $this->db->get_where('teachers',array(
            'teacherID'=> $ID
        ));
        return $query->row();
    }

    //通过ID查找管理员
    public function get_admin_by_ID($ID){
        $query = $this->db->get_where('admin',array(
            'adminID'=> $ID
        ));
        return $query->row();
    }

    //保存学生信息
    public function save_student($studentID,$password,$name,$sex,$phone,$address,$teacherID){
        $data = array(
            'studentID' => $studentID,
            'password' => $password,
            'name' => $name,
            'sex' => $sex,
            'phone' => $phone,
            'address' => $address,
            'teacherID' => $teacherID,
            'exist' => 0
        );
        $query = $this->db->insert('students', $data);
        return $query;
    }

    //保存家长信息
    public function save_parent($childID,$password,$name,$sex,$phone,$address,$teacherID){
        $data = array(
            'childID' => $childID,
            'password' => $password,
            'name' => $name,
            'sex' => $sex,
            'phone' => $phone,
            'address' => $address,
            'teacherID' => $teacherID,
            'exist' => 0
        );
        $query = $this->db->insert('parents', $data);
        return $query;
    }

    //保存老师信息
    public function save_teacher($teacherID,$password,$name,$sex,$phone,$address){
        $data = array(
            'teacherID' => $teacherID,
            'password' => $password,
            'name' => $name,
            'sex' => $sex,
            'phone' => $phone,
            'address' => $address,
        );
        $query = $this->db->insert('teachers', $data);
        return $query;
    }

    //更改学生信息
    public function update_student_info($studentID,$phone,$address){
        $data = array(
            'phone' => $phone,
            'address' => $address,
        );

        $this->db->where('studentID', $studentID);
        $query = $this->db->update('students', $data);
        return $query;
    }

    //更改家长信息
    public function update_parent_info($parentID,$phone,$address){
        $data = array(
            'phone' => $phone,
            'address' => $address,
        );

        $this->db->where('childID', $parentID);
        $query = $this->db->update('parents', $data);
        return $query;
    }

    //更改老师信息
    public function update_teacher_info($teacherID,$phone,$address){
        $data = array(
            'phone' => $phone,
            'address' => $address,
        );

        $this->db->where('teacherID', $teacherID);
        $query = $this->db->update('teachers', $data);
        return $query;
    }

    //获取老师列表
    public function get_teacher_list(){
        $query = $this->db->get('teachers');
        return $query->result();
    }

    //获取需要辅助的学生列表
    public function get_student_reg_list($teacherID){
        $query = $this->db->get_where('students',array(
            'teacherID'=> $teacherID,
            'exist' => 0
        ));
        return $query->result();
    }

    //获取需要辅助的家长列表
    public function get_parent_reg_list($teacherID){
        $sql = 'select parents.*
                from parents
                where parents.teacherID=' ." $teacherID ".' and parents.exist=\'0\'';
        $query = $this->db->query($sql);
        return $query->result();
    }

    //帮助学生完成注册
    public function help_student_reg($studentID){
        $data = array(
            'exist' => 1,
        );
        $this->db->where('studentID', $studentID);
        $query = $this->db->update('students', $data);
        return $query;
    }

    //帮助家长完成注册
    public function help_parent_reg($parentID){
        $data = array(
            'exist' => 1,
        );
        $this->db->where('childID', $parentID);
        $query = $this->db->update('parents', $data);
        return $query;
    }


}