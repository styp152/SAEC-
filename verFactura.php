<?php
include('libreria.php');
include('clases/Factura.php');
include('clases/Cliente.php');
include('clases/Vendedor.php');
include('clases/Articulo.php');
include('db/searchs.php');
conectarDB();
$codigo=$_REQUEST['codigo'];
$factura=buscarFacturaPorCodigo($codigo);
if($factura->getCedulaVendedor()==''){
?>
  <script type="text/javascript">
    alert('La Busqueda es Vacia, Elija uno de los Campos para Realizar la Busqueda de la Factura');
    location.href='buscarFactura.php';
  </script>
<?php
}
$cliente= new Cliente();
$cliente->setCedula($factura->getCedulaCliente());
$vendedorDB = new Vendedor();
$vendedorDB = buscarVendedorPorCedula($factura->getCedulaVendedor());
$vendedor = $vendedorDB->getNombre()." ".$vendedorDB->getApellido();
$cliente=buscarClientePorCedula($cliente);
$abono= $factura->getAbono();
$articulos = buscarArticulosPorCodigoFactura($factura->getCodigo());
$k = count($articulos);
for($i=0;$i<$k;$i++){
  $cantidad[$i] = $articulos[$i]->getCantidad();
}
include('crearFacturaShow.php');
?>