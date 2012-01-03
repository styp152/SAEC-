<?php
include("session.php");
include("libreria.php");
include_once("db/searchs.php");
include_once("clases/Gasto.php");

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

$gastos = buscarGastosPorRangoDias($fecha1, $fecha2);
$size = count($gastos);

if($size==0){
    ?>
    <script type="text/javascript">
        alert(" No se Encontraron Registros de Gastos en el Rango de Fechas Solicitadas.");
        location.href="reporteGastos.php";
    </script>
    <?php
}

$k=0;
$pivot[$k] = $gastos[0]->getFechaRegistro();
$gasto[$k] = 1;
$total[$k] = $gastos[0]->getMonto();

for($i=1; $i<$size; $i++){
  if($pivot[$k]==$gastos[$i]->getFechaRegistro()){
    $gasto[$k]++;
    $total[$k]+=$gastos[$i]->getMonto();
  }
  else{
    $k++;
    $pivot[$k] = $gastos[$i]->getFechaRegistro();
    $gasto[$k] = 1;
    $total[$k] = $gastos[$i]->getMonto();
  } 
}

include("reporteGastosShow.php");
?>