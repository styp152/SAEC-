<?php
include("session.php");
include("libreria.php");
conectarDB();
$oficina=$_REQUEST['oficina1'];
if(!isset($oficina)){
  $oficina=$_SESSION['oficinaId'];
}
$mes = $_REQUEST['mes1'];
$fecha1 = fecha_es2in($_REQUEST['fecha3']);
$fecha2 = fecha_es2in($_REQUEST['fecha4']);
if($mes != "0"){
    $fecha1=Date("Y").'-'.$mes.'-01';
    if($mes==1 or $mes==3 or $mes==5 or $mes==7 or $mes==8 or $mes==10 or $mes==12){
        $fecha2=Date("Y").'-'.$mes.'-31';    
    }elseif($mes==4 or $mes==6 or $mes==9 or $mes==11){
        $fecha2=Date("Y").'-'.$mes.'-30';
    }elseif(!((Date("Y") % 4 == 0) and ((Date("Y") % 100 != 0) or (Date("Y") % 400 == 0)))){
        $fecha2=Date("Y").'-'.$mes.'-28';
    }
    else{
        $fecha2=Date("Y").'-'.$mes.'-29';
    }
}
if($oficina!=6){
  $sql="SELECT Ciudad FROM Oficina WHERE Id='$oficina'";
  $result=mysql_query($sql);
  $row=mysql_fetch_array($result);
  $titulo="Gastos de la Oficina $row[0]";
  $SQL="SELECT Fecha_Gasto,Monto FROM Gastos WHERE Id_Oficina='$oficina' and Fecha_Gasto>='$fecha1' and Fecha_Gasto<='$fecha2' and Cedula_Registrador != 18964136 ";
}
else{
  $SQL="SELECT Fecha_Gasto,Monto,Id_Oficina FROM Gastos WHERE Fecha_Gasto>='$fecha1' and Fecha_Gasto<='$fecha2' and Cedula_registrador != 18964136";
  $titulo='Gastos Totales';
}
$result=mysql_query($SQL);
$i=0;
$total=0;
while($row=mysql_fetch_assoc($result)){
  $data_crud[]=$row;
  $total+=$row['Monto'];
  $i++;
}
if($i==0){
?>
<script type="text/javascript">
alert("No se Encontraron Gastos Registrados en este Periodo de Tiempo.");
location.href="relacion.php";
</script>
<?php
}
$fecha2=$data_crud[$i-1]['Fecha_Gasto'];
$pivot=$data_crud[0]['Fecha_Gasto'];
$k=$data_crud[0]['Monto'];
$data=array();
for($j=1;$j<=$i;$j++){
  if($pivot==$data_crud[$j]['Fecha_Gasto']){
    $k+=$data_crud[$j]['Monto'];
  }
  else{
    $data[]=array(fecha_es2in($pivot),$k);
    $pivot=$data_crud[$j]['Fecha_Gasto'];
    $k=$data_crud[$j]['Monto'];
  }
}
$titulografica=utf8_decode("Gastos por Día: ");
$titulox=utf8_decode("Días");
$tituloy="Monto del Gasto";
$gastosV=true;
include('simpleplot.php');
include('imprimirReporteGastos.php');
?>