<?php
include('session.php');
include("head.html");
include("menu.php");
require_once('clases/Articulo.php');
require_once('clases/Factura.php');
include('libreria.php');
include('db/searchs.php');

conectarDB();
$facturas = buscarFacturasPorDiaSinAnular(DATE('Y-m-d'));
$sizef = count($facturas);
$cantidadA = 0;
$total = 0;
for($i=0; $i< $sizef; $i++){
  $artis = buscarArticulosPorCodigoFactura($facturas[$i]->getCodigo());
  $cantidadA+= count($artis);
  for($j=0; $j < count($artis); $j++){
    $total += $artis[$j]->getCantidad() * $artis[$j]->getPrecio();
  }
}
$articulos=buscarArticulosPorCantidad(0);
$size= count($articulos);
?>
<h2>Administracion</h2>
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
Produccion del Día
<br />
<br />
<table>
  <tr class="first">
    <td>Cantidad de Articulos Vendidos</td>
    <td>Cantidad de Ventas </td>
    <td>Monto Total de Venta</td>
  </tr>
  <tr>
    <td><?php echo $cantidadA;?></td>
    <td><?php echo $sizef;?></td>
    <td><?php echo $total;?></td>
  </tr>
</table>
</div>
<?php
include("menuAdministracion.php");
include("foot.html");
?>