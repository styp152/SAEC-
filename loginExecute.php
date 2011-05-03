<?php
// Realizar Conexion a Base de Datos y login segun sea el Usuario y Clave  XXX|TODO
// Realizar el guardado de datos en la Sesion  XXX|TODO
$cedula=$_REQUEST['cedula'];
$clave=$_REQUEST['clave'];
if($cedula=='17129464' and $clave=='9464'){
  header('location:index2.php');
}
else{
  header('location:index.php');
}
?>