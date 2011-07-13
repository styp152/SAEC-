<?php
include('session.php');
include('head.html');
include('menu.php');
require_once('clases/Factura.php');
require_once('clases/Vendedor.php');
include('libreria.php');
conectarDB();
include('db/searchs.php');
?>
<h2>Facturacion</h2>
<br />
<?php
$facturas=buscarFacturasPorDiaSinAnular(date('Y-m-d'));
$size= count($facturas);
if($size!=0){
  $total=$facturas[0]->getAbono();
  $pivot = $facturas[0]->getCedulaVendedor();
  $z=0;
  $ventas[$z]=array('Cedula'=>$pivot, 'Abonos'=>$facturas[0]->getAbono(), 'Ventas'=>1);
  for($i=1;$i<$size;$i++){
    if($facturas[$i]->getCedulaVendedor()==$pivot){
      $ventas[$z]['Abonos']+=$facturas[$i]->getAbono();
      $ventas[$z]['Ventas']+=1;
    }
    else{
      $z++;
      $pivot=$facturas[$i]->getCedulaVendedor();
      $ventas[$z]=array('Cedula'=>$pivot, 'Abonos'=>$facturas[$i]->getAbono(), 'Ventas'=>1);
    }
    $total+=$facturas[$i]->getAbono();
  }
  $cantidad=count($ventas);
  for($j=0;$j<$cantidad;$j++){
    $ventas[$j]['Cedula']=buscarVendedorPorCedula($ventas[$j]['Cedula'])->getNombre()." ".
                          buscarVendedorPorCedula($ventas[$j]['Cedula'])->getApellido();
  }
?>
<table>
  <tr class="first">
    <td>Vendedor </td>
    <td>Cantidad de Ventas </td>
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
}
else{
?>
No se Realizaron Ventas hasta el Momento el Dia de Hoy <br \>
<?php 
} ?>
Total de Dinero Abonado en el Día: <?php echo $total; ?> Bsf
</div>
<?php
include('menuFacturacion.php');
include('foot.html');
?>