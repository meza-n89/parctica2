<?php 
class Venta extends CI_controller{
public function index(){
	$this->load->helper('url');
	$this->load->view('frmventa');
}
public function mostrar_select(){
	$this->load->model('Venta_model','VM',true);
	$query=$this->VM->get_clientes();
	foreach ($query as $value) {
		echo '<option value="'.$value["id_cliente"].'">'.$value["nombre_cliente"].'</option>';
	}
}
public function mostrar_prod(){
	$this->load->model('Venta_model','VM',true);
	$query=$this->VM->get_productos();
	echo '<option value="-1">Escoja un producto</option>';
	foreach ($query as $value) {
		echo '<option value="'.$value["id_producto"].'">'.$value["nombre_producto"].'</option>';
	}
}




public function validar_cantidad(){
	$this->load->model('Venta_model','VM',true);
	$cantidad=$this->input->get('cantidad');
	$id=$this->input->get('id');
	$query=$this->VM->validate_producto($id);
	if($query<$cantidad){
		echo 0;
	}else{
		echo 1;
	}

}

public function mostrar_precio(){
    $this->load->model('Venta_model','VM',true);
    //$producto= $this->input->get('producto');
    $id=$this->input->post('id');
    $precio=$this->VM->get_total($id);

  echo $precio;
 }

public function insert_v(){
		$this->load->helper('url');
		$this->load->model('Venta_model','VM',true);
		echo $this->VM->insert_venta(
		$this->input->post('cliente'),
		$this->input->post('fecha'),
		$this->input->post('total'),
		$this->input->post('cantidad'),
		$this->input->post('producto')
		);
		

	}
}



?>