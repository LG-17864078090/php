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

	//默认访问index方法
	public function index()
	{
		$this->load->view('welcome_message');
	}

    public function login(){
        $this->load->view('login');
    }

	public function register(){
        $this->load->view('register');
    }

//    public function register1(){
//	    $name=$this->input->get('name');
//	    $pwd1=$this->input->get('pwd1');
//	    echo $name,$pwd1;
//        $this->load->view('register');
//    }

    public function save(){
	    //1.接受数据
        $name=$this->input->post('username');
        $pwd1=$this->input->post('pwd1');
        $pwd2=$this->input->post('pwd2');
        $data=array(
            //先把获取到的三个值存进来，如果验证不通过传入重新加载的页面
            'name'=>$name,
            'pwd1'=>$pwd1,
            'pwd2'=>$pwd2,
        );
        //2.验证
        if($name==''){
            $data['name_error']='用户名不能为空';
            //加载页面第二个参数必须为数组
            //加载页面不更改地址，只是加载页面
            //$this->load->view('register',$data);

            //重定向，只能GET方式传参，更改地址
            //redirect('welcome/register1?name=zs&pwd1=123');
        }
        if($pwd1==''){
            $data['pwd1_error']='密码不能为空';
        }
        if($pwd2==''){
            $data['pwd2_error']='确认密码不能为空';
        }elseif($pwd1!=$pwd2){
            $data['pwd_error']='两次密码不一致';
        }

        if(count($data)>3){
            $this->load->view('register',$data);
        }else{
            //3.链接数据库
            $this->load->model('User_model');
            $rows=$this->User_model->saveToDB($name,$pwd1);
            if($rows>0){
                echo 'success';
            }else{
                echo 'fail';
            }
        }
        //4.跳转页面

    }
    //http://localhost/myCI/welcome
    //http://localhost/项目名/控制器名/方法名

    public function login_check(){
	    $username = $this->input->post('username');
	    $password = $this->input->post('password');

	    $this->load->model('User_model');
	    $result = $this->User_model->get_user_by_name_and_pwd($username,$password);

	    //将用户信息存到session中
        $this->session->set_userdata('user',$result);
        $this->load->view('welcome_message');



//        //直接把数据库获取到的用户传值到页面
//	    $this->load->view('welcome_message',array(
//	        'user'=>$result,
//        ));

    }

    public function detail(){
	    $this->load->view('detail');
    }
}
