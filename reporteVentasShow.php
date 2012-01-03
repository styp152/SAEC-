<?php
include('session.php');
include("head.html");
include("menu.php");
?>
<h2>Reporte de Ventas</h2>
<br />
<table>
  <tr class="first">
    <td>Día</td>
    <td>Cantidad</td> 
    <td>Total Vendido</td>
  </tr>
  <?php for($i=0;$i<=$k;$i++):?>
    <tr>
      <td><?php echo fecha_es2in($pivot[$i]); ?></td>
      <td><?php echo $ventas[$i]; ?></td>
      <td><?php echo $total[$i]; ?> BsF</td>
    </tr>
  <?php endfor;?>
</table>
</div>
<?php
include("menuReporte.php");
include("foot.html");
?>