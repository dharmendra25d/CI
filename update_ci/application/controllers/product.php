<?php
class Product extends CI_Controller {

public function index() {
$this->load->model('product_m');

$brand="";
$result=$this->product_m->all();
$data=array();
$data['result']=$result;
$data['val']='"myname"';
$this->load->view('product_view',$data);
}

}