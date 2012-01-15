<?php
include('session.php');
include("head.html");
include("menu.php");
$costo = 10;
?>
<h2>Reporte de Pago</h2>
<h3><?php echo $vendedor->getNombre()." ".$vendedor->getApellido();?></h3>
<br />
<table>
  <tr class="first">
    <td>Turnos</td>
    <td>Horas</td> 
    <td>Costo de Hora</td>
    <td>Total a Pagar</td>
  </tr>
  <tr>
    <td><?php echo $dias?></td>
    <td><?php echo $acumulado; ?></td>
    <td><?php echo $costo; ?> BsF</td>
    <td><?php echo $acumulado*$costo; ?> BsF</td>
  </tr>
</table>
</div>
<?php
include("menuReporte.php");
include("foot.html");
?>