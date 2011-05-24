<?php
include('session.php');
include("head.html");
include("menu.php");
?>
<h2>Administracion</h2>
<!-- TODO Buscar los articulos agotados -->
<!-- TODO Buscar las ventas en la ultima semana -->
Productos Agotados
<table>
  <tr class="first">
    <td>Nombre </td>
    <td>Descripcion </td> 
    <td>Precio Unitario Bsf</td>
  </tr>
  <tr>
    <td>Tazas</td>
    <td>Tazas Termicas que se revelan con el calor</td>
    <td>50 </td>
  </tr>
  <tr>
    <td>Chapas</td>
    <td>Tamaño Mediano </td>
    <td>5 </td>
  </tr>
  <tr>
    <td>Camisas S</td>
    <td>Camisas de Poliester Talla S </td>
    <td>60 </td>
  </tr>
</table>
<br />
Produccion de la Ultima Semana
<table>
  <tr class="first">
    <td>Fecha </td>
    <td>Cantidad de Ventas </td>
    <td>Monto de la Venta </td>
  </tr>
  <tr>
    <td>Lunes 16/05</td>
    <td>5</td>
    <td>550 </td>
  </tr>
  <tr>
    <td>Martes 17/05</td>
    <td>6</td>
    <td>550 </td>
  </tr>
  <tr>
    <td>Miercoles 18/05</td>
    <td>8</td>
    <td>550 </td>
  </tr>
  <tr>
    <td>Jueves 19/05</td>
    <td>10</td>
    <td>550 </td>
  </tr>
  <tr>
    <td>Viernes 20/05</td>
    <td>7</td>
    <td>550 </td>
  </tr>
  <tr>
    <td>Sabado 21/05</td>
    <td>4</td>
    <td>550 </td>
  </tr>
</table>
</div>
<?php
include("menuAdministracion.html");
include("foot.html");
?>