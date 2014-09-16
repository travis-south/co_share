<?php
class contact_model extends CI_Model{
	
	function __construct() {
		parent::__construct();
	}
	
	function insert(){
		$data = array(
			'name' 		=> $this->input->post('name'),
			'email'		=> strtolower($this->input->post('email')),
			'text'		=> $this->input->post('text')
        );
            
		$this->db->insert('messages', $data);

	}
	
	function count() {
		return $this->db->count_all_results('messages');

	}
	
	function get_3() {
		return $this->db->get('messages',3)->result_array();
	}
	
	function all() {
		return $this->db->get('messages')->result_array();
	}
	
	function get($id) {
		return $this->db->query("select * from messages where id=$id")->result_array();
	}
	
	function delete($id) {
		$this->db->delete('messages', array('id' => $id)); 
	}
}
