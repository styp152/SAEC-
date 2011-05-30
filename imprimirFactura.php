<?php
include("session.php");
include("libreria.php");
include('pdf/class.ezpdf.php');
include_once("clases/Factura.php");
include_once("clases/Articulo.php");
include_once("clases/Cliente.php");
include('db/searchs.php');

conectarDB();

$factura = new Factura();
$factura->updateDatos($_REQUEST);
$factura = buscarFacturaPorCodigo($factura->getCodigo());

$articulos = buscarArticulosPorCodigoFactura($factura->getCodigo());

$cliente = new Cliente();
$cliente->setCedula($factura->getCedulaCliente());
$cliente = buscarClientePorCedula($cliente);

$pdf =& new Cezpdf('a4');
$pdf->selectFont('fonts/courier.afm');
$datocreator= array ('Title'=>'Factura',
                    'Author'=>'Sistema Administrativo para Control de Facturacion\
                               e Inventario',
                    'Subjet'=>'Factura para Imprimir',
                    'Creator'=>'styp152@gmail.com, annitap4@gmail.com',
                    'Producer'=>'Creativo Mérida'
                     );
$pdf->addInfo($datocreator);
$pdf->ezImage("images/logo.jpg", 0, 240, 'none', 'left');
$pdf->ezStream();

?>