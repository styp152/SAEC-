<?php
include('session.php');
include('libreria.php');
include('db/inserts.php');
include('db/searchs.php');
include('db/updates.php');
require_once('clases/Cliente.php');
require_once('clases/Factura.php');
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
$factura = new Factura();
$factura->updateDatos($_REQUEST);
$factura->setCedulaCliente($cliente->getCedula());
$factura->setFechaRegistro(date('Y-m-d'));
$factura->setFechaEntrega(fecha_es2in($factura->getFechaEntrega()));
$factura->setCedulaVendedor($_SESSION['Cedula']);
$vendedor = $_SESSION['Nombre'];
$abono = $_REQUEST['abono'];
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
insertarFactura($factura, $articulos, $cantidad, $abono);
$codigo=buscarCodigoFacturaPorTodo($factura);
include('crearFacturaShow.php');
?>