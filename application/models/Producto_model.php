<?php 
class Producto_model extends CI_model
{
function __construct()
{
	$this->load->database();
}


public function tabla(){
	$info=$this->db->query("call tablainventario()"); 
	return $info->result();
}
public function validate_venta($totalpro,$producto){
		$val_total=$this->db->query("call val_total(".$totalpro.",".$producto.")"); 
		return $val_total->row()->resultado;

}
}

?>