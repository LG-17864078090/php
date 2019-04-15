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
        $this->load->view('about');
    }

    public function contact_us()//加载联系我们页
    {
        $this->load->view('contact-us');
    }

    public function reg()//加载注册页
    {
        $this->load->view('reg');
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
    public function show_course()//学生显示课程界面
    {
        $this->load->view('show-course');
    }
    public function show_info()//学生显示信息界面
    {
        $this->load->view('show-info');
    }
    public function feedback()//问题反馈界面
    {
        $this->load->view('feedback');
    }
    public function feedback_success()//问题反馈成功界面
    {
        $this->load->view('feedback-success');
    }
    public function announcement()//发布公告界面
    {
        $this->load->view('announcement');
    }



}
