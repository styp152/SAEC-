<?php
include('libreria.php');
include('clases/Presupuesto.php');
include('clases/Cliente.php');
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
alert('La Busqueda es Vacia, Elija uno de los Campos para Realizar la Busqueda del Presupuesto');
location.href='buscarPresupuesto.php';
</script>
<?php
}
if($codigo!=''){
?>
  <script type="text/javascript">
    location.href="verPresupuesto.php?codigo=<?php echo $codigo;?>";
  </script>
<?php
}
else{
  if($fecha_inicio==$fecha_fin and $fecha_inicio!=''){
    $presupuestos=buscarPresupuestosPorDia(fecha_es2in($fecha_inicio));
  }
  elseif($fecha_fin!='' and $fecha_inicio!=''){
    $presupuestos=buscarPresupuestosPorRangoDias(fecha_es2in($fecha_inicio), fecha_es2in($fecha_fin));
  }
  else{
    $presupuestos=buscarPresupuestosPorCedulaCliente($cedula);
  }
}
include('listarPresupuesto.php');
?>