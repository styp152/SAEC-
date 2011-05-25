<?php
include('session.php');
include("head.html");
include("menu.php");
require_once('clases/Articulo.php');
include('libreria.php');
include('db/searchs.php');

conectarDB();

$articulos=buscarArticulosPorCantidad(0);
$size= count($articulos);
?>
<h2>Administracion</h2>
<!-- TODO Buscar los articulos agotados -->
<!-- TODO Buscar las ventas en la ultima semana -->
<?php if($size == 0): ?>
    <p class="detalles">No hay articulos agotados</p>
<?php else: ?>
    <p class="detalles">Articulos Agotados</p>
    <br />
    <table>
      <tr class="first">
        <td>Nombre </td>
        <td>Descripcion </td> 
        <td>Precio Unitario Bsf</td>
      </tr>
      <?php for($i=0;$i<$size;$i++):?>
      <tr>
        <td><?php echo $articulos[$i]->getNombre(); ?></td>
        <td><?php echo $articulos[$i]->getDescripcion(); ?></td>
        <td><?php echo $articulos[$i]->getPrecio(); ?></td>
      </tr>
      <?php endfor;?>
    </table>
<?php endif ?>
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
include("menuAdministracion.php");
include("foot.html");
?>