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
    
    public function select_tipo_prod()
    {
        $this->load->model('Producto_model','PoM',true);
        $dato=$this->PoM->tipo_producto();
        foreach ($dato as $row) {
            echo '<option value="'.$row["id_tipo"].'">'.$row["nombre_tipo"].'</option>';
        }
    }
    
    public function select_proveedor()
    {
        $this->load->model('Producto_model','PoM',true);
        $datos=$this->PoM->proveedor();
        echo "<option value='-1'>Elija proveedor</option>";
        foreach ($datos as $row) {
            echo '<option value="'.$row["id_proveedor"].'">'.$row["nombre_proveedor"].'</option>';
        }
        
    }

    public function insert_prod()
    {
        $this->load->model('Producto_model','PoM',true);
        $dato=$this->PoM->insert_prod(
            $this->input->post('producto'),
            $this->input->post('tipo_prod'),
            $this->input->post('descripcion'),
            $this->input->post('Proveedor_prod'),
            $this->input->post('stock'),
            $this->input->post('existencias'),
            $this->input->post('estado_producto'),
            $this->input->post('fecha_cad'),
            $this->input->post('precio_u')
        );
    }
}

?>

