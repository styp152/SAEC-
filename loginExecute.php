<?php
session_start();
include('libreria.php');
include('db/searchs.php');
include('clases/Vendedor.php');
conectarDB();
$vendedor= new Vendedor();
$vendedor->updateDatos($_REQUEST);
$vendedorDB=buscarVendedorPorCedulaClaveSinCifrar($vendedor->getCedula());
if($vendedor->getCedula()==$vendedorDB->getCedula() and $vendedor->getClave()==$vendedorDB->getClave()){
  $_SESSION["log"]="1";
  $_SESSION["Nombre"] = $vendedorDB->getNombre().' '.$vendedorDB->getApellido();
  $_SESSION["Cedula"] = $vendedorDB->getCedula();
  $_SESSION["Clave"] = $vendedorDB->getClave();
  $_SESSION["Nivel"] = $vendedorDB->getNivel();
  $_SESSION["Cargo"] = $vendedorDB->getCargo();
  header("location:index.php");
}
else{
  ?>
  <script type="text/javascript">
    alert('Login o Password Incorrecto');
    location.href='eliminarEmpleado.php';
  </script>
  <?php
  header('location:index.php');
}
?>