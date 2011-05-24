<?php
// Realizar login segun sea el Usuario y Clave  XXX|TODO
// Realizar el guardado de datos en la Sesion  XXX|TODO
session_start();
include('libreria.php');
include('clases/Vendedor.php');
conectarDB();
$vendedor= new Vendedor();
$vendedor->updateDatos($_REQUEST);
if($vendedor->getCedula()=='17129464' and $vendedor->getClave()=='9464'){
  $_SESSION["log"]="1";
  $_SESSION["vendedor"]= $vendedor;
  //$_SESSION["cedula"] = $person->cedula;
  //$_SESSION["Clave"] = $person->clave;
  $_SESSION["Nivel"] = 2;// TODO completar la busqueda y la asignacion correcta
  header("location:index.php");
}
else{
  header('location:index.php');
}
?>