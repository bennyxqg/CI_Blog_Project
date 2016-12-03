<?php
class Admin extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->library('form_validation');
		$this->load->model(array('Login_model','Admin_model'));
		if(!$this->Login_model->is_logged_in()){
			redirect('Login/index');
		}
	}

	function index(){
		$this->load->view('Admin/header');
		$this->load->view('Admin/home');
		$this->load->view('Admin/footer');
	}
	
	function show(){
		$data['plan'] = $this->Admin_model->get_plan_info();
		$data['info'] = $this->Admin_model->get_user_info();
		$this->load->view('Admin/header',$data);
		$this->load->view('Admin/admin');
		$this->load->view('Admin/footer');
	}
	
	function pass(){
		$data['update_error'] = "";
		$this->load->view('Admin/header',$data);
		$this->load->view('Admin/password');
		$this->load->view('Admin/footer');
	}
	
	function updateinfo(){
		$username = $this->input->post('username');
		$location = $this->input->post('location');
		$email = $this->input->post('email');
		$info = array('username'=>$username,'location'=>$location,'email'=>$email);
		if($this->Admin_model->update_user_info($info)){
			$data['tips'] = "修改成功!";
		}else{
			$data['tips'] = "未做修改!";
		}
		$data['route'] = site_url('Admin/show');
		$this->load->view('tips',$data);	
	}
	function addplan(){
		$planname = $this->input->post('planname');
		$usedtime = $this->input->post('usedtime');
		$finished = $this->input->post('finished'); 
		$info = array('planname'=>$planname,'usedtime'=>$usedtime,'finished'=>$finished);
		if($this->Admin_model->add_user_plan($info)){
			$data['tips'] = "添加成功!";
		}else{
			$data['tips'] = "添加失败!";
		}
		$data['route'] = site_url('Admin/show');
		$this->load->view('tips',$data);
	}
	
	function changeplan(){
		$pid = $this->uri->segment(3);
		$planname = $this->input->post('planname');
		$usedtime = $this->input->post('usedtime');
		$finished = $this->input->post('finished');
		$info = array('planname'=>$planname,'usedtime'=>$usedtime,'finished'=>$finished);
		if($this->Admin_model->update_user_plan($pid,$info)){
			$data['tips'] = "修改成功!";
		}else{
			$data['tips'] = "未做修改!";
		}
		$data['route'] = site_url('Admin/show');
		$this->load->view('tips',$data);
	}
	
	function delplan(){
		$pid = $this->uri->segment(3);
		if($this->Admin_model->del_user_plan($pid)){
			$data['tips'] = "删除成功!";
		}else{
			$data['tips'] = "删除失败!";
		}
		$data['route'] = site_url('Admin/show');
		$this->load->view('tips',$data);
	}
	
	function updatepass(){
		$data['update_error'] = '';
		$this->form_validation->set_rules('username','管理员名','required',array('required'=>'用户名不能为空'));
		$this->form_validation->set_rules('prepass','原密码','required',array('required'=>'原密码不能为空'));
		$this->form_validation->set_rules('newpass','新密码','required',array('required'=>'新密码不能为空'));
		$this->form_validation->set_rules('conpass','确认密码','required|matches[newpass]',array('required'=>'确认密码不能为空'));
		if($this->form_validation->run()) {
			$username = $this->input->post("username");
			$prepass = $this->input->post("prepass");
			$newpass = $this->input->post("newpass");
			if($user = $this->Admin_model->get_username($username)){
				if($this->Admin_model->check_password($user['password'],$prepass)){
					if($this->Admin_model->update_password($user['uid'],$newpass)){
						echo "<script type = 'text/javascript'>alert('修改成功!');</script>";
					}else{
						echo "<script type = 'text/javascript'>alert('修改失败!');</script>";
					}
				}else{
					$data['update_error'] = "无效的用户名或密码!";
				}
			}else{
				$data['update_error'] = "无效的用户名或密码!";
			}
		}
		$this->load->view("Admin/header",$data);
		$this->load->view("Admin/password");
		$this->load->view("Admin/footer");
	}
	
}
?>