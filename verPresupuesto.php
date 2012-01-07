<?php
include('libreria.php');
include('clases/Presupuesto.php');
include('clases/Cliente.php');
include('clases/Articulo.php');
include('db/searchs.php');
conectarDB();
$codigo=$_REQUEST['codigo'];
$presupuesto=buscarPresupuestoPorCodigo($codigo);
$cliente= new Cliente();
$cliente->setCedula($presupuesto->getCedulaCliente());
$cliente=buscarClientePorCedula($cliente);
$articulos = buscarArticulosPorCodigoPresupuesto($presupuesto->getCodigo());
$k = count($articulos);
for($i=0;$i<$k;$i++){
  $cantidad[$i] = $articulos[$i]->getCantidad();
}
include('crearPresupuestoShow.php');
?>