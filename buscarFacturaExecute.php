<?php
include('libreria.php');
include('clases/Factura.php');
include('clases/Cliente.php');
include('clases/Vendedor.php');
include('clases/Articulo.php');
include('db/searchs.php');
conectarDB();
$nombre=$_REQUEST['nombre'];
$codigo=$_REQUEST['codigo'];
$cedula=$_REQUEST['cedula'];
$fecha_inicio=$_REQUEST['fecha_inicio'];
$fecha_fin=$_REQUEST['fecha_fin'];
if($nombre=='' and $codigo=='' and $cedula=='' and $fecha_inicio=='' and $fecha_fin==''):
?>
<script type="text/javascript">
alert('La Busqueda es Vacia, Elija uno de los Campos para Realizar la Busqueda de la Factura');
location.href='buscarFactura.php';
</script>
<?php
endif;
if($codigo!=''){
?>
  <script type="text/javascript">
    location.href="verFactura.php?codigo=<?php echo $codigo;?>";
  </script>
<?php
}
else{
  if($fecha_inicio==$fecha_fin and $fecha_inicio!=''){
    $facturas=buscarFacturasPorDiaConAnular(fecha_es2in($fecha_inicio));
  }
  elseif($fecha_fin!='' and $fecha_inicio!=''){
    $facturas=buscarFacturasPorRangoDias(fecha_es2in($fecha_inicio), fecha_es2in($fecha_fin));
  }
  elseif($nombre!=''){
    $facturas=buscarFacturasPorNombreCliente($nombre);
  }
  else{
    $facturas=buscarFacturasPorCedulaCliente($cedula);
  }
}
include('listarFactura.php');
?>