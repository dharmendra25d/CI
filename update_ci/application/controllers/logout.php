<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {

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
				if($this->session->userdata('logged_in')) {
				session_destroy();
            redirect(base_url().'signup');
			$this->session->unset_userdata('logged_in');
			}
			else {
			session_destroy();
           redirect(base_url().'fblogin');
			 redirect(base_url().'signup');
			}
	}
	
	
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */