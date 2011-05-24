<head>  
  <meta http-equiv="Content-Language" content="Español" /> 
  <meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
  <title>Estudio Creativo Mérida</title> 
</head>
<?php
include('libreria.php');
include('db/inserts.php');
include('db/searchs.php');

require_once('clases/Vendedor.php');

conectarDB();

$vendedor= new Vendedor();
$vendedor->updateDatos($_REQUEST);
if ($vendedor->getNombre()=='') {
  throw new Exception('Datos del Empleado Vacios');
}
if ($_REQUEST['Clave'] != $_REQUEST['ClaveConfirmacion']){
    ?>
    <script type="text/javascript">
    alert('Las Contraseñas no son iguales');
    location.href="añadirEmpleado.php";
    </script>    
    <?php
}
try{
  $vendedorExistente = new Vendedor();
  $vendedorExistente = buscarVendedorPorCedula($_REQUEST['Cedula']);
  if($vendedorExistente->getCedula() == ''){
    insertarVendedor($vendedor);
  }
  else{
    ?>
    <script type="text/javascript">
    alert('Este empleado ya existe');
    location.href='añadirEmpleado.php';
    </script>    
    <?php
  }
}
catch(Exception $e){
  echo 'Excepción capturada: ',  $e->getMessage(), "\n";
}

?>
<script type="text/javascript">
alert('Ya se Registro con Exito el Empleado');
location.href='administracion.php';
</script>