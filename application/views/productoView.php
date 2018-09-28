
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
</head>
<body>

<!--Header-part-->

        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Data table</h5>
          </div>
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
    $('#example').DataTable( {
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
} );


</script>