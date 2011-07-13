<?php
include('libreria.php');
include('clases/Factura.php');
include('db/updates.php');
conectarDB();
$codigo=$_REQUEST['Codigo'];
actualizarEstadoDeFactura($codigo, 'Anulada');
?>
<script type="text/javascript">
  alert('La Factura ha sido Anulada');
  location.href='verFactura.php?codigo=<?php echo $codigo?>';
</script>