<?php

class Ajax extends CI_Controller  {

 function __construct(){
        parent::__construct();
        $this->load->helper('url');
    }
  public function username_taken()
  {
    $this->load->model('signup_m','',TRUE);
    $username = $this->input->post('username');
   if ($this->signup_m->user_availibilty($username)) {
     echo '1';
    }
	
  }
  
  public function product() {
   $this->load->model('product_m','',TRUE);
    $brand = $this->input->post('type1');
 	//$brand="nike";
   if(empty($brand)) : return false; 
    else :
    $result=$this->product_m->get_all($brand);
    $data=array();
	$data['title'] = $brand;
	$data['list']=$result;
	$this->load->view('sample_table',$data);
    endif;
  }

}

/* End of file ajax.php */
/* Location: ./system/application/controllers/ajax.php */