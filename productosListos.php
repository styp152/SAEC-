<?php 
include('libreria.php');
include('clases/Factura.php');
include('db/updates.php');
conectarDB();
$codigo = $_REQUEST['Codigo'];
actualizarEstadoDeFactura($codigo, 'Para Entregar');
?>
<script type="text/javascript">
alert('Productos Marcados como Listos Exitosamente');
location.href='colaproduccion.php';
</script>