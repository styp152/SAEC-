<?php 
include('libreria.php');
include('clases/Factura.php');
include('clases/Cliente.php');
include('db/updates.php');
include('db/searchs.php');

conectarDB();
$codigo = $_REQUEST['Codigo'];

actualizarEstadoDeFactura($codigo, 'Para Entregar');

$factura = buscarFacturaPorCodigo($codigo);

$cliente = new Cliente();
$cliente->setCedula($factura->getCedulaCliente());
$cliente = buscarClientePorCedula($cliente);

$usuario = 'estudiocreativo';
$password = 'estudiocreativo';
$texto = urlencode('Estudio Creativo Merida te Informa que el pedido con el Codigo OP-00'.$codigo.' se encuentra listo para Retirar www.creativo.freeiz.com Comunicate con Nosotros a traves del 02746586568');
$url = 'http://expresalo.com.ve/expresalo/sendsms/enviar/'.$usuario.'/'.$password.'/'.$cliente->getTelefono().'/'.$texto;

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$respuesta = curl_exec($ch);

if($respuesta[0]==1){
  $cantidad = substr($respuesta, strpos($respuesta, '>')+1, strpos($respuesta, '<', 6)-strpos($respuesta, '>')-1);
  if($cantidad<=10){?>
  <script type="text/javascript">
  alert('Restan <?php echo $cantidad;?> Mensajes, Contacte con el Proveedor');
  </script>
  <?php }?>
<script type="text/javascript">
alert('Productos Marcados como Listos Exitosamente y se Envio el Mensaje al Cliente');
location.href='colaproduccion.php';
</script>
<?php }else{ ?>
<script type="text/javascript">
alert('Productos Marcados como Listos Exitosamente y NO se pudo Enviar el Mensaje al Cliente');
location.href='colaproduccion.php';
</script>
<?php }?>