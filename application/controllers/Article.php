<?php
class Article extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model(array('Login_model','Article_model'));
		if(!$this->Login_model->is_logged_in()){
			redirect('Login/index');
		}
	}
	function index(){	
		$this->load->library('pagination');                                              
		$perPage = 8;
		$config['base_url'] = site_url('Article/index');
		$config['total_rows'] = $this->db->count_all_results('article');
		$config['per_page'] = $perPage;
		$config['uri_segment'] = 3;
		$config['first_link'] = '首页';
		$config['last_link'] = '尾页';
		$config['prev_link'] = '上一页';
		$config['next_link'] = '下一页';
		$config['first_tag_open'] = '<span class="btn btn-danger" role = "button">';
		$config['first_tag_close'] = '</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		$config['last_tag_open'] = '<span class="btn btn-danger" role = "button">';
		$config['last_tag_close'] = '</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		$config['num_tag_open'] = '<span class="btn btn-default" role = "button">';
		$config['num_tag_close'] = '</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		$config['cur_tag_open'] = '<span class="btn btn-default" role = "button">';
		$config['cur_tag_close'] = '</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		$config['prev_tag_open'] = '<span class="btn btn-danger" role = "button">';
		$config['prev_tag_close'] = '</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		$config['next_tag_open'] = '<span class="btn btn-danger" role = "button">';
		$config['next_tag_close'] = '</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
	
		$this->pagination->initialize($config);
		$data['links'] = $this->pagination->create_links();

		$offset = $this->uri->segment(3);
		$article = $this->Article_model->get_article($perPage, $offset);
		$category = $this->Article_model->get_category();
		foreach($article as &$val){
			foreach($category as $var){
				if($val['cid'] == $var['cid']){
					$val['cid'] = $var['catename'];
				}
			}
		}
		$data['article'] = $article;
		$this->load->view('Admin/header',$data);
		$this->load->view('Admin/article');
		$this->load->view('Admin/footer');
	}
	function addarticle(){
		$data['category'] = $this->Article_model->get_category();
		$this->load->view('Admin/header',$data);
		$this->load->view('Admin/write');
		$this->load->view('Admin/footer');
	}
	function insertart(){
		$category = $this->input->post('category');
		$title = $this->input->post('title');
		$author = $this->input->post('author');
		$description = $this->input->post('description');
		$content = $this->input->post('content');
		$createtime = time();
		$info = array("cid"=>$category,"title"=>$title,"author"=>$author,"description"=>$description,"content"=>$content,"createtime"=>$createtime);
		if($this->Article_model->insert_article($info) && $this->Article_model->update_cate($category,1)){
			$data['tips'] = "发表成功!";
		}else{
			$data['tips'] = "发表失败!";
		}
		$data['route'] = site_url('Article/index');
		$this->load->view('tips',$data);
	}
	function editart(){
		$aid = $this->uri->segment(3);
		$data['category'] = $this->Article_model->get_category();
		$data['article'] = $this->Article_model->get_art_info($aid);
		$this->load->view('Admin/header',$data);
		$this->load->view('Admin/edit');
		$this->load->view('Admin/footer');
	}
	function updateart(){
		$aid = $this->uri->segment(3);
		$category = $this->input->post('category');
		$title = $this->input->post('title');
		$author = $this->input->post('author');
		$description = $this->input->post('description');
		$content = $this->input->post('content');
		$createtime = time();
		$result = $this->Article_model->get_art_info($aid);
		if($category != $result['cid']){
			$res1 = $this->Article_model->update_cate($category,1);
			$res2 = $this->Article_model->update_cate($result['cid'],0);
		}
		$info = array("cid"=>$category,"title"=>$title,"author"=>$author,"description"=>$description,"content"=>$content,"createtime"=>$createtime);
		if($this->Article_model->update_art($aid,$info)){
			$data['tips'] = "修改成功!";
		}else{
			$data['tips'] = "修改失败!";
		}
		$data['route'] = site_url('Article/index');
		$this->load->view('tips',$data);	
	}
	function delarticle(){
		$aid = $this->uri->segment(3);
		$cid = $this->Article_model->get_artcid($aid);
		if($this->Article_model->del_article($aid) && $this->Article_model->update_cate($cid,0)){
			$data['tips'] = "删除成功!";
		}else{
			$data['tips'] = "删除失败!";
		}
		$data['route'] = site_url('Article/index');
		$this->load->view('tips',$data);
	}
}

?>