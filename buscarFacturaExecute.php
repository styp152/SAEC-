<?php
include('libreria.php');
include('clases/Factura.php');
include('clases/Cliente.php');
include('clases/Vendedor.php');
include('clases/Articulo.php');
include('db/searchs.php');
conectarDB();
$codigo=$_REQUEST['codigo'];
$cedula=$_REQUEST['cedula'];
$fecha_inicio=$_REQUEST['fecha_inicio'];
$fecha_fin=$_REQUEST['fecha_fin'];
if($codigo=='' and $cedula=='' and $fecha_inicio=='' and $fecha_fin==''){
?>
<script type="text/javascript">
alert('La Busqueda es Vacia, Elija uno de los Campos para Realizar la Busqueda de la Factura');
location.href='buscarFactura.php';
</script>
<?php
}
if($codigo!=''){
  $factura=buscarFacturaPorCodigo($codigo);
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
}
else{
  if($fecha_inicio==$fecha_fin and $fecha_inicio!=''){
    $facturas=buscarFacturasPorDia($fecha_inicio);
  }
  elseif($fecha_fin=='' and $fecha_inicio!=''){
    $facturas=buscarFacturasPorRangoDias($fecha_inicio, $fecha_fin);
  }
  else{
    $facturas=buscarFacturasPorCedulaCliente($cedula);
  }
}
include('listarFactura.php');
?>