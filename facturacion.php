<?php
include('session.php');
include('head.html');
include('menu.php');
?>
<h2>Facturacion</h2>
<!-- TODO consulta a la base de datos para buscar las facturas del dia -->
<!-- TODO calcular las ventas echa por cada trabajador y el total del dia de ventas -->
<br />
<table>
  <tr class="first">
    <td>Vendedor </td>
    <td>Cantidad de Ventas </td>
    <td>Total Vendido en Bsf</td> 
  </tr>
  <tr>
    <td>Maria Perez</td>
    <td>5</td>
    <td>750</td>
  </tr>
  <tr>
    <td>Nelson Garcia</td>
    <td>2</td>
    <td>300</td>
  </tr>
  <tr>
    <td>Gabriel Albornoz</td>
    <td>1 </td>
    <td>240 </td>
  </tr>
</table>
<br />
Total Vendido del Dia: 1290 Bsf
</div>
<?php
include('menuFacturacion.html');
include('foot.html');
?>