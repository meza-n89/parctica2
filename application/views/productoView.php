
<html>
<head>
<title>Control de Productos</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="<?php echo base_url();?>/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>/css/uniform.css" />
<link rel="stylesheet" href="<?php echo base_url();?>/css/select2.css" />
<link rel="stylesheet" href="<?php echo base_url();?>/css/matrix-style.css" />
<link rel="stylesheet" href="<?php echo base_url();?>/css/matrix-media.css" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>

<!--Header-part-->

        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Data table</h5>
          </div>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
           Nuevo Producto
          </button>



          <div class="widget-content nopadding">
            <table id="example" class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Nombre Producto</th>
                  <th>Tipo de producto</th>
                  <th>descripcion producto</th>
                  <th>Proveedor</th>
                  <th>Estado del producto</th>
                  <th>Existencias</th>
                  <th>stock</th>
                  <th>caducidad</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3>Nuevo producto</h3>
        <form id="productos" action="" method="post">
        <input type="text"  class="form-control" name="producto" placeholder="producto">
        <select name="tipo_prod" id="tipo_prod" class="form-control">
          
        </select>
        <input type="textarea" name="descripcion" placeholder="descripcion" class="form-control">
        <select name="Proveedor_prod" id="proveedor" class="form-control">
          
        </select>
        <input class="form-control" type="text" name="stock" placeholder="stock minimo">
        <input class="form-control" type="text" name="existencias" placeholder="existencias producto">
        <select name="estado_producto" class="form-control">
          <option value="1">activo</option>
          <option value="0">inactivo</option>
        </select>
        <input class="form-control" type="date" name="fecha_cad" placeholder="fecha de caducidad">
        <input class="form-control" type="text" name="precio_u" placeholder="precio unitario">
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="insertar_producto()">Guardar</button>
      </div>
    </div>
  </div>
</div>


<!--Footer-part-->
>
<!--end-Footer-part-->
<script src="<?php echo base_url();?>/js/jquery.min.js"></script> 
<script src="<?php echo base_url();?>/js/bootstrap.min.js"></script> 
<script src="<?php echo base_url();?>/js/jquery.uniform.js"></script> 
<script src="<?php echo base_url();?>/js/select2.min.js"></script> 


<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
</body>
</html>
<script type="text/javascript">
  $(document).ready(function() {
    llenartipo();
    llenar_proveedor();
    insertar_producto();
    var tabla=$('#example').DataTable( {
        "ajax": {
            "url": "<?php echo site_url();?>/Producto/llenar_tabla",
            "dataSrc": ""
        },
        "columns": [
            { "data": "nombre_producto" },
            { "data": "nombre_tipo" },
            { "data": "descripcion_producto" },
            { "data": "nombre_proveedor" },
            { "data": "estado_producto" },
            { "data": "existencias_producto" },
            { "data": "stock_minimo_producto" },
            { "data": "fecha_caducidad_producto" }
        ],
         dom: 'Bfrtip',
        buttons: [
              'excelHtml5',
              {
                extend: 'pdfHtml5',
                  download: 'open',

              }
              
          ]
    } );

tabla.ajax.url("<?php echo site_url();?>/Producto/llenar_tabla").load();

} );

function llenartipo(){
    $.ajax({
      type:"post",
      url:"<?php echo site_url();?>/Producto/select_tipo_prod",
      success:function(data){
        $('#tipo_prod').html('');
        $('#tipo_prod').html(data);
      }
  });
}

function llenar_proveedor()
{
  $.ajax({
    type:"post",
    url:"<?php echo site_url();?>/Producto/select_proveedor",
    success:function(data){
      $('#proveedor').html('');
      $('#proveedor').html(data);
    }
  });
}

function insertar_producto()
{
  $.ajax({
    type:"post",
    url:"<?php echo site_url();?>/Producto/insert_prod",
    data:$('#productos').serialize(),
    success:function(data){
      if(!data)
      {
        console.log("error al insertar datos");
      }else{
        alert("datos insertados correctamente");
        //location.reload();
      }
    }
  });
}

</script>