<?php
class Admin_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	function get_user_info(){
		$table = "user";
		$userinfo = $this->session->userdata('user');
		$username = $userinfo['username'];
		$query = $this->db->get_where($table,array('username'=>$username));
		$result = $query->row_array();
		return $result;
	}
	function get_plan_info(){
		$table = "plan";
		$query = $this->db->get($table);
		$result = $query->result_array();
		return $result;
	}
	function update_user_info($user){
		$table = "user";
		$userinfo = $this->session->userdata('user');
		$username = $userinfo['username'];
		$this->db->where('username',$username);
		$this->db->update($table, $user);
		return $this->db->affected_rows();
	}
	function add_user_plan($plan){
		$table = "plan";
		$this->db->insert($table, $plan);
		return $this->db->affected_rows();
	}
	
	function update_user_plan($pid,$plan){
		$table = "plan";
		$this->db->where("id",$pid);
		$this->db->update($table,$plan);
		return $this->db->affected_rows();
	}
	
	function del_user_plan($aid){
		$table = "plan";
		$this->db->delete($table, array('id' => $aid));
		return $this->db->affected_rows();
	}
	
	function get_username($user){
		$table = "user";
		$query = $this->db->get_where($table,array("username"=>$user));
		$result = $query->row_array();
		return $result;
	}
	
	function check_password($password,$userpass){
		if($password == md5($userpass)){
			return true;
		}else{
			return false;
		}
	}
	
	function update_password($uid,$password){
		$table = "user";
		$newpass = md5($password); 
		$info = array("password"=>$newpass);
		$this->db->where("uid",$uid);
		$this->db->update($table,$info);
		return $this->db->affected_rows();
	}
}

?>