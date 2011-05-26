<?php
include("session.php");
include("libreria.php");
include('pdf/class.ezpdf.php');
include('db/searchs.php');
include_once("clases/Asistencia.php");
include_once("clases/Vendedor.php");

conectarDB();

$pdf =& new Cezpdf('a4');
$pdf->selectFont('fonts/courier.afm');
$datocreator= array ('Title'=>'Planilla de Asistencia',
                    'Author'=>'Sistema de Control de Asistencia',
                    'Subjet'=>'Planilla para Imprimir',
                    'Creator'=>'styp152@gmail.com, annitap4@gmail.com',
                    'Producer'=>'Creativo Mérida'
                     );

$pdf->addInfo($datocreator);
$pdf->ezImage("images/logo.jpg", 0, 240, 'none', 'left');

$fecha1 = $_REQUEST['fecha1'];
$fecha2 =$_REQUEST['fecha2'];
$cedula = $_REQUEST["Cedula"];

$asistencias = buscarAsistenciasEntreFechas($cedula,$fecha1,$fecha2);
$size = count($asistencias);

$vendedor = buscarVendedorPorCedula($cedula);

$titulo="Lista de Asistencia de ".$vendedor->getNombre()." ".$vendedor->getApellido();

$k=1;
for($j = 0; $j < $size; $j++){
    $dataaux=array('id'=>$k,'fecha'=>fecha_es2in($asistencias[$j]->getFecha()),'turnom'=>substr($asistencias[$j]->getHoraEntrada(),0,5).' '.$asistencias[$j]->getMHoraEntrada()." - ".substr($asistencias[$j]->getHoraSalida(),0,5).' '.$asistencias[$j]->getMHoraSalida());
    if($asistencias[$j+1] == null){
        $fechaSiguiente='';
    }
    else{
        $fechaSiguiente = $asistencias[$j+1]->getFecha();
    }
    if($asistencias[$j]->getFecha()==$fechaSiguiente){
        $dataaux2= array('turnot'=>substr($asistencias[$j+1]->getHoraEntrada(),0,5).' '.$asistencias[$j+1]->getMHoraEntrada()." - ".substr($asistencias[$j+1]->getHoraSalida(),0,5).' '.$asistencias[$j+1]->getMHoraSalida());
        $j++;
    }
    else{
        $dataaux2= array('turnot'=>"-:-");
    }
    $data[]=array_merge($dataaux,$dataaux2);
    $k++;
}
$titles = array('id'=>'<b></b>','fecha'=>'<b>Fecha</b>','turnom'=>'<b>Turno Matutino</b>','turnot'=>'<b>Turno Tarde</b>',);
$pdf->ezText("<b>".$titulo."</b>\n",20,array('justification'=>'center'));
$options=array('width'=> 520,'titleFontSize' => 18,'fontSize' => 12, 'shaded'=> 2, 'shadeCol' => array(1.0,1.0,1.0), 'xOrientation' => 'center');
$pdf->ezTable($data, $titles, '', $options);
$pdf->ezText("\n\n\n", 10);
$options=array('width'=> 520,'titleFontSize' => 18,'fontSize' => 12, 'xOrientation' => 'center');
$titles = array('id'=>'<b></b>','fecha'=>'<b>Fecha</b>','nota'=>'<b>                               Notas</b>',);
$data=null;
$k=1;

for($j=0;$j<$i;$j++){
    if($asistencias[$j]->getNota()!=null){
        $data[]=array('id'=>$k,'fecha'=>fecha_es2in($asistencias[$j]->getFecha()),'nota'=>$asistencias[$j]->getNota());
        $k++;
    }
}
if($k!=1){
    $titulo="Lista de Notas";
    $pdf->ezText("<b>".$titulo."</b>\n",20,array('justification'=>'center'));
    $pdf->ezTable($data, $titles, '', $options);
    $pdf->ezText("\n\n\n", 10);
}
$pdf->ezText("<b>Generado el </b> ".date("d/m/Y"), 11);
$pdf->ezText("<b>Hora:</b> ".substr(correctHora(),0,5).' '.date('A')."", 10);
$cedula = $_SESSION["Cedula"];
$vendedor = buscarVendedorPorCedula($cedula);
$pdf->ezText("<b>Por: </b> ".$vendedor->getNombre()." ".$vendedor->getApellido()."\n\n", 10);
$pdf->ezStream();

?>