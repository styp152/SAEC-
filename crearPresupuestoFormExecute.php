<?php
include('session.php');
include('libreria.php');
include('db/inserts.php');
include('db/searchs.php');
include('db/updates.php');
require_once('clases/Cliente.php');
require_once('clases/Presupuesto.php');
require_once('clases/Articulo.php');
conectarDB();
$cliente = new Cliente();
$cliente->updateDatos($_REQUEST);
$clienteB = $cliente;
$clienteB = buscarClientePorCedula($clienteB);
if($clienteB->getCedula()==$cliente->getCedula()){
    actualizarCliente($cliente);
}
else{
    insertarCliente($cliente);
}
$presupuesto = new Presupuesto();
$presupuesto->updateDatos($_REQUEST);
$presupuesto->setFechaRegistro(date('Y-m-d'));
$presupuesto->setCedulaVendedor($_SESSION['Cedula']);
$presupuesto->setCedulaCliente($cliente->getCedula());
$vendedor = $_SESSION['Nombre'];
$j = $_REQUEST['cantidadj'];
$k=0;
for($i=0;$i<$j;$i++){
    if(isset($_REQUEST['c'.$i])){
        $cantidad[]=$_REQUEST['c'.$i];
        $nombre=$_REQUEST['n'.$i];
        $articulo=new Articulo();
        $articulo=buscarArticulo($nombre);
		$articulo->setPrecio($_REQUEST['p'.$i]);
        $articulos[]=$articulo;
        $k++;
    }
}
insertarPresupuesto($presupuesto, $articulos, $cantidad);
$codigo=buscarCodigoPresupuestoPorTodo($presupuesto);
include('crearPresupuestoShow.php');
?>