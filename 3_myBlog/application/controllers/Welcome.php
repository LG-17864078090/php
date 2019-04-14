<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Welcome extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Blog_model');
        $this->load->model('User_model');
    }


    //默认访问index方法
    public function index()
    {
        //$this->load->model('Blog_model');
        $blog_list = $this->Blog_model->get_blog_list();
        $catalog_list = $this->Blog_model->get_catalog_list();
        $this->load->view('index',array(
            'blog_list'=>$blog_list,
            'catalog_list'=>$catalog_list
        ));
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
            'img_url'   => 'http://127.0.0.1//php/3_myBlog/captcha/',
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

    //注册
    public function reg(){
        $img = $this->captcha();
        $this->load->view('reg',array(
            'captcha'=>$img
        ));
    }

    //检查邮箱
    public function check_email(){
        $email = $this->input->get('email');
        //$this->load->model('User_model');
        $rows = $this->User_model->get_user_by_email($email);
        if($rows){
            //在AJAX中 输出的东西即可在AJAx回调函数中获取
            echo 'fail';
        }else{
            echo 'success';
        }
    }

    //储存用户注册信息
    public function save_user_massage(){
        $email = $this->input->get('email');
        $name = $this->input->get('name');
        $pwd = $this->input->get('pwd');
        $sex = $this->input->get('sex');
        $code = $this->input->get('code');
        $captcha = $this->session->userdata('captcha');

        //$this->load->model('User_model');
        $rows = $this->User_model->get_user_by_email($email);
        //后台验证
        if(count($rows)>0){
            echo 'email_error';
        }elseif($name == ''){
            echo 'name_error';
        }elseif($pwd == ''){
            echo 'pwd_error';
        }elseif($sex == ''){
            echo 'sex_error';
        }elseif($code != $captcha){
            echo 'code_error';
        }else{
            $rows = $this->User_model->save($email,$name,$pwd,$sex);
            if($rows>0){
                echo 'success';
            }else{
                echo 'fail';
            }
        }
    }

    //登录
    public  function login(){
        $this->load->view('login');
    }

    //登录检查
    public  function login_check(){
        $email = $this->input->get('email');
        $pwd = $this->input->get('pwd');

        $user = $this->User_model->get_user_by_email($email);
        if($user){
            if($pwd == $user->password){
                echo 'success';
                $this->session->set_userdata('user',$user);
            }else{
                echo 'pwd_error';
            }
        }else{
            echo 'email_error';
        }
    }

    //通过当前登录人id获取他的博客列表
    private function get_blog_list(){
        $id = $this->session->userdata('user')->id;
        $blogs = $this->Blog_model->get_blog_list_by_id($id);
        return $blogs;
    }

    //加载登入页
    public function index_logined(){
        $blogs = $this->get_blog_list();

        $this->load->view('index_logined',array(
            'blogs'=>$blogs
        ));
    }

    //加载博客详情页
    public function blog_detail($blog_id){
        $blog = $this->Blog_model->get_blog_by_id($blog_id);
        $blog->post_time = $this->time_tran($blog->post_time);
        $comments = $this->Blog_model->get_comment_by_blogid($blog_id);

        $my_blogs = $this->get_blog_list();
        $next = null;
        $prev = null;
        foreach ($my_blogs as $index=>$my_blog){
            if($my_blog->blog_id == $blog->blog_id){
                if($index > 0){
                    $prev = $my_blogs[$index - 1];
                }
                if($index < count($my_blogs)-1){
                    $next = $my_blogs[$index + 1];
                }
            }
        }

        $this->load->view('viewPost_comment',array(
            'blog'=>$blog,
            'prev'=>$prev,
            'next'=>$next,
            'comments'=>$comments
        ));
    }

    //退出登录
    public function logout(){
        //删除session数据
        $this->session->unset_userdata('user');
        redirect('welcome/login');
    }

    //计算时间差
    public function time_tran($the_time)
    {
        $now_time = date("Y-m-d H:i:s", time() + 8 * 60 * 60);
        $now_time = strtotime($now_time);
        $show_time = strtotime($the_time);
        $dur = $now_time - $show_time;
        if ($dur < 0) {
            return $the_time;
        } else {
            if ($dur < 60) {
                return $dur . '秒前';
            } else {
                if ($dur < 3600) {
                    return floor($dur / 60) . '分钟前';
                } else {
                    if ($dur < 86400) {
                        return floor($dur / 3600) . '小时前';
                    } else {
                        if ($dur < 259200) {//3天内
                            return floor($dur / 86400) . '天前';
                        } else {
                            return $the_time;
                        }
                    }
                }
            }
        }
    }
}