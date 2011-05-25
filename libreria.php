<?php
function conectarDB(){
	$mycon = mysql_connect("localhost","root","123");
	if(!mysql_select_db("creativomerida_prueba",$mycon)){
		echo "Error en la Conexion a la Base de Datos ";
  }
}
function fecha_es2in($fecha){
	ereg( "([0-9]{1,2})-([0-9]{1,2})-([0-9]{2,4})", $fecha, $mifecha);
	$fecha_lista=$mifecha[3]."-".$mifecha[2]."-".$mifecha[1];
	return $fecha_lista;
}

function correctHora(){
  
  $hora = getdate(time());
  $hora1 = $hora["hours"];
  $minutes = $hora["minutes"]-30;
  if ($minutes<=0){
    $hora1-=1;
    $minutes+=60;
  }
  if ($hora1 <= 0){
    $hora1+=12;
  }
  $correctHora=$hora1.':'.$minutes.':'.$hora["seconds"].'';
  return($correctHora);
}

function getM($correctHora){
  $hora = getdate(time());
  $hora1 = $hora["hours"];
  $minutes = $hora["minutes"];
  $m = DATE('A');
  if(($hora1==12 or $hora1==23) and $minutes<=30){
    if($m=='AM'){
      $m = 'PM';
    }
    elseif($m == 'PM'){
      $m = 'AM';
    }
  }
  return($m);
}

function countPage($size){
  $pages=1;
  $size-=10;
  if($size<=0){
    return $pages;
  }
  for($i=11;$i<=$size;$i++){
    if(($i-1)%10==0){
      $pages++;
    }
  }
  return $pages+1;
}
  

?>