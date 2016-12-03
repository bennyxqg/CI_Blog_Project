<?php
class Home extends CI_Controller{
	
	var $template = '
	{table_open}<table border="1" cellpadding="0" cellspacing="0" style="width:160px;height:180px;">{/table_open}

    {heading_row_start}<tr>{/heading_row_start}

    {heading_previous_cell}<th><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
    {heading_title_cell}<th colspan="{colspan}"><center>{heading}</center></th>{/heading_title_cell}
    {heading_next_cell}<th><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}

    {heading_row_end}</tr>{/heading_row_end}

    {week_row_start}<tr>{/week_row_start}
    {week_day_cell}<td><center>{week_day}<center></td>{/week_day_cell}
    {week_row_end}</tr>{/week_row_end}

    {cal_row_start}<tr>{/cal_row_start}
    {cal_cell_start}<td>{/cal_cell_start}
    {cal_cell_start_today}<td>{/cal_cell_start_today}
    {cal_cell_start_other}<td class="other-month">{/cal_cell_start_other}

    {cal_cell_content}<a href="{content}"><center>{day}</center></a>{/cal_cell_content}
    {cal_cell_content_today}<div class="highlight"><a href="{content}">{day}</a></div>{/cal_cell_content_today}

	{cal_cell_no_content}{day}{/cal_cell_no_content}
    {cal_cell_no_content_today}<div class="highlight">{day}</div>{/cal_cell_no_content_today}

    {cal_cell_blank}&nbsp;{/cal_cell_blank}

    {cal_cell_other}{day}{/cal_cel_other}

    {cal_cell_end}</td>{/cal_cell_end}
    {cal_cell_end_today}</td>{/cal_cell_end_today}
    {cal_cell_end_other}</td>{/cal_cell_end_other}
    {cal_row_end}</tr>{/cal_row_end}

    {table_close}</table>{/table_close}';
	
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Home_model');
	}
	
	function index(){
		$data['userinfo'] = $this->Home_model->getuserinfo(); 
		$prefs['template'] = $this->template;
		$this->load->library('calendar',$prefs);
		$data['calendar'] = $this->calendar->generate();
		$data['category'] = $this->Home_model->getcategory();                                       //获取栏目并显示 
		$data['order'] = $this->Home_model->getorderart();
		
		$this->load->library('pagination');                                                 //分页显示文章列表
		$perPage = 5;
		$config['base_url'] = site_url('Home/index');
		$config['total_rows'] = $this->db->count_all_results('article');
		$config['per_page'] = $perPage;
		$config['uri_segment'] = 3;
		$config['first_link'] = '首页';
		$config['last_link'] = '尾页';
		$config['prev_link'] = '<span class = "glyphicon glyphicon-chevron-left"></span>&nbsp;向前';
		$config['next_link'] = '向后&nbsp;<span class = "glyphicon glyphicon-chevron-right"></span>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>&nbsp;&nbsp;&nbsp;';
		$config['next_tag_open'] = '&nbsp;&nbsp;&nbsp;<li>';
		$config['next_tag_close'] = '</li>';
		
		$config['display_pages'] = FALSE;

		$this->pagination->initialize($config);
		$data['links'] = $this->pagination->create_links();

		$offset = $this->uri->segment(3);
		$data['article']=$this->Home_model->getarticle($perPage, $offset);
		
		$this->load->view('Home/header',$data);
		$this->load->view('Home/body');
		$this->load->view('Home/footer');
	}
	function block(){
		$data['userinfo'] = $this->Home_model->getuserinfo(); 
		$prefs['template'] = $this->template;
		$this->load->library('calendar',$prefs);
        $data['calendar'] = $this->calendar->generate();
		$data['category'] = $this->Home_model->getcategory();                                       //获取栏目并显示 
		$data['order'] = $this->Home_model->getorderart();
		
		$cid = $this->uri->segment(3);
		$this->db->where('cid',$cid);
		$total = $this->db->count_all_results('article');
		$this->load->library('pagination');                                                 //分页显示文章列表
		$perPage = 5;
		$url = 'Home/block/'."{$cid}";
		$config['base_url'] = site_url($url);
		$config['total_rows'] = $total;
		$config['per_page'] = $perPage;
		$config['uri_segment'] = 4;
		$config['first_link'] = '首页';
		$config['last_link'] = '尾页';
		$config['prev_link'] = '<span class = "glyphicon glyphicon-chevron-left"></span>&nbsp;向前';
		$config['next_link'] = '向后&nbsp;<span class = "glyphicon glyphicon-chevron-right"></span>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>&nbsp;&nbsp;&nbsp;';
		$config['next_tag_open'] = '&nbsp;&nbsp;&nbsp;<li>';
		$config['next_tag_close'] = '</li>';
		$config['display_pages'] = FALSE;
		$this->pagination->initialize($config);
		
		$data['links'] = $this->pagination->create_links();
		
		$offset = $this->uri->segment(4);
		$data['article']=$this->Home_model->getarticle($perPage, $offset,$cid);
		
		$this->load->view('Home/header',$data);
		$this->load->view('Home/body');
		$this->load->view('Home/footer');
	}
	function content(){
		$data['userinfo'] = $this->Home_model->getuserinfo(); 
		$prefs['template'] = $this->template;
		$this->load->library('calendar',$prefs);
        $data['calendar'] = $this->calendar->generate();
		$data['category'] = $this->Home_model->getcategory();                                       //获取栏目并显示
		$data['order'] = $this->Home_model->getorderart();
		
		$aid = $this->uri->segment(3);
		$data['content'] = $this->Home_model->getcontent($aid);
		
		$this->load->view('Home/header',$data);
		$this->load->view('Home/content');
		$this->load->view('Home/footer');
	}
	function viewnum(){
		$aid = $this->input->post('id');
		$table = "article";
		$query = $this->db->get_where($table,array("id"=>$aid));
		$result = $query->row_array();
		$data = $result['viewnum'] + 1;
		$this->db->where("id",$aid);
		$this->db->update($table,array("viewnum"=>$data));
	}
	
}

?>