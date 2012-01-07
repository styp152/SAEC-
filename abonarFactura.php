<?php
include('session.php');
include('libreria.php');
include('clases/Factura.php');
include('clases/Abono.php');
include('db/inserts.php');
include('db/searchs.php');
include('db/updates.php');

conectarDB();

$abono=$_REQUEST['Abono'];
$factura = new Factura();
$factura->updateDatos($_REQUEST);
$factura2 = buscarFacturaPorCodigo($factura->getCodigo());
$abono2 = $abono - $factura2->getAbono();
actualizarAbonoFactura($factura->getCodigo(), $abono);
$abonos = new Abono();
$abonos->setCedulaVendedor($_SESSION["Cedula"]);
$abonos->setCodigo($factura->getCodigo());
$abonos->setMonto($abono2);
insertarAbono($abonos);
?>
<script type="text/javascript">
  alert('El Abono a sido Registrado');
  location.href='verFactura.php?codigo=<?php echo $factura->getCodigo();?>';
</script>