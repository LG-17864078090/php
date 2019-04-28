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

    //更改学生密码
    public function update_student_password($ID,$password){
        $data = array(
            'password' => $password,
        );
        $this->db->where('studentID', $ID);
        $query = $this->db->update('students', $data);
        return $query;
    }

    //更改家长密码
    public function update_parent_password($ID,$password){
        $data = array(
            'password' => $password,
        );
        $this->db->where('childID', $ID);
        $query = $this->db->update('parents', $data);
        return $query;
    }

    //更改老师密码
    public function update_teacher_password($ID,$password){
        $data = array(
            'password' => $password,
        );
        $this->db->where('teacherID', $ID);
        $query = $this->db->update('teachers', $data);
        return $query;
    }

    //更改管理员密码
    public function update_admin_password($ID,$password){
        $data = array(
            'password' => $password,
        );
        $this->db->where('adminID', $ID);
        $query = $this->db->update('admin', $data);
        return $query;
    }

    //删除学生用户
    public function delete_student_by_id($ID){
        $query = $this->db->delete('students', array(
            'studentID' => $ID
        ));
        $this->db->delete('grade', array(
            'sID' => $ID
        ));
        return  $query;
    }

    //删除家长用户
    public function delete_parent_by_id($ID){
        $query = $this->db->delete('parents', array(
            'childID' => $ID
        ));
        return  $query;
    }

    //获取全部老师列表
    public function get_teacher_list(){
        $query = $this->db->get('teachers');
        return $query->result();
    }

    //获取全部学生列表
    public function get_student_list(){
        $query = $this->db->get_where('students',array(
            'exist' => 1
        ));
        return $query->result();
    }

    //获取全部家长列表
    public function get_parent_list(){
        $query = $this->db->get_where('parents',array(
            'exist' => 1
        ));
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