<?php
include('libreria.php');
include('clases/Factura.php');
include('db/updates.php');

conectarDB();

$abono=$_REQUEST['Abono'];
$factura = new Factura();
$factura->updateDatos($_REQUEST);

actualizarAbonoFactura($factura->getCodigo(), $abono);
?>
<script type="text/javascript">
  alert('El Abono a sido Registrado');
  location.href='verFactura.php?codigo=<?php echo $factura->getCodigo();?>';
</script>