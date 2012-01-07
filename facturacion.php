<?php
include('session.php');
include('head.html');
include('menu.php');
require_once('clases/Abono.php');
require_once('clases/Configuracion.php');
require_once('clases/Gasto.php');
require_once('clases/Vendedor.php');
include('libreria.php');
conectarDB();
include('db/searchs.php');
$monto = buscarMontoCC(DATE('Y-m-d'));
$copia_carta = buscarConfiguracionPorCampo('Carta');
$copia_oficio= buscarConfiguracionPorCampo('Oficio');
$ampliaciones= buscarConfiguracionPorCampo('Ampliacion');
$carta_c = buscarConfiguracionPorCampo('Carta_c');
$oficio_c = buscarConfiguracionPorCampo('Oficio_c');
$ampliaciones_c = buscarConfiguracionPorCampo('Ampliacion_c');
?>
<script type="text/javascript" src="js/validacion.js"></script>
<h2>Facturacion</h2>
<br />
<h3>Registrar Copias</h3>
<form method="post" action="editarConfiguracion.php">
	Copias
	<select id="Campo" name="Campo">
		<option value=""> - - </option>
		<option value="Carta">Carta</option>
		<option value="Oficio">Oficio</option>
		<option value="Ampliacion">Ampliancion</option>
	</select>
	Cantidad:
	<input id="Valor" type="text" name="Valor" size="5" onkeypress="return permite(event , 'num')" />
	<input type="submit" value="Registrar" onclick="actualizarCopias(<?=$copia_carta[0]->getValor()?>,<?=$copia_oficio[0]->getValor()?>,<?=$ampliaciones[0]->getValor()?>);" />
</form>
<br />
<?php
if(!(count($copia_carta)==0 and count($copia_oficio)==0 and count($ampliaciones)==0)):
?>
<h3>Copias</h3>
<table>
  <tr class="first">
    <td>Tipo de Copia </td>
    <td>Cantidad de Copia </td>
    <td>Total de Copias en Bsf</td> 
  </tr>
  <?php for($i=0;$i<count($copia_carta);$i++):?>
  <tr>
    <td><?=$copia_carta[$i]->getCampo(); ?></td>
    <td><?=$copia_carta[$i]->getValor(); ?></td>
    <td><?=$copia_carta[$i]->getValor()*$carta_c[0]->getValor()?></td>
  </tr>
  <?php endfor; ?>
	<?php for($i=0;$i<count($copia_oficio);$i++):?>
  <tr>
    <td><?=$copia_oficio[$i]->getCampo(); ?></td>
    <td><?=$copia_oficio[$i]->getValor(); ?></td>
    <td><?=$copia_oficio[$i]->getValor()*$oficio_c[0]->getValor()?></td>
  </tr>
  <?php endfor; ?>
	<?php for($i=0;$i<count($ampliaciones);$i++):?>
  <tr>
    <td><?=$ampliaciones[$i]->getCampo(); ?></td>
    <td><?=$ampliaciones[$i]->getValor(); ?></td>
    <td><?=$ampliaciones[$i]->getValor()*$ampliaciones_c[0]->getValor()?></td>
  </tr>
  <?php endfor; ?>
</table>
<br />
<?php
else:
?>
No se Realizaron Copias hasta el Momento <br \>
<?php
endif;
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
    <td> Vendedor </td>
    <td> Monto del Gastos BsF </td>
    <td> Descripcion </td> 
  </tr>
  <?php for($i=0;$i<$size;$i++):?>
  <tr>
    <td><?php echo buscarVendedorPorCedula($gastos[$i]->getCedulaVendedor())->getNombre()." ".
			buscarVendedorPorCedula($gastos[$i]->getCedulaVendedor())->getApellido(); ?></td>
    <td><?php echo $gastos[$i]->getMonto(); ?></td>
    <td><?php echo $gastos[$i]->getDescripcion() ?></td>
  </tr>
  <?php endfor; ?>
</table>
<p><br />
  
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
  </br>
  Toltal Dinero Disponible del Día: <?php echo ($total+$monto-$total1); ?>Bsf</p>
</div>
<?php
include('menuFacturacion.php');
include('foot.html');
?>