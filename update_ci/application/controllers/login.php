<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 
	 public function __construct() {
		parent::__construct();
		
	
		}
	public function index()
	{
		//$this->load->view('news');
		       
		 $this->load->model('signup_m');
		if($this->input->post('login')) {
		 $password=$this->input->post('pass');
		 $email = $this->input->post('cemail');
        $result = $this->signup_m->login($email, $password);
         if($result) {
             $sess_array = array();
             foreach($result as $row) {
                 $sess_array = array('id' => $row->id,
                     'first_name' => $row->first_name);
					 $this->load->library('session');
                 $this->session->set_userdata('logged_in', $sess_array);
                 }
				 $this->load->view('wel_view', $sess_array);
            }
				else {
				$msg=array();
				$msg['msg']="Invalid username or passsword";
				$this->load->signup->index();
				}
		
		}
		else {
		$this->load->view('signup_view');
		}
	}
	
	
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */