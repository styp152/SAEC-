<?php
include("session.php");
include("libreria.php");
include_once("db/searchs.php");
include_once("clases/Asistencia.php");

conectarDB();

$mes = $_REQUEST['mes'];
$fecha1 = fecha_es2in($_REQUEST['fecha1']);
$fecha2 = fecha_es2in($_REQUEST['fecha2']);
$cedula=$_REQUEST['Cedula'];

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

$asistencias = buscarAsistenciasEntreFechas($cedula,$fecha1,$fecha2);
$size = count($asistencias);

if($size==0){
    ?>
    <script type="text/javascript">
        alert(" No se Encontraron Registros de Asistencias en el Rango de Fechas Solicitadas.");
        location.href="asistenciaEmpleado.php";
    </script>
    <?php
}
include("asistenciaEmpleadoShow.php");
?>