<?php
class Login_model extends CI_Model{
	var $table = 'users';
	var $max_idle_time = 3600;
	
	function __construct(){
		parent::__construct();
		$this->load->helper('captcha');
	}
	
	function is_logged_in(){
		
		$last_activity = $this->session->userdata('last_activity');
		$logged_in = $this->session->userdata('logged_in');
		$user = $this->session->userdata('user');
		
		if(($logged_in == 'yes') && ((time() - $last_activity) < $this->max_idle_time )){
			$this->allow_pass( $user );
			return true;
		}else{
			$this->remove_pass();
			return false;
		}
	}
	
	function allow_pass($user_data){
		$this->session->set_userdata(array('last_activity' => time(),'logged_in' => 'yes', 'user' => $user_data ));
	}
	
	function remove_pass(){
		$array_items = array('last_activity' => '', 'logged_in' => '', 'user' => '');
		$this->session->unset_userdata($array_items);
	}
	
	function get_checkword(){
		$table = "picture";
		$vals = array(
			'word'      => rand(1000,10000),
			'img_path'  => './captcha/',
			'img_url'   => 'http://localhost/captcha/',
			'font_path' => './path/to/fonts/texb.ttf',
			'img_width' => '150',
			'img_height'    => 30,
			'expiration'    => 1000,
			'word_length'   => 8,
			'font_size' => 16,
			'img_id'    => 'Imageid',
			'pool'      => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
			'colors'    => array(
				'background' => array(255, 255, 255),
				'border' => array(96, 96, 96),
				'text' => array(0, 0, 0),
				'grid' => array(255, 10, 10)
				)
			);
			
        $cap = create_captcha($vals);
		$data = array(
			'captcha_time'  => $cap['time'],
			'ip_address'    => $this->input->ip_address(),
			'word'      => $cap['word']
		);
        $query = $this->db->insert($table,$data);
		$expiration = time() - 1000; 
		$this->db->where('captcha_time < ', $expiration)->delete('picture');
        return $cap['image'];
	}
	
	function check_num($word,$ip_address,$captcha_time){
		$sql = 'SELECT COUNT(*) AS count FROM picture WHERE word = ? AND ip_address = ? AND captcha_time > ?';
		$binds = array($word,$ip_address,$captcha_time);
		$query = $this->db->query($sql, $binds);
		$row = $query->row();
		if ($row->count == 0){
			return false;
		}
		else{
			return true;
		}
	}
	
	function get_by_username($username) {
		$table = "user";
		$query = $this->db->get_where($table, array('username' => $username), 1);
		if( $query->num_rows() > 0 ) return $query->row_array();
		return false;
	}
	
	function check_password($password,$hashed_password) {
		if($hashed_password == md5($password)) return true;
		return false;
	}
	
}
?>