<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Announce_model');
        $this->load->model('Course_model');
        $this->load->model('Feedback_model');
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

    //学生信息更改
    public function update_student_info(){
        $studentID = $this->input->get('studentID');
        $phone = $this->input->get('phone');
        $address = $this->input->get('address');

        $rows = $this->User_model->update_student_info($studentID,$phone,$address);
        if(count($rows)>0){
            echo 'success';
        }else{
            echo 'fail';
        }
    }

    //家长信息更改
    public function update_parent_info(){
        $parentID = $this->input->get('parentID');
        $phone = $this->input->get('phone');
        $address = $this->input->get('address');

        $rows = $this->User_model->update_parent_info($parentID,$phone,$address);
        if(count($rows)>0){
            echo 'success';
        }else{
            echo 'fail';
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
                    $this->session->set_userdata('user_work','teacher');
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
                $this->session->set_userdata('user_work','student');
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
                $this->session->set_userdata('user_work','parent');
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
                $this->session->set_userdata('user_work','teacher');
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
                $this->session->set_userdata('user_work','administrator');
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
        $this->session->unset_userdata('user_work');
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
    //删除公告
    public  function delete_announce(){
        $announce_id = $this->input->get('announce_id');
        $rows = $this->Announce_model->delete_announce_by_id($announce_id);
        if(count($rows)>0){
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

    //管理员删除课程
    public function delete_course(){
        $courseID = $this->input->get('courseID');
        $rows = $this->Course_model->delete_course_by_id($courseID);
        if(count($rows)>0){
            echo 'success';
        }else{
            echo 'fail';
        }
    }

    //课号输入检查
    public  function courseID_check(){
        $courseID = $this->input->get('courseID');
        $course = $this->Course_model->get_course_by_ID($courseID);
        if($course){
            echo 'success';
        }else{
            echo 'fail';
        }
    }

    //管理员添加课程
    public function add_course(){
        $courseID = $this->input->get('courseID');
        $courseName = $this->input->get('courseName');
        $classroomNum = $this->input->get('classroomNum');
        $teacherID = $this->input->get('teacherID');
        $starttime = $this->input->get('starttime');
        $startweek = $this->input->get('startweek');
        $endweek = $this->input->get('endweek');

        $rows = $this->Course_model->add_course($courseID,$courseName,$classroomNum,$teacherID,$startweek,$endweek,$starttime);
        if(count($rows)>0){
            echo 'success';
        }else{
            echo 'fail';
        }
    }

    //学生选课
    public function choose_course(){
        $courseID = $this->input->get('courseID');
        $studentID = $this->input->get('studentID');

        $rows = $this->Course_model->choose_course($courseID,$studentID);
        if(count($rows)>0){
            echo 'success';
        }else{
            echo 'fail';
        }
    }

    //学生退选课程
    public function cancel_choose_course(){
        $courseID = $this->input->get('courseID');
        $studentID = $this->input->get('studentID');
        $rows = $this->Course_model->cancel_choose_course($courseID,$studentID);
        if(count($rows)>0){
            echo 'success';
        }else{
            echo 'fail';
        }
    }

    //问题反馈
    public function feedback(){

        $problem = $this->input->get('problem');
        $time = $this->input->get('time');
        $user = $this->session->user;
        $work = $this->session->user_work;
        if($work == 'student'){
            $feedbackerID = $user->studentID;
        }elseif ($work == 'parent'){
            $feedbackerID = $user->childID;
        }elseif ($work == 'teacher'){
            $feedbackerID = $user->teacherID;
        }

        $rows = $this->Feedback_model->save_feedback($problem,$feedbackerID,$time,$work);
        if(count($rows)>0){
            echo 'success';
        }else{
            echo 'fail';
        }
    }



    //检查是否已选该课程
    public function check_choose(){
        $courseID = $this->input->get('courseID');
        $studentID = $this->input->get('studentID');
        $course = $this->Course_model->check_choose($courseID,$studentID);
        if($course){
            echo 'success';
        }else{
            echo 'fail';
        }

    }








}