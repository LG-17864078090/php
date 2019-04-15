<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Announce_model');
    }


    //检查学生ID是否存在
    public function checkStudentID(){
        $ID = $this->input->get('ID');
        $rows = $this->User_model->get_student_by_ID($ID);
        if($rows){
            //在AJAX中 输出的东西即可在AJAx回调函数中获取
            echo 'fail';
        }else{
            echo 'success';
        }
    }

    //检查家长ID是否存在
    public function checkParentID(){
        $ID = $this->input->get('ID');
        $rows = $this->User_model->get_parent_by_ID($ID);
        if($rows){
            //在AJAX中 输出的东西即可在AJAx回调函数中获取
            echo 'fail';
        }else{
            echo 'success';
        }
    }

    //检查教师ID是否存在
    public function checkTeacherID(){
        $ID = $this->input->get('ID');
        $rows = $this->User_model->get_teacher_by_ID($ID);
        if($rows){
            //在AJAX中 输出的东西即可在AJAx回调函数中获取
            echo 'fail';
        }else{
            echo 'success';
        }
    }

    //存储学生信息
    public function save_student_massage(){
        $studentID = $this->input->get('studentID');
        $password = $this->input->get('password');
        $name = $this->input->get('name');
        $sex = $this->input->get('sex');
        $phone = $this->input->get('phone');
        $address = $this->input->get('address');
        $teacherID = $this->input->get('teacherID');

        $rows = $this->User_model->get_student_by_ID($studentID);
        //后台验证
        if(count($rows)>0){
            echo 'id_error';
        }elseif($name == ''){
            echo 'name_error';
        }elseif($password == ''){
            echo 'password_error';
        }elseif($sex == ''){
            echo 'sex_error';
        }else{
            $rows = $this->User_model->save_student($studentID,$password,$name,$sex,$phone,$address,$teacherID);
            if($rows>0){
                echo 'success';
            }else{
                echo 'fail';
            }
        }
    }

    //存储家长信息
    public function save_parent_massage(){
        $childID = $this->input->get('childID');
        $password = $this->input->get('password');
        $name = $this->input->get('name');
        $sex = $this->input->get('sex');
        $phone = $this->input->get('phone');
        $address = $this->input->get('address');
        $teacherID = $this->input->get('teacherID');

        $rows = $this->User_model->get_parent_by_ID($childID);

        //后台验证
        if(count($rows)>0){
            echo 'id_error';
        }elseif($name == ''){
            echo 'name_error';
        }elseif($password == ''){
            echo 'password_error';
        }elseif($sex == ''){
            echo 'sex_error';
        }else{
            $rows = $this->User_model->save_parent($childID,$password,$name,$sex,$phone,$address,$teacherID);
            if($rows>0){
//                $this->session->set_userdata('user',$rows);
                echo 'success';
            }else{
                echo 'fail';
            }
        }
    }

    //存储教师信息
    public function save_teacher_massage(){
        $teacherID = $this->input->get('teacherID');
        $password = $this->input->get('password');
        $name = $this->input->get('name');
        $sex = $this->input->get('sex');
        $phone = $this->input->get('phone');
        $address = $this->input->get('address');

        $rows = $this->User_model->get_teacher_by_ID($teacherID);
        //后台验证
        if(count($rows)>0){
            echo 'id_error';
        }elseif($name == ''){
            echo 'name_error';
        }elseif($password == ''){
            echo 'password_error';
        }elseif($sex == ''){
            echo 'sex_error';
        }else{
            $rows = $this->User_model->save_teacher($teacherID,$password,$name,$sex,$phone,$address);
            if($rows>0){
                $user = $this->User_model->get_teacher_by_ID($teacherID);
                if($user){
                    $this->session->set_userdata('user',$user);
                }
                echo 'success';
            }else{
                echo 'fail';
            }
        }
    }


    //学生登陆检查
    public  function student_login_check(){
        $ID = $this->input->get('ID');
        $password = $this->input->get('password');

        $user = $this->User_model->get_student_by_ID($ID);
        if($user){
            if($password == $user->password){
                echo 'success';
                $this->session->set_userdata('user',$user);
            }else{
                echo 'password_error';
            }
        }else{
            echo 'id_error';
        }
    }

    //家长登陆检查
    public  function parent_login_check(){
        $ID = $this->input->get('ID');
        $password = $this->input->get('password');

        $user = $this->User_model->get_parent_by_ID($ID);
        if($user){
            if($password == $user->password){
                echo 'success';
                $this->session->set_userdata('user',$user);
            }else{
                echo 'password_error';
            }
        }else{
            echo 'id_error';
        }
    }

    //老师登陆检查
    public  function teacher_login_check(){
        $ID = $this->input->get('ID');
        $password = $this->input->get('password');

        $user = $this->User_model->get_teacher_by_ID($ID);
        if($user){
            if($password == $user->password){
                echo 'success';
                $this->session->set_userdata('user',$user);
            }else{
                echo 'password_error';
            }
        }else{
            echo 'id_error';
        }
    }

    //管理员登陆检查
    public  function admin_login_check(){
        $ID = $this->input->get('ID');
        $password = $this->input->get('password');

        $user = $this->User_model->get_admin_by_ID($ID);
        if($user){
            if($password == $user->password){
                echo 'success';
                $this->session->set_userdata('user',$user);
            }else{
                echo 'password_error';
            }
        }else{
            echo 'id_error';
        }
    }

    //退出登录
    public function logout(){
        //删除session数据
        $this->session->unset_userdata('user');
        redirect('welcome/login');
    }


    //发布公告
    public function announce(){
        $title = $this->input->get('title');
        $content = $this->input->get('content');
        $time = $this->input->get('time');
        $user = $this->session->user;
        $adminID = $user->adminID;

        $rows = $this->Announce_model->save_announce($adminID,$title,$content,$time);
        if($rows>0){
            echo 'success';
        }else{
            echo 'fail';
        }
    }

    //学校信息更改
    public function change_school_info(){
        $id = $this->input->get('id');
        $intro = $this->input->get('intro');
        $about = $this->input->get('about');

        $rows = $this->Announce_model->change_school_info($id,$intro,$about);
        if(count($rows)>0){
            echo 'success';
        }else{
            echo 'fail';
        }
    }







}