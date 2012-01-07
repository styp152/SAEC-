<?php
include('libreria.php');
include('clases/Factura.php');
include('clases/Cliente.php');
include('db/searchs.php');

conectarDB();
$codigo = $_REQUEST['Codigo'];
$texto = $_REQUEST['text'];

$factura = buscarFacturaPorCodigo($codigo);

$cliente = new Cliente();
$cliente->setCedula($factura->getCedulaCliente());
$cliente = buscarClientePorCedula($cliente);

if($cliente->getTelefono()==''){
  ?>
  <script type="text/javascript">
    alert('No se Puede Enviar SMS al Cliente porque no Tiene Telefono Registrado');
    location.href='coladisenio.php';
  </script>
  <?php
}
sendSMS($cliente->getTelefono(), $texto);
?>
<script type="text/javascript">
  location.href='coladisenio.php';
</script>