<?php
class Home_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	function getuserinfo(){
		$table = "user";
		$query = $this->db->get_where($table,array('uid'=>1));
		$result = $query->row_array();
		return $result;
	}
	
	function getcategory(){
		$table = "category";
		$query = $this->db->get($table);
		$result = $query->result_array();
		return $result;
	}
	
	function getorderart(){
		$table = "article";
		$this->db->order_by('viewnum','DESC');
		$this->db->limit(5);
		$query = $this->db->get($table);
		$result = $query->result_array();
		return $result;
	}
	
	function getarticle($perPage,$offset,$cid = 0){
		$table = "article";
		if($cid == 0){
			$query = $this->db->get($table,$perPage,$offset);
			$result = $query->result_array();
			return $result;
		}else{
			$query = $this->db->get_where($table,array("cid"=>$cid),$perPage,$offset);
			$result = $query->result_array();
			return $result;
		}		
	}
	
	function getcontent($aid){
		$table = "article";
		$query = $this->db->get_where($table,array('id'=>$aid));
		$result = $query->row_array();
		return $result;
	}
}
?>