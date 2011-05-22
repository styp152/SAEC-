<?php
include('head.html');
include('menu.html');
require_once('clases/Articulo.php');
include('libreria.php');
conectarDB();
include('db/searchs.php');
$articulos=buscarUltimosArticulos(5);
$size= count($articulos);
?>
<h2>Inventario</h2>
<p class="detalles">Articulos Añadidos Recientemente</p>
<br />
<table>
  <tr class="first">
    <td>Codigo </td>
    <td>Nombre </td>
    <td>Descripcion </td>
    <td>Cantidad </td> 
    <td>Precio Unitario Bsf</td>
  </tr>
  <?php for($i=0;$i<$size;$i++):?>
  <tr>
    <td><?php echo $articulos[$i]->getId(); ?></td>
    <td><?php echo $articulos[$i]->getNombre(); ?></td>
    <td><?php echo $articulos[$i]->getDescripcion(); ?></td>
    <td><?php echo $articulos[$i]->getCantidad(); ?></td>
    <td><?php echo $articulos[$i]->getPrecio(); ?></td>
  </tr>
  <?php endfor;?>
</table>
</div>
<?php
include('menuInventario.html');
include('foot.html');
?>