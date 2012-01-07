<?php
include('libreria.php');
include('clases/Factura.php');
include('db/updates.php');
conectarDB();
$codigo=$_REQUEST['Codigo'];
actualizarEstadoDeFactura($codigo, 'Entregada');
?>
<script type="text/javascript">
  alert('Los Productos han sido Entregado');
  location.href='verFactura.php?codigo=<?php echo $codigo?>';
</script>