<?php
include('session.php');
include("head.html");
include("menu.php");
?>
<h2>Reporte de Abonos</h2>
<br />
<table>
  <tr class="first">
    <td>Día</td>
    <td>Cantidad</td> 
    <td>Total Abonado</td>
  </tr>
  <?php for($i=0;$i<=$k;$i++):?>
    <tr>
      <td><?php echo fecha_es2in($pivot[$i]); ?></td>
      <td><?php echo $abono[$i]; ?></td>
      <td><?php echo $total[$i]; ?> BsF</td>
    </tr>
  <?php endfor;?>
</table>
Total de Abonos del Rango es: <?php echo $totales; ?> BsF
</div>
<?php
include("menuReporte.php");
include("foot.html");
?>