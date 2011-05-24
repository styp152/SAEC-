<?php

include('libreria.php');
include('db/inserts.php');
require_once('clases/Vendedor.php');

conectarDB();

$vendedor= new Vendedor();
$vendedor->updateDatos($_REQUEST);

if ($vendedor->getNombre()=='') {
  throw new Exception('Datos del Empleado Vacios');
}
try{
  insertarVendedor($vendedor); /* TODO Falta Comprobar que el Empleado a Insertar no se Encuentre en la BD */
}
catch(Exception $e){
  echo 'Excepción capturada: ',  $e->getMessage(), "\n";
}
?>
<script type="text/javascript">
alert('Ya se Registro con Exito el Empleado');
location.href='administracion.php';
</script>