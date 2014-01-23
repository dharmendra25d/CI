<?php
Class Bytes  extends CI_Controller {

public function index() {
	if($this->input->post('calculate')){
	$crush= $this->input->post('crush');
	$email= $this->input->post('email');
	$this->load->library('email');

	$this->email->from('dharmendra25d@gmail.com', 'Love Bytes');
	$this->email->to($email); 
	$this->email->cc(''); 
	$this->email->bcc(''); 

	$this->email->subject('Email Test');
	$this->email->message($crush);	

	$this->email->send();
    $data=array();
	$data['msg']= $this->email->print_debugger();
	$this->load->view('bytes',$data);	
	
	}
		else {
		$this->load->view('bytes');
		}
	}

}