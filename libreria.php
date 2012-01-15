<?php
date_default_timezone_set('America/Caracas');

$codigo_siguiente;

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
  date ( "h:i:s" , $hora ); 
  $hora1 = DATE('h');
  $minutes = $hora["minutes"]+30;
  if ($minutes>=60){
    $hora1+=1;
    $minutes-=60;
  }
  if ($hora1 >= 12){
    $hora1-=12;
  }
  $correctHora=$hora1.':'.$minutes.':'.$hora["seconds"].'';
  return($correctHora);
}

function getM($correctHora){
  $hora = getdate(time());
  $hora1 = $hora["hours"];
  $minutes = $hora["minutes"];
  $m = DATE('A');
  if(($hora1==12 or $hora1==00) and $minutes<=30){
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

function sendSMS($telefono, $texto){

$usuario = 'estudiocreativo';
$password = 'estudiocreativo';
$texto = urlencode($texto.' creativomerida.com');
$url = 'http://expresalo.com.ve/expresalo/sendsms/enviar/'.$usuario.'/'.$password.'/'.$telefono.'/'.$texto;

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$respuesta = curl_exec($ch);

if($respuesta[0]==1){
  $cantidad = substr($respuesta, strpos($respuesta, '>')+1, strpos($respuesta, '<', 6)-strpos($respuesta, '>')-1);
  if($cantidad<=10){?>
  <script type="text/javascript">
  alert('Restan <?php echo $cantidad;?> Mensajes, Contacte con el Proveedor expresalo.com.ve');
  </script>
  <?php }?>
	<script type="text/javascript">
	alert('Mensaje Enviado con Exito al Cliente');
	</script>
<?php }else{ ?>
	<script type="text/javascript">
	alert('NO se pudo Enviar el Mensaje al Cliente');
	</script>
<?php }
}

function calcular_tiempo_trasnc($hora1,$hora2){
    
  $separar[1]=explode(':',$hora1);
  $separar[2]=explode(':',$hora2);

  $total_minutos_trasncurridos[1] = ($separar[1][0]*60)+$separar[1][1];
  $total_minutos_trasncurridos[2] = ($separar[2][0]*60)+$separar[2][1];
  $total_minutos_trasncurridos = $total_minutos_trasncurridos[1]-$total_minutos_trasncurridos[2];
  
  $HORA_TRANSCURRIDA = round($total_minutos_trasncurridos/60,2);
  
  return ($HORA_TRANSCURRIDA); 
}

?>