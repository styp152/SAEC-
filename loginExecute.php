<?php
session_start();
include('libreria.php');
include('db/searchs.php');
include('clases/Vendedor.php');
conectarDB();
$vendedor= new Vendedor();
$vendedor->updateDatos($_REQUEST);
$vendedorDB=buscarVendedorPorCedulaClaveSinCifrar($vendedor->getCedula());
echo $vendedorDB->getClave(). "++++++" .$vendedor->getClave();
if($vendedor->getCedula()==$vendedorDB->getCedula() and $vendedor->getClave()==$vendedorDB->getClave()){
  $_SESSION["log"]="1";
  $_SESSION["vendedor"]= $vendedorDB;
  //$_SESSION["cedula"] = $person->cedula;
  //$_SESSION["Clave"] = $person->clave;
  $_SESSION["Nivel"] = $vendedorDB->getNivel();
  //header("location:index.php");
}
else{
  //header('location:index.php');
}
?>