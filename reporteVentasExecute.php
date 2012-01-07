<?php
include("session.php");
include("libreria.php");
include_once("db/searchs.php");
include_once("clases/Factura.php");
include_once("clases/Articulo.php");

conectarDB();

$mes = $_REQUEST['mes'];
$fecha1 = fecha_es2in($_REQUEST['fecha1']);
$fecha2 = fecha_es2in($_REQUEST['fecha2']);

if($mes != 0){
    $fecha1=Date("Y").'/'.$mes.'/1';
    if($mes==1 or $mes==3 or $mes==5 or $mes==7 or $mes==8 or $mes==10 or $mes==12){
        $fecha2=Date("Y").'/'.$mes.'/31';    
    }elseif($mes==4 or $mes==6 or $mes==9 or $mes==11){
        $fecha2=Date("Y").'/'.$mes.'/30';
    }elseif(!((Date("Y") % 4 == 0) and ((Date("Y") % 100 != 0) or (Date("Y") % 400 == 0)))){
        $fecha2=Date("Y").'/'.$mes.'/28';
    }
    else{
        $fecha2=Date("Y").'/'.$mes.'/29';
    }
}

$facturas = buscarFacturasPorRangoDias($fecha1,$fecha2);
$size = count($facturas);

if($size==0){
    ?>
    <script type="text/javascript">
        alert(" No se Encontraron Registros de Ventas en el Rango de Fechas Solicitadas.");
        location.href="reporteVentas.php";
    </script>
    <?php
}
$k=0;
$pivot[$k] = $facturas[0]->getFechaRegistro();
$ventas[$k] = 1;
$total[$k] = 0;
$totales= 0;
$artis = buscarArticulosPorCodigoFactura($facturas[0]->getCodigo());
$cantidadA+= count($artis);
for($j=0; $j < count($artis); $j++){
  $total[$k] += $artis[$j]->getCantidad() * $artis[$j]->getPrecio();
}
for($i=1; $i<$size; $i++){
  if($pivot[$k]==$facturas[$i]->getFechaRegistro()){
    $ventas[$k]++;
    $artis = buscarArticulosPorCodigoFactura($facturas[$i]->getCodigo());
    $cantidadA+= count($artis);
    for($j=0; $j < count($artis); $j++){
      $total[$k] += $artis[$j]->getCantidad() * $artis[$j]->getPrecio();
    }
  }
  else{
    $k++;
    $pivot[$k] = $facturas[$i]->getFechaRegistro();
    $ventas[$k] = 1;
    $total[$k] = 0;
    $artis = buscarArticulosPorCodigoFactura($facturas[$i]->getCodigo());
    $cantidadA+= count($artis);
    for($j=0; $j < count($artis); $j++){
      $total[$k] += $artis[$j]->getCantidad() * $artis[$j]->getPrecio();
    }
  }
}

for($i=0;$i<=$k;$i++){
	$totales += $total[$i];
}

include("reporteVentasShow.php");
?>