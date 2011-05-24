<?php
// Realizar login segun sea el Usuario y Clave  XXX|TODO
// Realizar el guardado de datos en la Sesion  XXX|TODO
session_start();
include('libreria.php');
include('clases/Vendedor.php');
conectarDB();
$vendedor= new Vendedor();
$vendedor->updateDatos($_REQUEST);
if($cedula=='17129464' and $clave=='9464'){
  header('location:index.php');
}
else{
  header('location:index.php');
}
?>