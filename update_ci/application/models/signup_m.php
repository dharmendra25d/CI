<?php
class Signup_m extends CI_Model {
	
public function user_insert($data) {
	
	$this->db->insert('sign_up', $data); 
}

 function login($email, $password) {
        $this->db->select('id,first_name,email, password');
        $this->db->from('sign_up');
        $this->db->where('email', $email);
        $this->db->where('password', MD5($password));
        $this->db->limit(1);
         
        $query = $this->db->get();
        if($query->num_rows() == 1) { 
            return $query->result(); 
			
        } 
		
}
function user_availibilty($email) {
        $this->db->select('email');
        $this->db->from('sign_up');
        $this->db->where('email', $email);
        $this->db->limit(1);
         
        $query = $this->db->get();
        if($query->num_rows() == 1) { 
            return true;
        }
		else {
		return false;
		}		
      
	
}



}