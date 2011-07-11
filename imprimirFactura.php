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
$pdf->ezSetY(790);
$pdf->ezText("<b>".$factura->getCodigo()."</b>          \n\n\n",12,array('justification'=>'right'));
$pdf->ezText("<b>"."Fecha: ".fecha_es2in($factura->getFechaRegistro())."</b>                                                                               ".
             "<b>Fecha de Entrega: ".fecha_es2in($factura->getFechaEntrega()),12,array('justification'=>'left'));
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

$titles = array('detalles'=>'<b>Detalles</b>','descripcion'=>'<b>Descripcion</b>');



$data1[]=array('detalles'=>utf8_decode("<b> DETALLES DE DISEÑO Y PRODUCCION</b> \n".$factura->getDetalles()),
        'descripcion'=>
        '<b>Sub-Total</b>                   '.number_format($sutTotal,2).
        "\n<b>IVA 12%</b>                     ".number_format($total-$sutTotal,2).
        "\n<b>Total</b>                           ".number_format($total,2));
//$data1[]=array('descripcion'=>);
//$data1[]=array('descripcion'=>);
$options=array('width'=> 520,'titleFontSize' => 7,'fontSize' => 12, 'xOrientation' => 'center', 'showHeadings' => 0, 'showLines'=> 1, 'options' => array('detalles'=>array('justification'=>'left','link'=>linkDataName),'descripcion'=>array('justificacion'=>'left','width'=>302)));
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