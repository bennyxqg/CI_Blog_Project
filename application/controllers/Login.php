<?php
class Login extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->model('Login_model');
		$this->load->library('form_validation');
	}
	
	function index(){
		if($this->Login_model->is_logged_in()){
			redirect('Admin/index');
		}else{
			$data['yzm'] = $this->Login_model->get_checkword();
			$data['login_error'] = "";
			$this->load->view('login',$data);
		}
	}
	
	function check(){
		if($this->Login_model->is_logged_in()){
			redirect('Admin/index');
		}
		$data['login_error'] = '';
		$this->form_validation->set_rules('username','用户名','required',array('required'=>'用户名不能为空'));
		$this->form_validation->set_rules('password','密码','required',array('required'=>'密码不能为空'));
		$this->form_validation->set_rules('checknum','验证码','required',array('required'=>'验证码不能为空'));
		if($this->form_validation->run()) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$checknum = $this->input->post('checknum');
			if($this->Login_model->check_num($checknum,$this->input->ip_address(),time()-1000)){
				if ($user = $this->Login_model->get_by_username($username)) {	
					if ($this->Login_model->check_password($password,$user['password'])){
						$this->Login_model->allow_pass($user);
						redirect('Admin/index');
					} 
					else { 	
						$data['login_error'] = '登录失败:无效的用户名或密码!'; 
					}
				} 
				else{
					$data['login_error'] = '登录失败:无效的用户名或密码!';
				}
			}else{
				$data['login_error'] = '验证码错误!';
			}
		}
		$data['yzm'] = $this->Login_model->get_checkword();
		$this->load->view('login',$data);
	}
	
	function logout(){
		$this->Login_model->remove_pass();
		$this->session->sess_destroy();
		$data['yzm'] = $this->Login_model->get_checkword();
		$data['login_error'] = '您已退出本次登录！';
		$this->load->view('login', $data);
	}
}

?>