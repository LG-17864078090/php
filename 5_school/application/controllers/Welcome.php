<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Announce_model');
        $this->load->model('User_model');
        $this->load->model('Feedback_model');
        $this->load->model('Course_model');
    }


    //生成验证码
    public function captcha(){
        //先获取验证码
        $this->load->helper('captcha');
        $word = rand(1000,9999);
        //随机数存入session用于验证验证码是否相同
        $this->session->set_userdata('captcha',$word);

        $vals = array(
            'word'      => $word,
            'img_path'  => './captcha/',
            'img_url'   => 'http://127.0.0.1/php/5_school/captcha/',
            'font_path' => './path/to/fonts/texb.ttf',
            'img_width' => 100,
            'img_height'    => 30,
            'word_length'   => 8,
            'font_size' => 16,
            'pool'      => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

            // White background and border, black text and red grid
            'colors'    => array(
                'background' => array(255, 255, 255),
                'border' => array(255, 255, 255),
                'text' => array(0, 0, 0),
                'grid' => array(255, 40, 40)
            )
        );
//		GD2
        $cap = create_captcha($vals);
        $img = $cap['image'];
        return $img;
    }

    //AJAX调用获取验证码
    public function get_captcha(){
        $img = $this->captcha();
        echo $img;
    }



	public function index()//加载首页
	{
	    $announce_list = $this->Announce_model->get_announce_list();
	    $school_info = $this->Announce_model->get_school_info();
		$this->load->view('index',array(
            'announce_list' => $announce_list,
            'school_info' => $school_info,
        ));
	}

    public function about()//加载关于页
    {
        $school_info = $this->Announce_model->get_school_info();
        $this->load->view('about',array(
            'school_info' => $school_info,
        ));
    }

    public function contact_us()//加载联系我们页
    {
        $this->load->view('contact-us');
    }

    public function reg()//加载注册页
    {
        $this->load->view('reg');
    }

    public function find_password()//加载找回密码页
    {
        $img = $this->captcha();
        $this->load->view('find-password',array(
            'captcha' => $img
        ));
    }

    public function reg_success()//加载注册成功页
    {
        $this->load->view('reg-success');
    }

    public function login()//加载登陆页
    {
        $this->load->view('login');
    }
    public function student_logined()//学生登陆成功界面
    {
        $this->load->view('student-logined');
    }

    public function parent_logined()//家长登陆成功界面
    {
        $this->load->view('parent-logined');
    }

    public function teacher_logined()//老师登陆成功界面
    {
        $this->load->view('teacher-logined');
    }

    public function administrator_logined()//管理员登陆成功界面
    {
        $this->load->view('administrator-logined');
    }
    public function show_student_grade()//学生显示成绩界面
    {
        $user = $this->session->user;
        $grade_list = $this->Course_model->get_student_grade($user->studentID);
        $this->load->view('show-student-grade',array(
            'grade_list' => $grade_list
        ));
    }

    public function show_child_grade()//家长显示学生成绩界面
    {
        $user = $this->session->user;
        $grade_list = $this->Course_model->get_student_grade($user->childID);

        $this->load->view('show-child-grade',array(
            'grade_list' => $grade_list
        ));
    }
    public function choose_course()//学生选课界面
    {
        $user = $this->session->user;
        $my_course_list = $this->Course_model->get_student_course_list_by_studentID($user->studentID);
        $course_list = $this->Course_model->get_course_list();
        $this->load->view('choose-course',array(
            'course_list' => $course_list,
            'my_course_list' => $my_course_list,
        ));
    }
    public function show_student_info()//学生显示个人信息界面
    {
        $user = $this->session->user;
        $student = $this->User_model->get_student_by_ID($user->studentID);
        $teacher = $this->User_model->get_teacher_by_ID($user->teacherID);
        $this->load->view('show-student-info',array(
            'student' => $student,
            'teacher' => $teacher
        ));
    }

    public function show_parent_info()//家长显示个人信息界面
    {
        $user = $this->session->user;
        $parent = $this->User_model->get_parent_by_ID($user->childID);
        $child = $this->User_model->get_student_by_ID($user->childID);
        $teacher = $this->User_model->get_teacher_by_ID($user->teacherID);
        $this->load->view('show-parent-info',array(
            'parent' => $parent,
            'teacher' => $teacher,
            'student' => $child
        ));
    }


    public function show_teacher_info()//老师显示个人信息界面
    {
        $user = $this->session->user;
        $teacher = $this->User_model->get_teacher_by_ID($user->teacherID);
        $this->load->view('show-teacher-info',array(
            'teacher' => $teacher,
        ));
    }

    public function feedback()//问题反馈界面
    {
        $this->load->view('feedback');
    }

    public function show_feedback()//显示问题反馈界面
    {
        $feedback_list = $this->Feedback_model->get_feedback_list();
        $this->load->view('show-feedback',array(
            'feedback_list' => $feedback_list
        ));
    }
    public function feedback_success()//问题反馈成功界面
    {
        $this->load->view('feedback-success');
    }
    public function announcement()//发布公告界面
    {
        $this->load->view('announcement');
    }
    public function course_manage()//课程管理界面
    {
        $teacher_list = $this->User_model->get_teacher_list();
        $course_list = $this->Course_model->get_course_list();
        $this->load->view('course-manage',array(
            'course_list' => $course_list,
            'teacher_list' => $teacher_list
        ));
    }

    public function user_manage()//用户管理界面
    {
        $teacher_list = $this->User_model->get_teacher_list();
        $student_list = $this->User_model->get_student_list();
        $parent_list = $this->User_model->get_parent_list();
        $this->load->view('user-manage',array(
            'student_list' => $student_list,
            'teacher_list' => $teacher_list,
            'parent_list' => $parent_list
        ));
    }

    public function help_reg()//辅助注册界面
    {
        $user = $this->session->user;
        $teacherID = $user->teacherID;
        $student_reg_list = $this->User_model->get_student_reg_list($teacherID);
        $parent_reg_list = $this->User_model->get_parent_reg_list($teacherID);

        $this->load->view('help-reg',array(
            'student_reg_list' => $student_reg_list,
            'parent_reg_list' => $parent_reg_list
        ));
    }

    public function my_course()//老师课程界面
    {
        $user = $this->session->user;
        $teacherID = $user->teacherID;
        $my_course_list = $this->Course_model->get_my_course_list($teacherID);


        $this->load->view('my-course',array(
            'my_course_list' => $my_course_list,

        ));
    }


    public function change_school_info()//改变学校信息界面
    {
        $school_info = $this->Announce_model->get_school_info();
        $this->load->view('change-school-info',array(
            'school_info' => $school_info,
        ));
    }
    public function announcement_detail($announce_id)//公告详情界面
    {
        $announce = $this->Announce_model->get_announce_by_id($announce_id);
        $announce_list = $this->Announce_model->get_announce_list();
        $admin = $this->User_model->get_admin_by_ID($announce->publisherID);
        $next = null;
        $prev = null;
        foreach ($announce_list as $index=>$announcement){
            if($announcement->id == $announce->id){
                if($index > 0){
                    $prev = $announce_list[$index - 1];
                }
                if($index < count($announce_list)-1){
                    $next = $announce_list[$index + 1];
                }
            }
        }
        $this->load->view('announcement-detail',array(
            'prev' => $prev,
            'next' => $next,
            'announce' => $announce,
            'admin' => $admin,
            'announce_list' => $announce_list
        ));
    }



}
