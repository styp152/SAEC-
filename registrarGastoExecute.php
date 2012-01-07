<?php
include('session.php');
include('libreria.php');
require_once('clases/Gasto.php');
include('db/inserts.php');

conectarDB();

$gasto = new Gasto();
$gasto->updateDatos($_REQUEST);
$gasto->setCedulaVendedor($_SESSION['Cedula']);

insertarGasto($gasto);
?>
<script type="text/javascript">
alert('Ya se Registro con Exito el Gasto');
location.href='administracion.php';
</script>