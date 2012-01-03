<?php
include('session.php');
include('head.html');
include('menu.php');
require_once('clases/Abono.php');
require_once('clases/Gasto.php');
require_once('clases/Vendedor.php');
include('libreria.php');
conectarDB();
include('db/searchs.php');
$monto = buscarMontoCC(DATE('Y-m-d'));
?>
<h2>Facturacion</h2>
<br />
<?php
$abonos = buscarAbonosPorDia(date('Y-m-d'));
$size = count($abonos);
if($size!=0){
  $total=$abonos[0]->getMonto();
  $pivot = $abonos[0]->getCedulaVendedor();
  $z=0;
  $ventas[$z]=array('Cedula'=>$pivot, 'Abonos'=>$abonos[0]->getMonto(), 'Ventas'=>1);
  for($i=1;$i<$size;$i++){
    if($abonos[$i]->getCedulaVendedor()==$pivot){
      $ventas[$z]['Abonos']+=$abonos[$i]->getMonto();
      $ventas[$z]['Ventas']+=1;
    }
    else{
      $z++;
      $pivot=$abonos[$i]->getCedulaVendedor();
      $ventas[$z]=array('Cedula'=>$pivot, 'Abonos'=>$abonos[$i]->getMonto(), 'Ventas'=>1);
    }
    $total+=$abonos[$i]->getMonto();
  }
  $cantidad=count($ventas);
  for($j=0;$j<$cantidad;$j++){
    $ventas[$j]['Cedula']=buscarVendedorPorCedula($ventas[$j]['Cedula'])->getNombre()." ".
                          buscarVendedorPorCedula($ventas[$j]['Cedula'])->getApellido();
  }
?>
<h3>Abonos</h3>
<table>
  <tr class="first">
    <td>Vendedor </td>
    <td>Cantidad de Abonos </td>
    <td>Total de Abonos en Bsf</td> 
  </tr>
  <?php for($i=0;$i<$cantidad;$i++):?>
  <tr>
    <td><?php echo $ventas[$i]['Cedula']; ?></td>
    <td><?php echo $ventas[$i]['Ventas']; ?></td>
    <td><?php echo $ventas[$i]['Abonos']; ?></td>
  </tr>
  <?php endfor; ?>
</table>
<br />
<?php
$gastos = buscarGastosPorDia(date('Y-m-d'));
$size = count($gastos);
if($size!=0){
  $total1=$gastos[0]->getMonto();
  $pivot = $gastos[0]->getCedulaVendedor();
  $z=0;
  $ventas1[$z]=array('Cedula'=>$pivot, 'Abonos'=>$gastos[0]->getMonto(), 'Ventas'=>1);
  for($i=1;$i<$size;$i++){
    if($gastos[$i]->getCedulaVendedor()==$pivot){
      $ventas1[$z]['Abonos']+=$gastos[$i]->getMonto();
      $ventas1[$z]['Ventas']+=1;
    }
    else{
      $z++;
      $pivot=$gastos[$i]->getCedulaVendedor();
      $ventas1[$z]=array('Cedula'=>$pivot, 'Abonos'=>$gastos[$i]->getMonto(), 'Ventas'=>1);
    }
    $total1+=$gastos[$i]->getMonto();
  }
  $cantidad=count($ventas1);
  for($j=0;$j<$cantidad;$j++){
    $ventas1[$j]['Cedula']=buscarVendedorPorCedula($ventas1[$j]['Cedula'])->getNombre()." ".
                          buscarVendedorPorCedula($ventas1[$j]['Cedula'])->getApellido();
  }
}
?>
<h3>Gastos</h3>
<table>
  <tr class="first">
    <td>Vendedor </td>
    <td>Cantidad de Gastos </td>
    <td>Total de Gastos en Bsf</td> 
  </tr>
  <?php for($i=0;$i<$cantidad;$i++):?>
  <tr>
    <td><?php echo $ventas1[$i]['Cedula']; ?></td>
    <td><?php echo $ventas1[$i]['Ventas']; ?></td>
    <td><?php echo $ventas1[$i]['Abonos']; ?></td>
  </tr>
  <?php endfor; ?>
</table>
<br />

<?php
}
else{
?>
No se Realizaron Ventas hasta el Momento el Dia de Hoy <br \>
<?php 
} ?>
Total de Dinero Abonado en el Día: <?php echo $total; ?> Bsf
</br>
Monto de la Caja Chica del Día: <?php echo $monto; ?> Bsf
</br>
Total de Dinero Gastado en el Día: <?php echo $total1; ?> Bsf
</div>
<?php
include('menuFacturacion.php');
include('foot.html');
?>