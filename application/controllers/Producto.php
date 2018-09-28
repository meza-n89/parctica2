<?php
class Producto extends CI_Controller{
    public function index()
    {
        $this->load->helper('url');
		$this->load->view('productoView');
    }
    public function llenar_tabla(){
    	$this->load->model('Producto_model','PoM',true);
    	echo json_encode($this->PoM->tabla());
    }
    
    public function validate_total(){
    	$this->load->model('Producto_model','PoM',true);
    	$totalpro=$this->input->get('cantidad');
    	$producto=$this->input->get('id');
    	$query=$this->PoM->validate_venta($totalpro,$producto);
    	echo $query;

    }
    
    
    
    
    
    
}

?>

