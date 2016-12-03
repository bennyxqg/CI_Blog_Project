<?php
class Category extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model(array('Login_model','Category_model'));
		if(!$this->Login_model->is_logged_in()){
			redirect('Login/index');
		}
	}
	function index(){
		$data['info'] = $this->Category_model->get_category();
		$this->load->view('Admin/header',$data);
		$this->load->view('Admin/category');
		$this->load->view('Admin/footer');
	}
	function addcate(){
		$category = $this->input->post('category');
		$datetime = $this->input->post('datetime');
		$info = array("catename"=>$category,"createtime"=>$datetime);
		if($this->Category_model->add_category($info)){
			$data['tips'] = "添加成功!";
		}else{
			$data['tips'] = "添加失败!";
		}
		$data['route'] = site_url("Category/index");
		$this->load->view("tips",$data);
	}
	function changecate(){
		$cid = $this->uri->segment(3);
		$category = $this->input->post('category');
		$datetime = $this->input->post('datetime');
		$info = array("catename"=>$category,"createtime"=>$datetime);
		if($this->Category_model->update_category($cid,$info)){
			$data['tips'] = "修改成功!";
		}else{
			$data['tips'] = "修改失败!";
		}
		$data['route'] = site_url("Category/index");
		$this->load->view('tips',$data);
	}
	function delcate(){
		$cid = $this->uri->segment(3);
		if($this->Category_model->del_category($cid)){
			$data['tips'] = "删除成功!";
		}else{
			$data['tips'] = "删除失败!";
		}
		$data['route'] = site_url("Category/index");
		$this->load->view("tips",$data);
	}
}

?>