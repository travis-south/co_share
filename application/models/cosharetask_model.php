<?php
class cosharetask_model extends CI_Model{
	
	function __construct() {
		parent::__construct();
	}
	
	function insert(){
		if ($this->ion_auth->logged_in()) {
			$data = array(
				'owner'	=> $this->ion_auth->user()->row()->id,
				'text' 		=> $this->input->post('task'),
				'private'		=> $this->input->post('private')=='on' ? TRUE : FALSE
			);
				
			$this->db->insert('tasks', $data);
		}
	}
	
	function get_10() {
		$this->db->select('t.*,u.username,u.email');
		$this->db->from('tasks t');
		$this->db->where('t.private','0');
		$this->db->join('users u', 'u.id = t.owner');
		$this->db->limit(10);

		return $this->db->get()->result_array();
	}
	
	function delete($id) {
		$this->db->delete('tasks', array('id' => $id)); 
	}
	
	function search($niddle) {
		$niddle = str_replace("'","\\'",$niddle);
		return $this->db->query("select tasks.*,users.* from tasks left join users on users.id = tasks.id where text like '%$niddle%' or last_name like '%$niddle%' or first_name like '%$niddle%' and private=0")->result_array();
	}
	
	function update($id,$completed) {
		$this->db->where('id', $id);
		$this->db->update('tasks', array('completed' => $completed));
		
	}
	
	function get_my_tasks() {
		return $this->db->get_where('tasks', array('owner' => $this->ion_auth->user()->row()->id))->result_array();
	}
}
