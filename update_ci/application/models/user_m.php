<?php
class User_m extends CI_Model {
	
public function data_insert($data) {
	
	$this->db->insert('user', $data); 
}
	
}