<?php class Product_m extends CI_Model {

public function all() {
$query=$this->db->query("SELECT * from product ");
$result= $query->result();
return $result;
}

public function get_all($brand) {
$query=$this->db->query("SELECT * from product where brand_name='$brand'");
$result= $query->result();
return $result;
}

}