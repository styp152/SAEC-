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
$total=0;
$sutTotal=$total;
for($i=0;$i<count($articulos);$i++){
  $dataaux=array('Cantidad'=>$articulos[$i]->getCantidad(), 'Nombre'=>$articulos[$i]->getNombre(),
      'Precio'=>number_format(($articulos[$i]->getPrecio()/1.12),2));
  $sutTotal+=(($articulos[$i]->getPrecio()*$articulos[$i]->getCantidad())/1.12);
  $total+=$articulos[$i]->getPrecio()*$articulos[$i]->getCantidad();
  $dataaux2=array('total'=>($articulos[$i]->getPrecio()*($articulos[$i]->getCantidad()/1.12)));
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
$pdf->ezText("<b>"."Fecha: ".@date("d-m-Y")."</b>",12,array('justification'=>'right'));
//$pdf->ezText("<b>"."Factura"."</b>\n",20,array('justification'=>'center'));
$pdf->ezText("<b>"."Datos del Cliente"."</b>\n",16,array('justification'=>'center'));
$datacliente[]=array('texto'=>
"\n             <b>CEDULA: </b> ".$cliente->getCedula()."                                     NOMBRE: ".$cliente->getNombre()."</b>\n\n".
"             <b>DIRECCION: </b> ".utf8_decode($cliente->getDireccion())."</b>\n\n".
"             <b>CORREO: </b> ".$cliente->getCorreo()."                  TELEFONO: ".$cliente->getTelefono()."</b>\n");
$options=array('width'=> 540,'titleFontSize' => 7,'fontSize' => 12, 'showHeadings' => 0, 'showLines'=> 1);
$pdf->ezTable($datacliente, $titles, '', $options);

$pdf->ezText("\n<b>"."Datos del Pedido"."</b>\n",16,array('justification'=>'center'));
$titles = array('Cantidad'=>'<b>Cantidad</b>', 'Nombre'=>'<b>Nombre</b>','Precio'=>'<b>Precio Unitario</b>','total'=>'<b>Total</b>',);
$options=array('width'=> 520,'titleFontSize' => 18,'fontSize' => 12, 'shaded'=> 2, 'shadeCol' => array(1.0,1.0,1.0), 'xOrientation' => 'center');
$pdf->ezTable($data, $titles, '', $options);

$titles = array('descripcion'=>'<b>Descripcion</b>');
$data1[]=array('descripcion'=>'<b>Sub-Total</b>                   '.number_format($sutTotal,2));
$data1[]=array('descripcion'=>'<b>IVA 12%</b>                     '.number_format($total-$sutTotal,2));
$data1[]=array('descripcion'=>'<b>Total</b>                           '.number_format($total,2));
$options=array('width'=> 218,'titleFontSize' => 7,'fontSize' => 12, 'xPos' => 449, 'xOrientation' => 'center', 'showHeadings' => 0, 'showLines'=> 1);
$pdf->ezTable($data1, $titles, '', $options);

$pdf->ezText("",16,array('justification'=>'center'));
$titles = array('vendedor'=>'','pagado'=>'','abono'=>'');
$data2[]=array('vendedor'=>"<b>_________________</b>"."\n<b>Vendedor </b>".$_SESSION['Nombre'],
               'pagado'=>'sello de pagado',
               'abono'=>"Abono: ".$factura->getAbono()."\n Resta: ". ($total - $factura->getAbono()) );
$options=array('width'=> 520,'titleFontSize' => 18,'fontSize' => 12, 'xOrientation' => 'center', 'showHeadings' => 0, 'showLines'=> 0);
$pdf->ezTable($data2, $titles, '', $options);

$pdf->ezStream();

?>