<?php
include('libreria.php');
require_once('clases/Articulo.php');
include('db/searchs.php');
include('db/updates.php');
conectarDB();
$size=$_REQUEST['size'];
for($i=0;$i<$size;$i++){
  if(isset($_REQUEST['c'.$i])){
    $cantidades[$i]=array($_REQUEST['i'.$i],(int)$_REQUEST['c'.$i]);
  }
}
foreach($cantidades as $cantidad){
  $articulo=buscarCantidadArticuloPorId($cantidad[0]);
  actualizarCantidadArticulo($cantidad[0],$articulo->getCantidad()+$cantidad[1]);
}
?>
<script type="text/javascript">
alert('Ya se Actualizaron con Exito los Articulos');
location.href='inventario.php';
</script>
