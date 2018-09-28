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

public function tipo_producto()
{
  $sql=$this->db->get('tab_tipo_producto');
  return $sql->result_array();
}

public function proveedor()
{
$query=$this->db->get('tab_proveedor');
return $query->result_array();
}

public function insert_prod($nombre,$tipo_prod,$descripcion,$proveedor,$stock,$existencias,$estado,$fecha,$precio)
{
	$datos = array('nombre_producto'=>$nombre,
                   'id_tipo_producto'=>$tipo_prod,
                   'descripcion_producto'=>$descripcion,
                   'id_proveedor_producto'=>$proveedor,
                   'stock_minimo_producto'=>$stock,
                   'existencias_producto'=>$existencias,
                   'estado_producto'=>$estado,
                   'fecha_caducidad_producto'=>$fecha,
                   'precio_unitario_producto'=>$precio);

	$sql=$this->db->insert('tab_producto',$datos);

}


}

?>