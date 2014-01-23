<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends CI_Controller {

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
		parse_str($_SERVER['QUERY_STRING'],$_REQUEST);
		$this->load->library('Facebook', array("appId"=>"537492446329202", "secret"=>"311b6ecccd99669ec22905c50b342f97"));
		$this->user = $this->facebook->getUser();
	
		}
	public function index()
	{       
		//$this->load->view('news');
		
		       ob_start();
			   if($this->user || $this->session->userdata('logged_in')) { 
			   $user_profile['logout'] = $this->facebook->getLogouturl(array("next"=>base_url()."signup/logout"));

			   	redirect(base_url().'welcome');

			   }
		        $this->load->model('signup_m');
				if($this->input->post('sign_up')) {
				$data=array();
				
				$data['first_name']=$this->input->post('first_name');
				$data['last_name']=$this->input->post('last_name');
				$data['password']=md5($this->input->post('pass'));
				$data['email']=$this->input->post('email');
				$msg=array();
				$msg['msg']='You have successfully registered';
				$cpass=$this->input->post('cpass');
				$this->load->helper(array('form', 'url'));
				$this->load->library('form_validation');
				$this->form_validation->set_rules('pass', 'Password', 'trim|required|matches[cpass]|md5');
				$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
				$this->form_validation->set_rules('last_name', 'Last name', 'trim');
				$this->form_validation->set_rules('email', 'Email', 'callback_email_check');
					if ($this->form_validation->run() == FALSE)
					{
						$this->load->view('signup_view');
					}
						else
						{
							$this->signup_m->user_insert($data);
							$this->load->view('signup_view',$msg);
						}
				}
				

	      if($this->user) {
			try{
			  $user_profile = $this->facebook->api('/me');
			    $data=array();
				$data['first_name']=$user_profile['first_name'];
				$data['last_name']=$user_profile['last_name'];
				$pass=random_string('alpha', 5);
				$data['password']=md5($pass);
				$data['email']=$user_profile['email'];  
				$result=$this->signup_m->user_availibilty($data['email']) ;
				print_r($result);
				if(!$result) {
				$this->signup_m->user_insert($data);
				$this->email->from('dharma@cgcolors.com', 'Cgcolors');
				$this->email->to($data['email']); 
				$this->email->subject('Thank you for registration');
				$this->email->message('You have succesfully registered. Your password is'.$pass.' You can change it manually');	
               
				$this->email->send();
				}
				//redirect(base_url().'welcome', $user_profile);
			// echo $user_profile['email'];
			
			}catch(FacebookApiException $e){
			//print_r($e);
			$user = null;
			}
			}
			if($this->user){
			$logout = $this->facebook->getLogouturl(array("next"=>base_url()."signup/logout"));
			echo "<a href='$logout'>Logout</a>";
			}
			else
			{
			$data['url'] = $login = $this->facebook->getLoginUrl(array("scope"=>"email"));
			$this->load->view('signup_view', $data);
			}					
		
				}
		
	public function email_check($str)
	{    
	    $result=$this->signup_m->user_availibilty($str) ;
		if ($result)
		{
			$this->form_validation->set_message('email_check', '%s Already exist');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
  public function logout() {
	  //$this->session->sess_destroy();  // Assuming you have session helper loaded
	  if($this->user) {
	  session_destroy();
	  }
	  else {
      $this->session->unset_userdata('logged_in'); 
      }	  
	  redirect(base_url().'signup');
	

}
	
	
	

	

}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */