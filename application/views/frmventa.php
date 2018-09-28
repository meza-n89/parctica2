<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<title>formulario</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url();?>/Producto">Modulo de inventario </a>
      </li>

  
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
  <div class="container">
	<form id="form" method="POST">
  <div class="form-group">
    <h1 for="exampleFormControlSelect1">Registro venta</h1>
    <label>Seleccionar cliente</label>
    <select name="cliente" class="form-control" id="cliente">
 
    </select>
  </div>

  <div class="form-group">

    <label for="exampleInputPassword1">Fecha de venta</label>
    <input type="date" name="fecha" class="form-control" id="fecha" placeholder="Fecha">
  </div>

  <div class="row">
<div class="col-md-6">
  <div class="form-group">
    <label>Producto</label>
        <select name="producto" class="form-control" id="producto" onchange="precioPro()">

    </select>
  </div>
</div>
<div class="col-md-6">
    <div class="form-group">
    <label>Precio u</label>
        <input type="text" name="precio" class="form-control" id="precio" placeholder="Precio :" >
  </div>
</div>
</div>

<div class="form-group">

    <label for="cantidad">cantidad</label>
    <input type="number" name="cantidad" class="form-control" id="cantidad" onblur="validar_cantidad(),totalpro()">
  </div>

<div class="form-group" >

    <label for="Total">Total</label>
    <input type="text" name="total" class="form-control" id="total" placeholder="total" disabled>
  </div>

  <div class="row">
    
      <div class="col-md-6">
        <input type="button" onclick="insert_venta()" class="btn btn-primary" id="Guardar" value="Guardar">
      </div>
      <div class="col-md-6">
        <input type="reset" class="btn btn-success" id="limpiar" value="Limpiar" >
      </div>
    <a href="<?php echo site_url();?>/Producto/">Inventario</a>
  </div>
</form>
</div>
<script
        src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>

<script>
$(document).ready(function(){
  llenar();
  llenarprod();
  precioPro();
});

function llenar(){
  $.ajax({
      type:"post",
      url:"<?php echo site_url();?>/Venta/mostrar_select",
      success:function(data){
        $('#cliente').html('');
        $('#cliente').html(data);
      }
  });
}

function llenarprod(){
    $.ajax({
      type:"post",
      url:"<?php echo site_url();?>/Venta/mostrar_prod",
      success:function(data){
        $('#producto').html('');
        $('#producto').html(data);
      }
  });
}


function validar_cantidad(){
  var idprod = $('#producto').val();
  var cantidad = $('#cantidad').val();

$.ajax({
  type:"get",
  url:"<?php echo site_url();?>/Producto/validate_total",
  data:'id='+idprod+'&cantidad='+cantidad,
  success: function(data)
  {
    if(data.trim()!='si'){
      alert('No se puede realizar compra el numero de productos excede el stock ');
      $('#cantidad').val('');
    }

  }



});


}
//var precio=$('#precio').val('hola');
function precioPro(){
  //var cantidad = $('#cantidad').val();
  var idprod = $('#producto').val();
  $.ajax({  
  type:"post",
  url:"<?php echo site_url();?>/Venta/mostrar_precio",
  data:'id='+idprod,
  success: function(data)
  {
    $('#precio').val(data);
    
  }
});

}

function totalpro(){
  var price=$('#precio').val();
  var cant=$('#cantidad').val();

  var ope=parseInt(price)*parseInt(cant);

  $('#total').val(ope);
}

function insert_venta(){
  var url ="<?php echo site_url();?>/Venta/insert_v";
  $.ajax({
    type: "POST",
    url:url,
    data: $('#form').serialize(),
    success: function(data)
    {
      if(data!=0)
      {
        alert('Datos ingresados correctamente');
        location.href='';
      }else{
        alert('Los datos no fueron guardados');
      
    }
  }

  });

}
function clear_pantalla(){
 alert('Esta seguro de limpiar la pantalla');
 $('#cliente').val('');
 $('#fecha').val('');
 $('#producto').val('');
 $('#precio').val('');
 $('#cantidad').val('');
  $('#total').val(''); 
}
</script>