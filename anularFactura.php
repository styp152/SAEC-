<?php
include('libreria.php');
include('clases/Factura.php');
include('db/updates.php');
include('db/deletes.php');
conectarDB();
$codigo=$_REQUEST['Codigo'];
actualizarEstadoDeFactura($codigo, 'Anulada');
borrarAbonos($codigo);
?>
<script type="text/javascript">
  alert('La Factura ha sido Anulada');
  location.href='verFactura.php?codigo=<?php echo $codigo?>';
</script>