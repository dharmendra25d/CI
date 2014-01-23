<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

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
		$this->load->model('user_m');
		if($this->input->post('submit')) {
		$this->get_link();
		}
		else  {
		$this->home();
		}
	
		}
	public function index()
	{
		//$this->load->view('news');
	}
	public function get_link() {
	$email= $this->input->post('email');
	$data=array();
	$data['email']=$email;
	$data['link']="";
	$this->load->helper('string');
	$data['code']= random_string('unique',4);;
	$this->user_m->data_insert($data);
	$this->load->view('news',$data);
	}
	public function home() {
	$this->load->view('news');
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */