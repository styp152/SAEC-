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
  $dataaux2=array('total'=>number_format((($articulos[$i]->getPrecio()*($articulos[$i]->getCantidad()/1.12))),2));
  $data[]=array_merge($dataaux,$dataaux2);
}


$cliente = new Cliente();
$cliente->setCedula($factura->getCedulaCliente());
$cliente = buscarClientePorCedula($cliente);
$pdf =& new Cezpdf('a4');
$pdf->selectFont('fonts/Courier.afm');
$datocreator= array ('Title'=>'Factura',
                    'Author'=>'Sistema Administrativo para Control de Facturacion\
                               e Inventario',
                    'Subjet'=>'Factura para Imprimir',
                    'Creator'=>'styp152@gmail.com, annitap4@gmail.com',
                    'Producer'=>'Creativo Mérida'
                     );
$pdf->addInfo($datocreator);
$pdf->ezImage("images/logo.jpg", 0, 540, 'none', 'left');
$pdf->ezSetY(790);
$pdf->ezText("<b> OP-00".$factura->getCodigo()."</b>  \n\n\n",12,array('justification'=>'right'));
$pdf->ezText(utf8_decode("<b>Estudio Creativo Mérida, (De Jesus Gabriel Albornoz) R.I.F: V-17129464-5 \n DIRECCIÓN: Final Av. 3 Con Calle 13 Casa 13-31 Teléfono: 0274-6586568 0426-2978747</b>\n"),10,array('justification'=>'center'));
$pdf->ezText("<b>"."Fecha: ".fecha_es2in($factura->getFechaRegistro())."</b>",12,array('justification'=>'right'));
//$pdf->ezText("<b>"."Factura"."</b>\n",20,array('justification'=>'center'));
$pdf->ezText("<b>"."Datos del Cliente"."</b>\n",16,array('justification'=>'center'));
$datacliente[]=array('texto'=>
"\n      <b>CEDULA O RIF: </b> ".$cliente->getNacionalidad().'-'.$cliente->getCedula()."  NOMBRE: ".utf8_decode($cliente->getNombre())."</b>\n\n".
"      <b>DIRECCION: </b> ".utf8_decode($cliente->getDireccion())."</b>\n\n".
"      <b>CORREO: </b> ".$cliente->getCorreo()."    TELEFONO: ".$cliente->getTelefono()."</b>\n");
$options=array('width'=> 540,'titleFontSize' => 7,'fontSize' => 12, 'showHeadings' => 0, 'showLines'=> 1);
$pdf->ezTable($datacliente, $titles, '', $options);

$pdf->ezText("\n<b>"."Datos del Pedido"."</b>\n",16,array('justification'=>'center'));
$titles = array('Cantidad'=>'<b>Cantidad</b>', 'Nombre'=>'<b>Nombre</b>','Precio'=>'<b>Precio Unitario</b>','total'=>'<b>Total</b>',);
$options=array('width'=> 520,'titleFontSize' => 18,'fontSize' => 12, 'shaded'=> 2, 'shadeCol' => array(1.0,1.0,1.0), 'xOrientation' => 'center');
$pdf->ezTable($data, $titles, '', $options);

$titles = array('detalles'=>'<b>Detalles</b>','descripcion'=>'<b>Descripcion</b>');



$data1[]=array('detalles'=>utf8_decode("<b> DETALLES DE DISEÑO Y PRODUCCION</b> \n".$factura->getDetalles()),
        'descripcion'=>
        '<b>Sub-Total</b>                   '.number_format($sutTotal,2).
        "\n<b>IVA 12%</b>                     ".number_format($total-$sutTotal,2).
        "\n<b>Total</b>                      ".number_format($total,2));
//$data1[]=array('descripcion'=>);
//$data1[]=array('descripcion'=>);
$options=array('width'=> 520,'titleFontSize' => 7,'fontSize' => 12, 'xOrientation' => 'center', 'showHeadings' => 0, 'showLines'=> 1, 'options' => array('detalles'=>array('justification'=>'left','link'=>linkDataName),'descripcion'=>array('justificacion'=>'left','width'=>302)));
$pdf->ezTable($data1, $titles, '', $options);

$pdf->ezText("",16,array('justification'=>'center'));
$titles = array('vendedor'=>'','abono'=>'');
$data2[]=array('vendedor'=>"<b>  _________________</b>"."\n<b>        Vendedor </b>\n".$_SESSION['Nombre'],
               'abono'=>"Abono: ".$factura->getAbono()."\nResta: ". ($total - $factura->getAbono()) );
$options=array('width'=> 275,'titleFontSize' => 18,'fontSize' => 12, 'xOrientation' => 'right', 'showHeadings' => 0, 'showLines'=> 0, 'options' => array('vendedor'=>array('justification'=>'left','link'=>linkDataName),'abono'=>array('justificacion'=>'center','width'=>50)));
$pdf->ezTable($data2, $titles, '', $options);
$pdf->ezText("<b>      sello de pagado</b>",8,array('justification'=>'left'));
$pdf->ezText(" <b>Fecha de Entrega: ".fecha_es2in($factura->getFechaEntrega())."    ",12,array('justification'=>'right'));
$pdf->ezText("\n",12,array('justification'=>'center'));
$data3[]=array('detalles'=>utf8_decode("<b>El material de Diseño debe ser enviado al correo electronico artes1.creativo@gmail.com</b>"));
$data3[]=array('detalles'=>utf8_decode("Nota:<b> Cuando su producto este listo para retirar nuestro sistema le informara automaticamente en un mensaje de texto al numero telefonico que usted sumistro en esta factura, No responda al Numero del cual recibe el mensaje</b>"));
$titles = array('detalles'=>'<b>Detalles</b>');
$options2=array('width'=> 520,'titleFontSize' => 18,'fontSize' => 9, 'showHeadings' => 0, 'xOrientation' => 'center');
$pdf->ezTable($data3, $titles, '', $options2);

$pdf->ezStream();

?>