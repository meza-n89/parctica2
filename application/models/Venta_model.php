<?php 
class Venta_model extends CI_model{


public function registro_venta(){

	
}
public function get_clientes(){
	$this->load->database();
	$query=$this->db->get('tab_cliente');
	return $query->result_array();
}

public function get_productos(){
	$this->load->database();
	$query=$this->db->get('tab_producto');
	return $query->result_array();
}

public function validate_producto($id){
	$this->load->database();
	$this->db->where('id_producto',$id);
	//$this->db->where('exitencias_producto',$cantidad);
	$query= $this->db->get('tab_producto');
	if($query->num_rows()>0){
		return $query->row()->existencias_producto;}
		else{
			return 0;
		}
	}


public function get_total($id){
	$this->load->database();
	$this->db->where('id_producto',$id);

	$query= $this->db->get('tab_producto');
	if($query->num_rows()>0){
		return $query->row()->precio_unitario_producto;
	}
	else{
			return 0;
		}
}

public function insert_venta($cliente,$fecha,$total,$totalp,$producto){
	$this->load->database();
	$this->db->trans_begin();
		$datos = array(	
						'id_cliente'=>$cliente,
						'fecha_venta' =>$fecha ,
						'total_productos_venta'=>$totalp,
						'total_venta'=>$total
						 );
		 $this->db->insert('tab_venta',$datos);

		 $gaver2=$this->db->insert_id();

		 for($i=0;$i<$totalp;$i++){
		 	$this->db->query('insert into tab_prodventa (id_producto,id_venta) VALUES ('.$producto.','.$gaver2.')');
		}
		//$this->db->query("UPDATE tab_producto SET existencias_producto=(existencias_producto-".$totalp.") WHERE id_producto=".$producto);
		if($this->db->trans_status()===FALSE){
			$this->db->trans_rollback();
			return 0;
		}else{
			$this->db->trans_commit();
			return 1;
		}
}



}





?>