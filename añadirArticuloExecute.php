<?php
include('libreria.php');
include('db/inserts.php');
require_once('clases/Articulo.php');
conectarDB();
$articulo= new Articulo();
$articulo->updateDatos($_REQUEST);
if ($articulo->getNombre()=='') {
  throw new Exception('Datos de Articulo Vacios');
}
try{
  insertarArticulo($articulo); /* TODO Falta Comprobar que el Articulo a Insertar no se Encuentre en la BD */
}
catch(Exception $e){
  echo 'Excepción capturada: ',  $e->getMessage(), "\n";
}
?>
<script type="text/javascript">
alert('Ya se Registro con Exito el Articulo');
location.href='inventario.php';
</script>
