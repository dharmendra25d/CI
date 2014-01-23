<?php
class Fblogin extends CI_Controller {
		public function __construct(){
		parent::__construct();
		parse_str($_SERVER['QUERY_STRING'],$_REQUEST);
		$this->load->library('Facebook', array("appId"=>"537492446329202", "secret"=>"311b6ecccd99669ec22905c50b342f97"));
		$this->user = $this->facebook->getUser();
		}
	public function index() {
		if($this->user) {
		try{
		$user_profile = $this->facebook->api('/me');
		echo $user_profile['email'];
		echo $this->user;
		echo "<pre>"; print_r($user_profile);
		}catch(FacebookApiException $e){
		print_r($e);
		$user = null;
		}
    }
if($this->user){
$logout = $this->facebook->getLogouturl(array("next"=>base_url()."fblogin/logout"));
echo "<a href='$logout'>Logout</a>";
}else
{
$data['url'] = $login = $this->facebook->getLoginUrl(array("scope"=>"email"));
$this->load->view('fblogin', $data);
}
}
public function logout() {
session_destroy();
redirect(base_url().'fblogin');
}
}
?>