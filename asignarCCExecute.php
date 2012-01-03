<?php
include('libreria.php');
require_once('clases/CajaChica.php');
include('db/inserts.php');
include('db/searchs.php');
include('db/updates.php');

conectarDB();

$monto = buscarMontoCC(DATE('Y-m-d'));

$cc = new CajaChica();
$cc->updateDatos($_REQUEST);

if(isset($monto)){
  actualizarCC($cc->getMonto());
}
else{
  insertarCC($cc);
}
?>
<script type="text/javascript">
alert('Ya se Registro con Exito el Monto de la Caja Chica del Día');
location.href='administracion.php';
</script>