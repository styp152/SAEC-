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
for($i=0;$i<count($articulos);$i++){
  $dataaux=array('Cantidad'=>$articulos[$i]->getCantidad(), 'Nombre'=>$articulos[$i]->getNombre(),
      'Precio'=>$articulos[$i]->getPrecio());
  $dataaux2=array('total'=>$articulos[$i]->getPrecio()*$articulos[$i]->getCantidad());
  $data[]=array_merge($dataaux,$dataaux2);
}


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
$pdf->ezImage("images/logo.jpg", 0, 540, 'none', 'left');
$pdf->ezText("<b>"."Fecha: ".@date("d-m-Y")."</b>\n",12,array('justification'=>'right'));
$pdf->ezText("<b>"."Factura"."</b>\n",20,array('justification'=>'center'));
$pdf->ezText("<b>"."Datos del Cliente"."</b>\n",16,array('justification'=>'center'));
$pdf->ezText("        <b>CEDULA: </b> ".$cliente->getCedula()."                                     NOMBRE: ".$cliente->getNombre()."</b>\n", 12);
$pdf->ezText("        <b>DIRECCION: </b> ".utf8_decode($cliente->getDireccion())."</b>\n", 12);
$pdf->ezText("        <b>CORREO: </b> ".$cliente->getCorreo()."                                     TELEFONO: ".$cliente->getTelefono()."</b>\n", 12);
$titles = array('Cantidad'=>'<b>Cantidad</b>', 'Nombre'=>'<b>Nombre</b>','Precio'=>'<b>Precio Unitario</b>','total'=>'<b>Total</b>',);
$options=array('width'=> 520,'titleFontSize' => 18,'fontSize' => 12, 'shaded'=> 2, 'shadeCol' => array(1.0,1.0,1.0), 'xOrientation' => 'center');
$pdf->ezText("<b>"."Datos del Pedido"."</b>\n",16,array('justification'=>'center'));
$pdf->ezTable($data, $titles, '', $options);
$pdf->ezStream();

?>